<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;



class AuthController extends Controller
{
    function loginfailed($req) {
        $req->session()->flash('old_username', $req->username);
        $req->session()->flash('old_password', $req->password);
        $req->session()->flash('failedlog');
        return redirect()->route('login');
        
    }

    function login(Request $req)
    {
        $salt = 'ioas82eja0340ar34';
        $admin = AdminModel::where('username', $req->username)->first();
        $passentry = base64_encode(hash('sha256', $req->password . $salt));
        if ($admin == null) {
            return AuthController::loginfailed($req);
        } else {
            if($admin->password == $passentry) {
                $req->session()->put('isLogin', hash('sha256', session()->get('__token')));
                return redirect()->route('dashboard_page');  
            } else {
                return AuthController::loginfailed($req);
            }
        }
    }

    function logout() {
        session()->forget('isLogin');
        return redirect()->route('index');
    }

    
}
