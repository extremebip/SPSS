<?php

namespace App\Http\Controllers;

use App\DetailPeserta;
use App\PembayaranLomba;
use App\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $payments = PembayaranLomba::select('user_id', 'admin_id', 'NamaPengirim', 'WaktuSubmitTransfer', DB::raw("0 AS description"));
        $notifications = User::whereNotNull('email_verified_at')
                ->select('id', 'admin_id', 'NamaLengkap', DB::raw("email_verified_at AS activity_date"), DB::raw("1 AS description"))->union($payments)->orderBy('activity_date', 'desc')->get();
        return view('admin.home')->with('notifications', $notifications);
    }

    public function profile() {
        return view('admin.profile')->with('admin', Auth::user());
    }

    public function update() {
        $this->validate(request(), [
            'fullname' => 'required',
            'email' => 'email',
            'phone' => 'numeric|min:6',
            'role' => 'required',
        ]);

        $admin = Auth::user();
        $admin->NamaLengkap = request()->fullname;
        $admin->email = request()->email;
        $admin->NomorHP = request()->phone;
        $admin->IDLine = request()->lineID;
        $admin->Roles = request()->role;
        $admin->save();

        return back()->with('message', 'success');
    }

    public function teamList() {
        $users = User::with('pembayaranLomba')->get();
        return view('admin.team-list')->with('users', $users);
    }

    public function teamDetail() {
        $detail = User::with(['detailPesertas', 'pembayaranLomba'])->where('id', request()->id)->first();
        return $detail;
    }

    public function verifyPayment($id) {
        if (!PembayaranLomba::where('user_id', $id)) return back();

        $payment = PembayaranLomba::where('user_id', $id)->first();

        return view('admin.verify-payment')->with('payment', $payment);
    }

    public function updateVerifyPayment($id) {
        $payment = PembayaranLomba::where('user_id', $id)->first();
        $payment->admin_id = Auth::id();
        $payment->save();
        return back();
    }

    public function transferPhoto($filepath) {
        $filepath = 'bukti_pembayaran/'.$filepath;
        if (!Storage::exists($filepath)) {
            abort(404);
        }
        return response()->file(storage_path('app/'.$filepath), ['Content-Type' => 'image/png']);
    }

    public function verifyEmail(User $user) {
        if (!$user) return back();

        return view('admin.verify-email')->with('user', $user);
    }

    public function updateVerifyEmail(User $user) {
        $user->admin_id = Auth::id();
        $user->save();
        return back();
    }

    public function ktm(DetailPeserta $dp) {
        $filepath = 'team/'.$dp->KartuTandaMahasiswa;
        if (!Storage::exists($filepath)) {
            abort(404);
        }
        return response()->file(storage_path('app/'.$filepath), ['Content-Type' => 'image/png']);
    }

    public function teamTahap1() {
        return back();
    }

    public function teamTahap2() {
        return back();
    }
}
