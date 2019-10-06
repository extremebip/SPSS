<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class ChangePasswordController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        return view('auth.passwords.change');
    }

    public function change(Request $request)
    {
        $this->validate($request, [
            'old_password' => ['required', 'string', 'min:8', function ($attribute, $value, $fail)
            {
                if (!Hash::check($value, Auth::user()->password)){
                    $fail('Password does not match Old Password');
                }
            }],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $user = Auth::user();
        $user->password = Hash::make($request['password']);
        $user->save();

        return redirect()->action('DashboardController@index');
    }
}