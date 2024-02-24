<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HotelsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hotels = Hotel::paginate();
        return view('dashboard.hotels.index',compact('hotels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.hotels.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string', // Add this line
            'description' => 'required|string',
            'image' => 'required|image',
        ]);
        $path=$this->upload_image($request);
        $hotel = Hotel::create([
            'name' => $request->name,
            'description' => $request->description,
            'address' => $request->address, // Add this line
            'image' => $path,
        ]);
        return to_route('admin.hotels.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $hotel=Hotel::find($id);
        return view('dashboard.hotels.edit',compact('hotel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string', // Add this line
            'description' => 'required|string',
            'image' => 'nullable|image',
        ]);
        $hotel=Hotel::find($id);
        $path=$hotel->image;
        if($request->hasFile('image')){
            $path=$this->upload_image($request);
        }
        $hotel->update([
            'name' => $request->name,
            'description' => $request->description,
            'address' => $request->address, // Add this line
            'image' => $path,
        ]);
        return to_route('admin.hotels.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $hotel=Hotel::find($id);
        if($hotel->image){
            Storage::disk('public')->delete($hotel->image);
        }
        $hotel->delete();
        return to_route('admin.hotels.index');
    }
    public function upload_image(Request $request)
    {
        if(!$request->hasFile('image')){
            return;
        }
        $file=$request->file('image');
        $path=$file->store('uploads',[
            'disk'=>'public'
        ]);
        return $path;
    }
}
