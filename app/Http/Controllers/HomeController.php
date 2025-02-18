<?php

namespace App\Http\Controllers;

use App\Models\HomeModel;
use App\Models\TemporaryImageModel;
use Illuminate\Http\Request;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function open_home()
    {
        $data = HomeModel::all();
        return view('/user/index', ['data' => $data]);
    }


    // ADMIN BASED CONTROLLER
    function manage_page_home()
    {
        $data = HomeModel::all();
        return view('/admin/manage-home', ['data' => $data]);
    }

    public function edit_home($id)
    {
        $data = new HomeModel;
        $data = $data->where('page_id', $id)->first();
        return view('/admin/edit-home', ['data' => $data]);
    }

    public function edit_home_submit(Request $req, $id)
    {
        $home = new HomeModel;
        $home = $home->where('page_id', $id)->first();
        $home->web_name = $req->web_name;
        $home->status = $req->status;
        $home->category = $req->category;
        $home->web_link = $req->category;
        $temporary = new TemporaryImageModel();
        $image = $temporary->where('folder', $req->imageku)->first();
        $file = new Filesystem();
        if ($image) { // Pengecekan apakah $image tidak null

            if ($home->web_image) {
                $oldImagePath = storage_path('app/public/uploads/uploaded_image/' . $home->web_image);
                if ($file->exists($oldImagePath)) {
                    $file->delete($oldImagePath);
                }

                //Optional : delete old image folder if empty
                $oldImageFolderPath = storage_path('app/public/uploads/uploaded_image/' . dirname($home->web_image));
                if ($file->exists($oldImageFolderPath)) {
                    $files = $file->files($oldImageFolderPath);
                    if (empty($files)) {
                        $file->deleteDirectory($oldImageFolderPath);
                    }
                }
            }

            $sourceFile = storage_path('app/public/uploads/tmp/' . $image->folder);
            $destinationFile = storage_path('app/public/uploads/uploaded_image/' . $image->folder); // Path lengkap

            if ($file->exists($sourceFile)) { // Periksa apakah file sumber ada
                $file->move($sourceFile, $destinationFile); // Pindahkan file

                // Hapus folder temporary (kosong)
                $sourceDir = storage_path('app/public/uploads/tmp/' . $image->folder);
                if ($file->exists($sourceDir)) { // Pastikan folder ada sebelum dihapus
                    $file->deleteDirectory($sourceDir);
                }

                $home->web_image = $image->folder . '/' . $image->filename; // Gunakan properti dari $image yang sudah dipastikan ada
                $image->delete();
            }
        }
        $home->save();
        session()->flash('postsuccess', 'Post Edited Successfully');
        return redirect()->route('manage_page_home'); // Atau redirect yang sesuai 
    }


    public function add_home(Request $req)
    {
        $home = new HomeModel;
        $home->page_id = Str::random(10);
        $home->web_name = $req->web_name;
        $home->category = $req->category;
        $home->web_link = $req->web_link;
        $home->status = $req->status;
        $home->web_visit_encounter = 0;
        $temporary = new TemporaryImageModel();
        $image = $temporary->where('folder', $req->imageku)->first();
        if ($image) { // Pengecekan apakah $image tidak null
            $file = new Filesystem();
            $sourceFile = storage_path('app/public/uploads/tmp/' . $image->folder);
            $destinationFile = storage_path('app/public/uploads/uploaded_image/' . $image->folder); // Path lengkap

            if ($file->exists($sourceFile)) { // Periksa apakah file sumber ada
                $file->move($sourceFile, $destinationFile); // Pindahkan file

                // Hapus folder temporary (kosong)
                $sourceDir = storage_path('app/public/uploads/tmp/' . $image->folder);
                if ($file->exists($sourceDir)) { // Pastikan folder ada sebelum dihapus
                    $file->deleteDirectory($sourceDir);
                }

                $home->web_image = $image->folder . '/' . $image->filename; // Gunakan properti dari $image yang sudah dipastikan ada
                $image->delete();
            }
        }
        $home->save();
        session()->flash('postsuccess', 'Post Added Successfully');
        return redirect()->route('manage_page_home'); // Atau redirect yang sesuai
    }

    public function delete_home($id)
    {
        $file = new Filesystem();
        $home = new HomeModel();
        $home = $home->where('page_id', $id)->first();
        if ($home->web_image) {
            $ImagePath = storage_path('app/public/uploads/uploaded_image/' . $home->web_image);
            if ($file->exists($ImagePath)) {
                $file->delete($ImagePath);
            }

            //Optional : delete old file folder if empty
            $imageFolderPath = storage_path('app/public/uploads/uploaded_image/' . dirname($home->web_image));
            if ($file->exists($imageFolderPath)) {
                $oldfile = $file->files($imageFolderPath);
                if (empty($oldfile)) {
                    $file->deleteDirectory($imageFolderPath);
                }
            }
        }
        $home->delete();
        session()->flash('postsuccess', 'Post Deleted Successfully');
        return redirect()->route('manage_page_home'); // Atau redirect yang sesuai 
    }
}
