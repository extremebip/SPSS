<?php

namespace App\Http\Controllers;

use App\DetailPeserta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DetailPesertaController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        if (!Auth::user()->pembayaranLomba()->exists()) return redirect()->action('PembayaranLombaController@index');

        if (is_null(Auth::user()->pembayaranLomba()->get()->first()->admin_id)) return redirect()->action('DashboardController@index');

        if (Auth::user()->detailPeserta()->exists()) return redirect()->action('DashboardController@index');

        return view('user.registerPeserta');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'AsalUniversitas' => ['required', 'string', 'max:30'],
            // Peserta 1
            'NamaPeserta1' => ['required', 'string', 'max:100'],
            'JenisKelaminPeserta1' => ['required', 'string'],
            'NoHPPeserta1' => ['required', 'string', 'max:20'],
            'IDLinePeserta1' => ['nullable', 'string', 'max:20'],
            'JurusanPeserta1' => ['required', 'string', 'max:50'],
            'NIMPeserta1' => ['required', 'string', 'max:20'],
            'KartuTandaMahasiswa1' => ['required', 'file', 'image', 'max:3999'],
            // Peserta 2
            'NamaPeserta2' => ['required', 'string', 'max :100'],
            'JenisKelaminPeserta2' => ['required', 'string'],
            'NoHPPeserta2' => ['required', 'string', 'max:20'],
            'IDLinePeserta2' => ['nullable', 'string', 'max:20'],
            'JurusanPeserta2' => ['required', 'string', 'max:50'],
            'NIMPeserta2' => ['required', 'string', 'max:20'],
            'KartuTandaMahasiswa2' => ['required', 'file', 'image', 'max:3999'],
        ]);

        Storage::makeDirectory('team//'.Auth::id());
        Storage::makeDirectory('team//'.Auth::id().'/ktm');

        $ext1 = $request['KartuTandaMahasiswa1']->getClientOriginalExtension();
        $ext2 = $request['KartuTandaMahasiswa2']->getClientOriginalExtension();

        $fileName1 = sprintf("KTM-%d1-%s-%s.%s", Auth::id(), str_replace(' ', '_', $request['NamaPeserta1']), str_replace(' ', '_', $request['JurusanPeserta1']), $ext1);

        $fileName2 = sprintf("KTM-%d2-%s-%s.%s", Auth::id(), str_replace(' ', '_', $request['NamaPeserta2']), str_replace(' ', '_', $request['JurusanPeserta2']), $ext2);

        $filePath1 = Storage::putFileAs('team//'.Auth::id().'/ktm', $request->file('KartuTandaMahasiswa1'), $fileName1);

        $filePath2 = Storage::putFileAs('team//'.Auth::id().'/ktm', $request->file('KartuTandaMahasiswa2'), $fileName2);

        // Update Asal Universitas
        $user = Auth::user();
        $user->AsalUniversitas = $request['AsalUniversitas'];
        $user->save();

        // Create Peserta 1
        DetailPeserta::create([
            'user_id' => Auth::id(),
            'NamaLengkap' => $request['NamaPeserta1'],
            'JenisKelamin' => $request['JenisKelaminPeserta1'],
            'NoHP' => $request['NoHPPeserta1'],
            'IDLine' => $request['IDLinePeserta1'],
            'Jurusan' =>  $request['JurusanPeserta1'],
            'NIM' => $request['NIMPeserta1'],
            'KartuTandaMahasiswa' => $fileName1,
        ]);

        // Create Peserta 2
        DetailPeserta::create([
            'user_id' => Auth::id(),
            'NamaLengkap' => $request['NamaPeserta2'],
            'JenisKelamin' => $request['JenisKelaminPeserta2'],
            'NoHP' => $request['NoHPPeserta2'],
            'IDLine' => $request['IDLinePeserta2'],
            'Jurusan' =>  $request['JurusanPeserta2'],
            'NIM' => $request['NIMPeserta2'],
            'KartuTandaMahasiswa' => $fileName2,
        ]);

        return redirect()->action('DashboardController@index');
    }
}
