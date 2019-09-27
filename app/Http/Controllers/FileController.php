<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Auth;
use Crypt;

class FileController extends Controller
{
    public function download(Request $request)
    {
        try {
            $fileType = Crypt::decrypt($request->file);
        } catch (DecryptException $e) {
            if (Auth::guard('web')->check())
                return redirect()->action('DashboardController@index');
            else if (Auth::guard('admin')->check())
                return redirect()->action('AdminController@index');
            else
                return redirect('/');
        }

        switch ($fileType) {
            case 'SoalTahap1':
                return Storage::download('file/SoalTahap1.docx');
                break;
            
            case 'LembarJawaban':
                return Storage::download('file/LembarJawaban.docx');
                break;

            default:
                if (Auth::guard('web')->check())
                    return redirect()->action('DashboardController@index');
                else if (Auth::guard('admin')->check())
                    return redirect()->action('AdminController@index');
                else
                    return redirect('/');
                break;
        }
    }
}
