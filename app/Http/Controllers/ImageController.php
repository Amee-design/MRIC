<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function cleanStr($str){

        $link = trim($str);

        $link = strtolower(str_replace(" ", "-", $link));

        $link = str_replace("?", "", $link);

        $link = str_replace(".", "", $link);

        $link = str_replace("(", "", $link);
        $link = str_replace(")", "", $link);
        $link = str_replace("<", "", $link);
        $link = str_replace(">", "", $link);
        $link = str_replace("&", "", $link);
        $link = str_replace("'", "", $link);
        $link = str_replace(",", "", $link);
        $link = str_replace("/", "-", $link);
        $link = str_replace("%", "", $link);
        $link = str_replace("'s", "s", $link);
        $link = str_replace(":", "", $link);
        $link = str_replace(";", "", $link);

        return $link;

    }

    public function index()
    {
        $images = Image::paginate(12);
        return view('admin.images', compact('images'))->with('title', 'Upload Images');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $validatedData = $request->validate([
                'pic' => 'required|image|max:2048',
                'title' => 'required|string',
                'description' => 'nullable|string',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            $errors = $e->validator->getMessageBag();
            $errorMessages = '';

            foreach ($errors->all() as $error) {
                $errorMessages .= $error . '.';
            }

            return back()->with('error', 'Validation failed:<br>' . $errorMessages);
        }

        $image = $request->file('pic');
        $extension = $image->extension();
        $imageName = $this->cleanStr($validatedData['title']) . '.' . $extension;

        // Check if the image already exists
        if (Storage::exists('public/images/' . $imageName) || Image::where('link', $imageName)->exists()) {
            return redirect()->back()->with('error', 'Image already exists!');
        }

        // Store the image and save the record
        if ($image->storeAs('public/images', $imageName)) {
            $newImage = new Image();
            $newImage->title = $validatedData['title'];
            $newImage->description = $validatedData['description'];
            $newImage->link = $imageName;

            if ($newImage->save()) {
                return redirect()->back()->with('success', 'Image uploaded successfully!');
            } else {
                Storage::delete('public/images/' . $imageName); // Delete the uploaded image if saving failed
                return redirect()->back()->with('error', 'Failed to save image.');
            }
        } else {
            return redirect()->back()->with('error', 'Failed to upload image.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $file = $request->file;

        $loc = Image::where('link',$file)->first();
        $deleted = $loc->delete();
        if($deleted){
            unlink('../storage/app/public/images/'.$file);
            $response['status'] = "success";
            $response['message'] = "Image deleted successfully!";
            echo json_encode($response);
        }else{
            $response['status'] = "failed";
            $response['message'] = "Image was not deleted!";
            echo json_encode($response);
        }
    }
}
