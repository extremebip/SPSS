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
        if (!Auth::user()->pembayaranLomba()->exists()) return view('user.payment');

        if (is_null(Auth::user()->pembayaranLomba()->get()->first()->admin_id)) return redirect()->action('DashboardController@index');

        if (!Auth::user()->detailPesertas()->exists()) return redirect()->action('DetailPesertaController@index');

        return redirect()->action('DashboardController@index');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'NamaPengirim' => ['required', 'string', 'max:100'],
            'NamaBank' => ['required', 'string', 'max:100'],
            'BuktiTransfer' => ['required', 'file', 'image', 'max:3999']
        ]);

        $ext = $request['BuktiTransfer']->getClientOriginalExtension();
        $fileName = sprintf("BuktiTransfer-%d-%s-%s.%s", Auth::id(), str_replace(' ', '_', $request['NamaPengirim']), str_replace(' ', '_', $request['NamaBank']), $ext);
        
        $filePath = Storage::putFileAs("bukti_pembayaran", $request->file('BuktiTransfer'), $fileName);

        $PembayaranLomba = PembayaranLomba::create([
            'user_id' => Auth::id(),
            'NamaPengirim' => $request['NamaPengirim'],
            'NamaBank' => $request['NamaBank'],
            'BuktiTransfer' => $fileName,
            'WaktuSubmitTransfer' => Carbon::now(),
        ]);

        return redirect()->action('DetailPesertaController@index');
    }
}
