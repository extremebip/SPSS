<?php

namespace App\Http\Controllers;

use App\TeamTahap1;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Tahap1Controller extends Controller
{
    public function upload(Request $request) 
    {
        $this->validate($request, [
            'FileSubmit' => ['required', 'file', 'mimes:pdf', 'max:3999']
        ]);

        Storage::makeDirectory('team//'.Auth::id().'/tahap_1');

        $WaktuSubmit = Carbon::now();
        $fileName = sprintf("JawabanTahap1-%d-%d", Auth::id(), $WaktuSubmit->timestamp);

        $filePath = Storage::putFileAs('team//'.Auth::id().'/tahap_1', $request->file('FileSubmit'), $fileName);

        $tahap1Data = Auth::user()->teamTahap1();

        $tahap1Data->update([
            'user_id' => Auth::id(),
            'FileSubmit' => $fileName,
            'WaktuSubmit' => Carbon::now()
        ]);

        return redirect()->action('DashboardController@index');
    }
}
