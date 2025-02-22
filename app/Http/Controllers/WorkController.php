<?php

namespace App\Http\Controllers;

use App\Models\WorkModel;
use App\Models\TemporaryImageModel;
use Illuminate\Http\Request;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Carbon\Carbon;

class WorkController extends Controller
{

    public function downloadFile($id)
    {
        $data = new WorkModel();
        $target_data = $data->where('page_id', $id)->first();
        if ($target_data->download_file) {
            $filePath = storage_path('app/public/uploads/uploaded_file/' . $target_data->download_file); // Ganti dengan path yang sesuai
            return response()->download($filePath);
        }
       else {
        return redirect()->back();
       }
    }

    public function open_work()
    {
        $data = WorkModel::all();
        return view('/user/works', ['data' => $data]);
    }

    public function detail_work($id)
    {
        $alldata = new WorkModel();
        $data = $alldata->where('page_id', $id)->first();
        if ($data) {
            $data->view_encounter += 1;
            $data->save();
            $upload_date = $data->created_at->format('F j, Y');
            if ($data->last_update) {
                $edit_date = Carbon::parse($data->last_update)->format('F j, Y');
            } else {
                $edit_date = null;
            }
            return view('/user/work-detail', ['data' => $data, 'upload_date' => $upload_date, 'edit_date' => $edit_date]);
        } else {
            abort(404, 'Ngapain kau suki');
        }
    }


     // ADMIN BASED CONTROLLER

    function manage_page_works(){
        $data = WorkModel::all();
        foreach ($data as $d) {
            if ($d->download_file) {
                $d->download_file = explode('/', $d->download_file)[1];
            }

        }
        return view('/admin/manage-works', ['data' => $data]);
    }

    public function edit_work($id)
    {
        $data = new WorkModel;
        $data = $data->where('page_id', $id)->first();
        if ($data->download_file) {
            $data->download_file = explode('/', $data->download_file)[1];
        }

        return view('/admin/edit-works', ['data' => $data]);
    }

    public function edit_work_submit(Request $req, $id)
    {
        $work = new WorkModel;
        $work = $work->where('page_id', $id)->first();
        $work->title = $req->title;
        $work->content = $req->content;
        $work->category = $req->category;
        $work->web_link = $req->web_link;
        $work->youtube_link = $req->youtube_link;
        $work->github_link = $req->github_link;
        $temporary = new TemporaryImageModel();
        $image = $temporary->where('folder', $req->imageku)->first();
        $file = new Filesystem();
        if ($image) { // Pengecekan apakah $image tidak null

            if ($work->image) {
                $oldImagePath = storage_path('app/public/uploads/uploaded_image/' . $work->image);
                if ($file->exists($oldImagePath)) {
                    $file->delete($oldImagePath);
                }

                //Optional : delete old image folder if empty
                $oldImageFolderPath = storage_path('app/public/uploads/uploaded_image/' . dirname($work->image));
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

                $work->image = $image->folder . '/' . $image->filename; // Gunakan properti dari $image yang sudah dipastikan ada
                $image->delete();
            }

            
            
        }
        if ($req->hasFile('fileku')) {

            if ($work->download_file) {
                $oldImagePath = storage_path('app/public/uploads/uploaded_file/' . $work->download_file);
                if ($file->exists($oldImagePath)) {
                    $file->delete($oldImagePath);
                }

                //Optional : delete old file folder if empty
                $oldFileFolderPath = storage_path('app/public/uploads/uploaded_file/' . dirname($work->download_file));
                if ($file->exists($oldFileFolderPath)) {
                    $oldfile = $file->files($oldFileFolderPath);
                    if (empty($oldfile)) {
                        $file->deleteDirectory($oldFileFolderPath);
                    }
                }
            }

            $download_file = $req->file('fileku');
            $download_file_name = $download_file->getClientOriginalName();
            $newDirUnique = uniqid();
            $newDir = storage_path('app/public/uploads/tmp/' . $newDirUnique);
            Storage::makeDirectory($newDir);
            $download_file->move(storage_path('app/public/uploads/uploaded_file/' . $newDirUnique . '/'), $download_file_name);
            $work->download_file = $newDirUnique . '/' . $download_file_name;
        }
        $work->last_update = now();
        $work->save();
        session()->flash('postsuccess', 'Post Edited Successfully');
        return redirect()->route('manage_page_works'); // Atau redirect yang sesuai 
    }

    public function delete_work($id) {
        $file = new Filesystem();
        $work = new WorkModel();
        $work = $work->where('page_id', $id)->first();
        if ($work->image) {
            $ImagePath = storage_path('app/public/uploads/uploaded_image/' . $work->image);
            if ($file->exists($ImagePath)) {
                $file->delete($ImagePath);
            }

            //Optional : delete old file folder if empty
            $imageFolderPath = storage_path('app/public/uploads/uploaded_image/' . dirname($work->image));
            if ($file->exists($imageFolderPath)) {
                $oldfile = $file->files($imageFolderPath);
                if (empty($oldfile)) {
                    $file->deleteDirectory($imageFolderPath);
                }
            }
        }
        if ($work->download_file) {
            $filePath = storage_path('app/public/uploads/uploaded_file/' . $work->download_file);
            if ($file->exists($filePath)) {
                $file->delete($filePath);
            }

            //Optional : delete old file folder if empty
            $fileFolderPath = storage_path('app/public/uploads/uploaded_file/' . dirname($work->download_file));
            if ($file->exists($fileFolderPath)) {
                $oldfile = $file->files($fileFolderPath);
                if (empty($oldfile)) {
                    $file->deleteDirectory($fileFolderPath);
                }
            }
        }
        $work->delete();
        session()->flash('postsuccess', 'Post Deleted Successfully');
        return redirect()->route('manage_page_works'); // Atau redirect yang sesuai 
    }

    public function add_work(Request $req)
    {
        $work = new WorkModel();
        $work->page_id = Str::random(10);
        $work->title = $req->title;
        $work->content = $req->content;
        $work->category = $req->category;
        $work->web_link = $req->web_link;
        $work->youtube_link = $req->youtube_link;
        $work->github_link = $req->github_link;
        $work->view_encounter = 0;
        $work->download_encounter = 0;
        $temporary = new TemporaryImageModel();
        $file = new Filesystem();
        $image = $temporary->where('folder', $req->imageku)->first();
        if ($image) { // Pengecekan apakah $image tidak null
            $sourceFile = storage_path('app/public/uploads/tmp/' . $image->folder);
            $destinationFile = storage_path('app/public/uploads/uploaded_image/' . $image->folder); // Path lengkap

            if ($file->exists($sourceFile)) { // Periksa apakah file sumber ada
                $file->move($sourceFile, $destinationFile); // Pindahkan file

                // Hapus folder temporary (kosong)
                $sourceDir = storage_path('app/public/uploads/tmp/' . $image->folder);
                if ($file->exists($sourceDir)) { // Pastikan folder ada sebelum dihapus
                    $file->deleteDirectory($sourceDir);
                }

                $work->image = $image->folder . '/' . $image->filename; // Gunakan properti dari $image yang sudah dipastikan ada
                $image->delete();
            }     
        }
        if ($req->hasFile('fileku')) {
            $download_file = $req->file('fileku');
            $download_file_name = $download_file->getClientOriginalName();
            $newDirUnique = uniqid();
            $newDir = storage_path('app/public/uploads/tmp/' . $newDirUnique);
            Storage::makeDirectory($newDir);
            $download_file->move(storage_path('app/public/uploads/uploaded_file/' . $newDirUnique . '/'), $download_file_name);
            $work->download_file = $newDirUnique . '/' . $download_file_name;
        }
        $work->save();
        session()->flash('postsuccess', 'Post Added Successfully');
            return redirect()->route('manage_page_works'); // Atau redirect yang sesuai 
    }
}
