<?php

namespace App\Http\Controllers;
use App\Models\TemporaryImageModel;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function temporary_upload(Request $req) {
        if($req->hasFile('imageku')) {
            $file = $req->file('imageku');
            $filename = $file->getClientOriginalName();
            $folder = uniqid() . '-' . now()->timestamp;
            $file->storeAs('uploads/tmp/'. $folder, $filename, 'public');
            $temporary = new TemporaryImageModel();
            $temporary->folder = $folder;
            $temporary->filename = $filename;
            $temporary->save();
            return $folder;
        }
        return '';
    }
}
