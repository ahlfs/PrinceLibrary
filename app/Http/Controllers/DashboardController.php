<?php

namespace App\Http\Controllers;

use App\Models\WorkModel;
use App\Models\WritingModel;
use App\Models\AdminModel;
use App\Models\PersonalMessageModel;

class DashboardController extends Controller
{
    function dashboard_page()
    {
        $dataWork = WorkModel::count();
        $dataWriting = WritingModel::count();
        $dataAdmin = AdminModel::count();
        $dataMessage = PersonalMessageModel::all();

        return view('/admin/index', ['dataWork' => $dataWork, 'dataWriting' => $dataWriting, 'dataAdmin' => $dataAdmin, 'dataMessage' => $dataMessage]);
    }

    public function delete_message($id) {
        $data = new PersonalMessageModel();
        $data = $data->where('id', $id)->first();
        $data->delete();
        session()->flash('postsuccess', 'Message Deleted !');
        return redirect()->back();
    }
}
