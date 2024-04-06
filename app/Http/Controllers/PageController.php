<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Image;

class PageController extends Controller
{
    public function newPage()
    {
        return view('dashboard.newPage')->with('title', 'Make New Page');
    }
    public function savePage(Request $request){
        $page = new Page();
        $page->thumbnail = $request->thumbnail;
        $page->title = $request->title;
        $page->link = $this->cleanStr($request->title);
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
    public function editPage(Request $request)
    {
        if($request->id){
            $pid = $request->id;
            $page = Page::where('id','=', $pid)->get();
            $images = Image::all();
            return view('dashboard.editPage', compact('page','images'))->with('title', 'Edit Page');
        }else{
            return back();
        }
    }
    public function updatePage(Request $request){

        $page = Page::find($request->pid);
        $page->thumbnail = $request->thumbnail;
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
        return view('dashboard.pages', compact('pages'))->with('title', 'Site Pages');
    }
}
