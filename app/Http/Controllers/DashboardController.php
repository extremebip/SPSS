<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Timeline;
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
        $step = [];

        if (!$team->pembayaranLomba()->exists()) {
            return redirect()->action('PembayaranLombaController@index');
        }

        if (is_null($team->pembayaranLomba()->get()->first()->admin_id)){
            return view ('user.dashboard.paymentVerification', ['steps' => $step]);
        }

        if (!$team->detailPesertas()->exists()) {
            return redirect()->action('DetailPesertaController@index');
        }

        if (is_null($team->admin_id)){
            return view('user.dashboard.registerVerification', ['steps' => $step]);
        }

        $now = Carbon::now();
        $timeline = Timeline::all();
        
        array_push($step, 'Tahap1');
        if ($now < new Carbon($timeline->find(2)->DateTime, '+07:00')){
            return view('user.dashboard.Tahap1.before', ['steps' => $step]);
        }
        else if ($now < new Carbon($timeline->find(3)->DateTime, '+07:00') && is_null($team->teamTahap1()->first()->FileSubmit)){
            return view ('user.dashboard.Tahap1.test', ['steps' => $step]);
        }
        else if ($now < new Carbon($timeline->find(4)->DateTime, '+07:00')){
            return view('user.dashboard.Tahap1.after', ['steps' => $step]);
        }

        if (!$team->teamTahap2()->exists()){
            return view('user.dashboard.Tahap1.fail', ['steps' => $step]);
        }

        // Tahap 2
        if ($now < new Carbon($timeline->find(5)->DateTime, '+07:00')){
            return view('user.dashboard.Tahap2.before', ['steps' => $step]);
        }

        array_push($step, 'Tahap2');
        if ($now < new Carbon($timeline->find(6)->DateTime, '+07:00') && is_null($team->teamTahap2()->first()->FileSubmit)){
            return view ('user.dashboard.Tahap2.test', ['steps' => $step]);
        }
        else if ($now < new Carbon($timeline->find(7)->DateTime, '+07:00')){
            return view('user.dashboard.Tahap2.after', ['steps' => $step]);
        }

        if (!$team->teamFinal()->exists()){
            return view('user.dashboard.Tahap2.fail', ['steps' => $step]);
        }

        // Grand Final
        $teamFinal = $team->teamFinal()->first();
        if ($teamFinal->IsWaiting == 1){
            return view('user.dashboard.TahapFinal.waiting', ['steps' => $step]);
        }
        else if ($teamFinal->IsConfirmed == 0){
            return view('user.dashboard.TahapFinal.success', ['steps' => $step]);
        }
        else if ($teamFinal->IsConfirmed == -1){
            return view('user.dashboard.TahapFinal.tidakHadir', ['steps' => $step]);
        }
        else if ($teamFinal->IsConfirmed == 1 && is_null($teamFinal->FileCV)){
            return view('user.dashboard.TahapFinal.submitCV', ['steps' => $step]);
        }
        else if (!is_null($teamFinal->FileCV)){
            array_push($step, 'TahapFinal');
            return view('user.dashboard.TahapFinal.final', ['steps' => $step]);
        }
        else {

        }
    }
}