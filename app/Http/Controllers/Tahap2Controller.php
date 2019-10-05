<?php

namespace App\Http\Controllers;

use App\TeamTahap2;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Tahap2Controller extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function upload(Request $request) 
    {
        $this->validate($request, [
            'FileSubmit' => ['required', 'file', 'mimes:pdf', 'max:4000']
        ]);

        Storage::makeDirectory('team//'.Auth::id().'/tahap_2');

        $WaktuSubmit = Carbon::now();

        $fileLiteralName = $request->file('FileSubmit')->getClientOriginalName();
        $fileName = sprintf("JawabanTahap2-%d-%d.pdf", Auth::id(), $WaktuSubmit->timestamp);

        $filePath = Storage::putFileAs('team//'.Auth::id().'/tahap_2', $request->file('FileSubmit'), $fileName);

        $tahap2Data = Auth::user()->teamTahap2();

        $tahap2Data->update([
            'user_id' => Auth::id(),
            'FileSubmit' => $fileName,
            'WaktuSubmit' => Carbon::now(),
            'FileName' => $fileLiteralName
        ]);

        return redirect()->action('DashboardController@index');
    }
}
