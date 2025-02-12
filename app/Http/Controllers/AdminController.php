<?php

namespace App\Http\Controllers;
use App\Models\AdminModel;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function dashboard_page(){
        return view('admin/index');
    }
    
    function manage_account(){
        $admin = AdminModel::all();
        return view('/admin/account', ['admin' => $admin]);
    }

    function manage_page_home(){
        return view('/admin/manage-home');
    }

    function manage_page_featured(){
        return view('/admin/manage-featured');
    }

    function manage_page_works(){
        return view('/admin/manage-works');
    }


}
