<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use ZipArchive;

class TahapFinalController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'verified']);
    }

    public function upload(Request $request)
    {
        $this->validate($request, [
            'FileSubmit' => ['bail', 'required', 'file', 'mimes:zip', 'max:10000', 
            function ($attribute, $value, $fail)
            {
                $validationResult = $this->validateCV($attribute, $value);
                if ($validationResult['fail']){
                    $fail($validationResult['message']);
                }
            }]
        ]);

        Storage::makeDirectory('team//'.Auth::id().'/final');

        $WaktuSubmit = Carbon::now();
        $fileLiteralName = $request->file('FileSubmit')->getClientOriginalName();
        $fileName = sprintf("CV-%d-%d.zip", Auth::id(), $WaktuSubmit->timestamp);

        $filePath = Storage::putFileAs('team//'.Auth::id().'/final', $request->file('FileSubmit'), $fileName);

        $dataFinal = Auth::user()->teamFinal();
        $dataFinal->update([
            'FileCV' => $fileName,
            'FileName' => $fileLiteralName
        ]);

        return redirect()->action('DashboardController@index');
    }

    private function validateCV($attribute, $value)
    {
        $name = $value->getClientOriginalName();
        if (!preg_match('/[A-Z]{2}\d{3}-[A-Za-z\s]+-[A-Za-z\s]+/', $name)){
            return array('fail' => true, 'message' => 'Nama file tidak sesuai dengan ketentuan');
        }

        $user = Auth::user();
        $KodePeserta = '';
        foreach ($user->detailPesertas as $member) {
            $KodePeserta .= strtoupper($member->NamaLengkap[0]);
        }
        $KodePeserta .= sprintf("%03d", $user->id);

        $kodePesertaFile = substr($name, 0, 5);
        if (strcmp($KodePeserta, $kodePesertaFile) != 0){
            return array('fail' => true, 'message' => 'Kode peserta tidak sesuai');
        }

        return array('fail' => false, 'message' => 'Validation success!');
    }
}
