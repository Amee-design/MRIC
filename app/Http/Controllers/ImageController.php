<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class ImageController extends Controller
{
    public function saveImages(Request $request)
    {
        $image = $_FILES['pic']['name'];

        $size = $_FILES['pic']['size'];

        $extension = strtolower(pathinfo($image,PATHINFO_EXTENSION));

        $images = new Image();
        $images->title = $request->title;
        $images->description = $request->description;
        $images->link = $this->cleanStr($request->title).".".$extension;

        if(file_exists('{{url("/")}}/storage/app/public/images/'.$images->link)){
            echo '<script>alert("Image already exists!");history.back();</script>';
            exit();
        }

        if(DB::select("SELECT id FROM images WHERE link = '$images->link'")){
            echo '<script>alert("Image already exists!");history.back();</script>';
            exit();
        }

        if(($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png' || $extension == 'gif')  && $size < 2000000 ){

            if($request->file('pic')->storeAs('public/images', $images->link)){
                if($images->save()){
                    //success
                    echo '<script>history.back();</script>';
                }else{
                    echo '<script>alert("Image was not uploaded!");history.back();</script>';
                }
            }

        }else{
            echo '<script>alert("Ooooops! Sorry, the size of file you attempted to upload is either more than 2mb or the file extension is not supported.");history.back();</script>';
        }
    }
    public function uploadImages(Request $request)
    {
        $images = Image::all();
        return view('dashboard.uploadImages', compact('images'))->with('title', 'Upload Images');
    }
    public function videos()
    {
        return view('dashboard.videos')->with('title', 'Add Videos');
    }
    public function deleteImage(Request $request){

        $file = $request->file;

        $loc = Image::where('link',$file)->first();
        $deleted = $loc->delete();
        if($deleted){
            unlink('../storage/app/public/images/'.$file);
            return back();
        }else{
            echo '<script>alert("The server was unable to handle your request...");history.back();</script>';
        }
    }
}
