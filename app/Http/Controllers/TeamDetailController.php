<?php

namespace App\Http\Controllers;

use App\TeamDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TeamDetailController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        if (Auth::user()->teamDetail()->exists()) return redirect()->action('DashboardController@index');
        if (!Auth::user()->pembayaranLomba()->exists()) return redirect()->action('PembayaranLombaController@index');
        return view('user.registerPeserta');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'NamaPeserta1' => ['required', 'string', 'max:100'],
            'JurusanPeserta1' => ['required', 'string', 'max:30'],
            'NoHPPeserta1' => ['required', 'string', 'max:20'],
            'IDLinePeserta1' => ['nullable', 'string', 'max:20'],
            'KartuTandaMahasiswa1' => ['required', 'file', 'image', 'max:3999'],
            'NamaPeserta2' => ['required', 'string', 'max :100'],
            'JurusanPeserta2' => ['required', 'string', 'max:30'],
            'NoHPPeserta2' => ['required', 'string', 'max:20'],
            'IDLinePeserta2' => ['nullable', 'string', 'max:20'],
            'KartuTandaMahasiswa2' => ['required', 'file', 'image', 'max:3999'],
        ]);

        Storage::makeDirectory('team//'.Auth::id());
        Storage::makeDirectory('team//'.Auth::id().'/ktm');

        $ext1 = $request['KartuTandaMahasiswa1']->getClientOriginalExtension();
        $ext2 = $request['KartuTandaMahasiswa2']->getClientOriginalExtension();

        $fileName1 = sprintf("KTM-%d1-%s-%s.%s", Auth::id(), str_replace(' ', '_', $request['NamaPeserta1']), str_replace(' ', '_', $request['JurusanPeserta1']), $ext1);

        $fileName2 = sprintf("KTM-%d1-%s-%s.%s", Auth::id(), str_replace(' ', '_', $request['NamaPeserta2']), str_replace(' ', '_', $request['JurusanPeserta2']), $ext2);

        $filePath1 = Storage::putFileAs('team//'.Auth::id().'/ktm', $request->file('KartuTandaMahasiswa1'), $fileName1);

        $filePath2 = Storage::putFileAs('team//'.Auth::id().'/ktm', $request->file('KartuTandaMahasiswa2'), $fileName2);

        TeamDetail::create([
            'user_id' => Auth::id(),
            'NamaPeserta1' => $request['NamaPeserta1'],
            'JurusanPeserta1' => $request['JurusanPeserta1'],
            'NoHPPeserta1' => $request['NoHPPeserta1'],
            'IDLinePeserta1' => $request['IDLinePeserta1'],
            'KartuTandaMahasiswa1' => $fileName1,
            'NamaPeserta2' => $request['NamaPeserta2'],
            'JurusanPeserta2' => $request['JurusanPeserta2'],
            'NoHPPeserta2' => $request['NoHPPeserta2'],
            'IDLinePeserta2' => $request['IDLinePeserta2'],
            'KartuTandaMahasiswa2' => $fileName2,
        ]);

        return redirect()->action('DashboardController@index');
    }
}
