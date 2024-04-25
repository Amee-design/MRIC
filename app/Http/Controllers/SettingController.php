<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Image;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Setting::first();
        $images = Image::all();
        return view('admin.settings', compact('data', 'images'));
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
        $id = $request->id;

        $found = Setting::find($id);

        if($found){
            $setting = Setting::find($id);
        }else{
            $setting = new Setting();
        }

        $setting->title = $request->title;
        $setting->logo = $request->logo;
        $setting->description = $request->description;
        $setting->keywords = $request->keywords;
        $setting->address = $request->address;
        $setting->phone = $request->phone;
        $setting->email = $request->email;
        $setting->x = $request->x;
        $setting->ig = $request->ig;
        $setting->fb = $request->fb;
        $setting->vision = $request->vision;
        $setting->mission = $request->mission;
        $setting->core_values = $request->values;

        if($setting->save())
        {
            return back()->with('success', 'Changes saved successfully!');
        }

        return back()->with('error', 'The server is unable to handle your request at the moment!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Setting $setting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
