<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Page;
use App\Models\Image;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::paginate(30);
        $images = Image::all();
        return view('admin.pages', compact('pages', 'images'));
    }
    public function store(Request $request){
        $page = new Page();
        $page->thumbnail = null;
        $page->title = $request->title;
        $page->link = Str::slug($request->title);
        $page->description = $request->description;
        $page->content = $request->content;
        $page->keywords = $request->keywords;
        $page->status = $request->status;

        if($page->save()){
            echo '<script>alert("Page was saved successfully!");history.back();</script>';
        }else{
            echo '<script>alert("The server is unable to handle your request at the moment!");</script>';
        }
    }
    public function edit(Request $request)
    {
        if($request->page_id){
            $pid = $request->page_id;
            $page = Page::find($pid);
            $images = Image::all();
            return view('admin.editPage', compact('page','images'));
        }else{
            return back();
        }
    }
    public function update(Request $request){

        $page = Page::find($request->pid);
        $page->thumbnail = null;
        $page->description = $request->description;
        $page->content = $request->myTextArea;
        $page->keywords = $request->keywords;
        $page->status = $request->status;

        if($page->update()){
            echo '<script>alert("Page was updated successfully!");history.back();</script>';
        }else{
            echo '<script>alert("The server is unable to handle your request at the moment!");</script>';
        }
    }
    public function pages()
    {
        $pages = Page::all();
        return view('admin.pages', compact('pages'))->with('title', 'Site Pages');
    }
}
