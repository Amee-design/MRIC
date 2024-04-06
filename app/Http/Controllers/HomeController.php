<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\Page;
use App\Models\Slider;
use Illuminate\Support\Facades\Auth;
use App\Models\Image;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function updateSiteViews(){
        $sql = "SELECT count FROM site_views";
        $gc = DB::select($sql);
        if(count($gc) > 0){
            foreach($gc as $r){
                $cc = $r->count;
                $nc = ($cc+1);
                $sql = "UPDATE site_views SET count = '$nc'";
                DB::update($sql);
            }
        }else{
            $sql = "INSERT INTO site_views (count) VALUES ('1')";
            DB::insert($sql);
        }
    }

    public function index()
    {
        $this->updateSiteViews();
        $slider_images = Slider::all();
        $gallery = Gallery::all();
        $about = Page::where('page_title','About Us')->get();
        return view('welcome', compact('slider_images','gallery','about'))->with('title', 'Welcome | MRIC');
    }


    public function about()
    {
        $this->updateSiteViews();

        $about = Page::where('page_title','About Us')->get();
        $members = User::where('verified', '1')->get();
        $images = Image::all();
        return view('about', compact('about','members','images'))->with('title', 'About Us | MRIC');
    }

    public function contact(){
        $this->updateSiteViews();
        return view('contact')->with('title', 'Contact Us | MRIC');
    }
}
