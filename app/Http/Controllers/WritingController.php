<?php

namespace App\Http\Controllers;

use App\Models\WritingModel;
use App\Models\TemporaryImageModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Support\Facades\Storage;
use Illuminate\Filesystem\Filesystem;

class WritingController extends Controller
{
    use InteractsWithMedia;
    use HasFactory;
    public function add_featured(Request $req)
    {
        $writing = new WritingModel;
        $writing->title = $req->title;
        $writing->content = $req->content;
        $writing->views = 0;
        $temporary = new TemporaryImageModel();
        $image = $temporary->where('folder', $req->imageku)->first();
        if ($image) { // Pengecekan apakah $image tidak null

            $file = new Filesystem();
            $sourceFile = storage_path('app/public/uploads/tmp/' . $image->folder);
            $destinationFile = storage_path('app/public/uploads/uploaded_image/' . $image->folder); // Path lengkap

            // Pastikan direktori tujuan ada
            $destinationDir = storage_path('app/public/uploads/uploaded_image');


            if ($file->exists($sourceFile)) { // Periksa apakah file sumber ada
                $file->move($sourceFile, $destinationFile); // Pindahkan file


                // Hapus folder temporary (kosong)
                $sourceDir = storage_path('app/public/uploads/tmp/' . $image->folder);
                if ($file->exists($sourceDir)) { // Pastikan folder ada sebelum dihapus
                    $file->deleteDirectory($sourceDir);
                }

                $writing->image = $image->folder . '/' . $image->filename; // Gunakan properti dari $image yang sudah dipastikan ada
            }

            $writing->save();
            return redirect()->route('manage_page_featured'); // Atau redirect yang sesuai
        }
    }
}
