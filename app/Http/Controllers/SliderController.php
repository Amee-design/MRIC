<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Slider;
use Illuminate\Support\Facades\DB;

class SliderController extends Controller
{

    public function index()
    {
        $images = Image::all();
        $slider_images = Slider::all();
        return view('admin.sliders', compact('images','slider_images'));
    }
    public function destroy(Request $request){
        $file = $request->file;
        $sql = "DELETE FROM sliders WHERE img = ?";
        if(DB::delete($sql,[$file])){
            return back();
        }else{
            echo '<script>alert("The server was unable to handle your request!");history.back();</script>';
        }
    }
    public function store(Request $request){
        $slider = new Slider();
        $slider->img = $request->title;
        $slider->alt_text = str_replace("-", " ", $request->title);

        if($slider->save()){
            return back();
        }else{
            echo '<script>alert("The server was unable to handle your request...");history.back();</script>';
        }
    }

}
