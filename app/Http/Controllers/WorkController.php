<?php

namespace App\Http\Controllers;
use App\Models\WorkModel;

use Illuminate\Http\Request;

class WorkController extends Controller
{
    public function add_work(Request $req) {
        $work = new WorkModel;
        $work->title = $req->title;
        $work->content = $req->content;
        $work->image = $req->image;
        $work->category = $req->category;
        $work->views = 0;
        $work->button_text = $req->button_text;
        $work->download_file = $req->download_file;
        $work->github_link = $req->github_link;
        $work->web_link = $req->web_link;
        $work->youtube_link = $req->youtube_link;
        $work->save();
        return redirect()->route('manage_page_work');
    }
}
