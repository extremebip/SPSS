<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $team = Auth::user();
        if (!$team->pembayaranLomba()->exists()) {
            return redirect()->action('PembayaranLombaController@index');
        }

        if (!$team->teamDetail()->exists()) {
            return redirect()->action('TeamDetailController@index');
        }

        if (is_null($team->pembayaranLomba()->get()->first()->admin_id)){
            return view('user.dashboard.verification');
        }

        $now = Carbon::now();
        

        return view('user.dashboard.Tahap1.before');
    }
}
