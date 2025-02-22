<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AdminController extends Controller
{
   

    function manage_account()
    {
        $data = AdminModel::all();
        return view('/admin/manage-account', ['data' => $data]);
    }

    function add_account()
    {
        return view('/admin/add-account');
    }

    function add_account_submit(Request $req)
    {
        $account = new AdminModel();
        $dataByUsername = $account->where('username', Str::lower($req->username))->first();
        $dataByEmail = $account->where('email', Str::lower($req->email))->first();
        if ($dataByUsername) {
            session()->flash('postfailed', 'Failed, Username has been Used already !');
        } 
        else if ($dataByEmail) {
            session()->flash('postfailed', 'Failed, Email has been Used already !');
           
        } 
        else if ($req->password != $req->confirmpassword) {
            session()->flash('postfailed', 'Failed, Confirm Password not match !');
        }
        else {
            $account->page_id = Str::random(10);
            $account->username = Str::lower($req->username);
            $account->email = Str::lower($req->email);
            $salt = 'ioas82eja0340ar34';
            $hashed_password = base64_encode(hash('sha256', $req->password . $salt));
            $account->password = $hashed_password;
            $account->level = $req->level;
            $account->save();
            session()->flash('postsuccess', 'Account Added !');
            return redirect()->route('manage_account');
        }
        session()->flash('old_username', $req->username);
        session()->flash('old_email', $req->email);
        session()->flash('old_password', $req->password);
        session()->flash('old_confirmpassword', $req->confirmpassword);
        session()->flash('old_level', $req->level);
        return redirect()->back();
    }

    function edit_account($id)
    {
        $data = new AdminModel();
        $data = $data->where('page_id', $id)->first();
        return view('/admin/edit-account', ['data' => $data]);
    }

    function edit_account_submit(Request $req, $id)
    {
        $account = new AdminModel();
        $account_target = $account->where('page_id', $id)->first();
        
        $dataByUsername = $account->where('username', Str::lower($req->username))->first();
        $dataByEmail = $account->where('email', Str::lower($req->email))->first();
        if ($dataByUsername && $dataByUsername->page_id != $id) {
            session()->flash('postfailed', 'Failed, Username has been Used already !');
        } 
        else if ($dataByEmail && $dataByEmail->page_id != $id) {
            session()->flash('postfailed', 'Failed, Email has been Used already !');
           
        } 
        else if ($req->password != $req->confirmpassword && $req->password != NULL) {
            session()->flash('postfailed', 'Failed, Confirm Password not match !');
        }
        else {
            $account_target->username = Str::lower($req->username);
            $account_target->email = Str::lower($req->email);
            if ($req->password != NULL) {
                $salt = 'ioas82eja0340ar34';
                $hashed_password = base64_encode(hash('sha256', $req->password . $salt));
                $account_target->password = $hashed_password;
               
            }
            $account_target->level = $req->level;
            $account_target->save();
            session()->flash('postsuccess', 'Account Edited !');
            return redirect()->route('manage_account');
        }
        session()->flash('old_username', $req->username);
        session()->flash('old_email', $req->email);
        session()->flash('old_password', $req->password);
        session()->flash('old_confirmpassword', $req->confirmpassword);
        session()->flash('old_level', $req->level);
        return redirect()->back();
    }

    public function delete_account($id)
    {
        $account = new AdminModel();
        $account_target = $account->where('page_id', $id)->first();
        $account_session = $account->where('username', session()->get('username'))->first();
        if ($account_target->page_id != $account_session->page_id) {
            $account_target->delete();
            session()->flash('postsuccess', 'Account Deleted Successfully');
        }
        else {
            session()->flash('postfailed', 'Cant Delete Used Account !');
        }
        return redirect()->route('manage_account'); // Atau redirect yang sesuai 
    }
}
