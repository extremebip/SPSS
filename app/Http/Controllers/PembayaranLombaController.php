<?php

namespace App\Http\Controllers;

use App\PembayaranLomba;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PembayaranLombaController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        if (Auth::user()->pembayaranLomba()->exists()) return redirect()->action('TeamDetailController@index');
        return view('user.payment');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'NamaPengirim' => ['required', 'string', 'max:100'],
            'NamaBank' => ['required', 'string', 'max:100'],
            'BuktiTransfer' => ['required', 'file', 'image', 'max:3999']
        ]);

        $filePath = Storage::put('bukti_pembayaran', $request->file('BuktiTransfer'));
        $fileName = basename($filePath);

        $PembayaranLomba = PembayaranLomba::create([
            'user_id' => Auth::id(),
            'NamaPengirim' => $request['NamaPengirim'],
            'NamaBank' => $request['NamaBank'],
            'BuktiTransfer' => $fileName,
            'WaktuSubmitTransfer' => Carbon::now(),
        ]);

        return redirect()->action('TeamDetailController@index');
    }
}
