<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Gallery;
use Illuminate\Support\Facades\DB;

class GalleryController extends Controller
{
    public function gallery()
    {
        $images = Image::all();
        $gallery_images = Gallery::all();
        return view('dashboard.gallery', compact('images','gallery_images'))->with('title', 'Update Gallery');
    }
    public function updateGallery(Request $request){
        $gallery = new Gallery();
        $gallery->img = $request->title;
        $gallery->description = str_replace("-"," ",$request->title);

        if($gallery->save()){
            return back();
        }else{
            echo '<script>alert("The server was unable to handle your request...");history.back();</script>';
        }
    }
    public function deleteGallery(Request $request){
        $file = $request->file;
        $sql = "DELETE FROM galleries WHERE img = ?";
        if(DB::delete($sql,[$file])){
            return back();
        }else{
            echo '<script>alert("The server was unable to handle your request!");history.back();</script>';
        }
    }
}
