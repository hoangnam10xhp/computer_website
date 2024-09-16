<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banner = Banner::all();
        return view('admin.banner.index', compact('banner'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $banner = Banner::all();
        return view('admin.banner.create', compact('banner'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'title'=>'required|string|max:255',
            'image_path'=>'nullable|image|mimes:png,svg,jpeg|max:10048',
            'link'=>'required|string|max:255',
        ]);

        $image = null;
        if ($request->hasFile('image_path')) {
            $image = $request->file('image_path')->store('image_path', 'public');
        }

        Banner::create([
            'title'=>$request->input('title'),
            'image_path'=>$image,
            'link'=>$request->input('link'),
        ]);

        return redirect()->route('banner.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $banner = Banner::findOrFail($id);
        return view('admin.banner.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required|string|max:255',
            'image_path'=>'nullable|image|mimes:png,svg,jpeg|max:10048',
            'link'=>'required|string|max:255',
        ]);

        $banner = Banner::findOrFail($id);

        $image = $banner->image_path;
        if ($request->hasFile('image_path')) {
            if($banner->image_path){
                Storage::disk('public')->delete($banner->image_path);
            }
            $banner->image_path = $request->file('image_path')->store('image_path','public');
        }

        $banner->update([
            'title'=>$request->input('title'),
            'link'=>$request->input('link'),
        ]);

        return redirect()->route('banner.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);


        $banner->delete();
        return redirect()->route('banner.index');
    }
}
