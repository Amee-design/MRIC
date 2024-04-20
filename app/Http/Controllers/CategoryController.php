<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Image;

class CategoryController extends Controller
{
    public function categories()
    {
        $categories = Category::latest()->get();
        return view('admin.categories', compact('categories'));
    }

    public function addCategory(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $slug = Str::slug($request->title);

        $category = new Category();
        $category->title = $validatedData['title'];
        $category->slug = $slug;
        $category->description = $validatedData['description'];

        if ($category->save()) {
            return back()->with('success', 'Category added');
        }

        return back()->with('error', 'The server is unable to handle your request at the moment!');
    }

    public function update(Request $request)
    {
        $title = $request->title;

        $slug = Str::slug($request->title);

        $description = $request->description;
        $id = $request->id;
        $category = Category::find($id);
        $category->title = $title;
        $category->slug = $slug;
        $category->description = $description;

        if($category->save()){
            return back()->with('success', 'Category updated');
        }

        return back()->with('error', 'The server is unable to handle your request at the moment!');
    }

    public function getCategory(Request $request)
    {
        $id = $request->id;
        $data = Category::find($id);
        return response()->json(['status'=>'success', 'data'=>$data]);
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $category = Category::find($id);
        if(!$category){
            return back()->with('error', 'Category not found!');
        }
        if ($category->delete()) {
            return back()->with('success', 'Category deleted');
        }

        return back()->with('error', 'The server is unable to handle your request at the moment!');
    }

}
