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
use App\Models\Media;
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
        $about = Page::where('title','About Us')->first();
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
        $details = Setting::first();
        return view('page', compact('page', 'pages', 'latest', 'details'));
    }

    public function contact(){
        $this->updateSiteViews();
        $pages = $this->pages();
        $details = Setting::first();
        return view('contact', compact('pages', 'details'));
    }

    public function media(){
        $this->updateSiteViews();
        $pages = $this->pages();
        $details = Setting::first();
        $media = Media::paginate(12);
        return view('media', compact('pages', 'details', 'media'));
    }

    public function donation(){
        $this->updateSiteViews();
        $pages = $this->pages();
        $latest = Post::latest()->limit(12)->get();
        $details = Setting::first();
        return view('donation', compact('pages', 'latest', 'details'));
    }

    public function onHold()
    {
        $pages = $this->pages();
        $details = Setting::first();
        return view('onhold', compact('details', 'pages'));
    }
}
