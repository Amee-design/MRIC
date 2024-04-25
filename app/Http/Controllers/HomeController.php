<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\Page;
use App\Models\Slider;
use Illuminate\Support\Facades\Auth;
use App\Models\Image;
use App\Models\Post;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    private function pages()
    {
        $pages = Page::where('title', '!=', 'About Us')->get();
        return $pages;
    }

    public function updateSiteViews(){
        $sql = "SELECT count FROM views";
        $gc = DB::select($sql);
        if(count($gc) > 0){
            foreach($gc as $r){
                $cc = $r->count;
                $nc = ($cc+1);
                $sql = "UPDATE views SET count = '$nc'";
                DB::update($sql);
            }
        }else{
            $sql = "INSERT INTO views (count) VALUES ('1')";
            DB::insert($sql);
        }
    }

    public function index()
    {
        $this->updateSiteViews();
        $slider_images = Slider::all();
        $gallery = Gallery::all();
        $pages = $this->pages();
        $about = Page::where('title','About Us')->get();
        $events = Post::latest()->limit(3)->get();
        $details = Setting::first();
        return view('welcome', compact('slider_images','gallery','about', 'events','details','pages'));
    }

    public function page(Request $request)
    {
        $this->updateSiteViews();

        $link = $request->slug;

        $latest = Post::latest()->limit(12)->get();

        $page = Page::where('link', $link)->first();
        if (!$page) {
            abort(404);
        }
        $pages = $this->pages();
        return view('page', compact('page', 'pages', 'latest'));
    }

    public function contact(){
        $this->updateSiteViews();
        $pages = $this->pages();
        return view('contact', 'pages');
    }

    public function donation(){
        $this->updateSiteViews();
        $pages = $this->pages();
        $latest = Post::latest()->limit(12)->get();
        return view('donation', compact('pages', 'latest'));
    }

    public function onHold()
    {
        return view('onhold')->with('title', 'Account On-hold | MRIC');
    }
}
