<?php

namespace App\Http\Controllers;

use App\DetailPeserta;
use App\PembayaranLomba;
use App\User;
// use App\Mail\PembayaranLombaVerified;
// use App\Mail\DetailPesertaVerified;
// use App\Jobs\SendEmail;
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
        $payments = PembayaranLomba::join('users', 'pembayaran_lombas.user_id', '=', 'users.id')->select('user_id', 'pembayaran_lombas.admin_id', 'NamaLengkap', 'pembayaran_lombas.created_at', DB::raw("0 AS description"));
        $details = User::join('detail_pesertas', 'users.id', '=', 'detail_pesertas.user_id')->select('users.id', 'admin_id', 'users.NamaLengkap', 'detail_pesertas.created_at', DB::raw("1 AS description"))->distinct();
        $notifications = User::whereNotNull('email_verified_at')
                ->select('id', DB::raw("-1 AS admin_id"), 'NamaLengkap', DB::raw("email_verified_at AS activity_date"), DB::raw("2 AS description"))->union($payments)->union($details)->orderBy('activity_date', 'desc')->paginate(5);
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

        // $user = $payment->user()->get()->first();
        // $mail = new PembayaranLombaVerified($user);
        // SendEmail::dispatch($mail, $user);

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
    
    public function verifyDetail(User $user) {
        if (!$user) return back();

        return view('admin.verify-detail')->with('user', $user);
    }
    
    public function updateVerifyDetail(User $user) {
        $user->admin_id = Auth::id();
        $user->save();

        // $mail = new DetailPesertaVerified($user);
        // SendEmail::dispatch($mail, $user);

        return back();
    }

    public function ktm(DetailPeserta $dp) {
        $filepath = 'team/'.$dp->user_id.'/ktm/'.$dp->KartuTandaMahasiswa;
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

    public function GetStatus(Request $request)
    {
        $table = ($request['Tahap'] == 1) ? 'team_tahap1s' : 'team_tahap2s';

        $statusList = DB::table($table)
                    ->select([
                        $table.'.id',
                        'user_id',
                        DB::raw("case when FileSubmit is null then 'Belum Submit' else WaktuSubmit end as WaktuSubmit"),
                        'FileSubmit'
                    ])->get();
        
        return json_encode($statusList);
    }
}