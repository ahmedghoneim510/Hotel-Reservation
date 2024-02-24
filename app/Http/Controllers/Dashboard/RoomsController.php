<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms=Apartment::with('hotel')->paginate();
        return view('dashboard.rooms.index',compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $hotels=Hotel::all();
        return view('dashboard.rooms.create',compact('hotels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:255',
            'hotel_id'=>'required',
            'view'=>'required|string|max:255',
            'num_beds'=>'required|string|max:255',
            'max_person'=>'required|string|max:255',
            'size'=>'required|string|max:255',
            'price'=>'required|string|max:255',
            'image'=>'required|image',
        ]);
        $path=$this->upload_image($request);
        Apartment::create([
            'name'=>$request->name,
            'hotel_id'=>$request->hotel_id,
            'max_person'=>$request->max_person,
            'view'=>$request->view,
            'num_beds'=>$request->num_beds,
            'size'=>$request->size,
            'price'=>$request->price,
            'image'=>$path,
        ]);
        return to_route('admin.rooms.index');
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
        $room=Apartment::find($id);
        $hotels=Hotel::all();
        return view('dashboard.rooms.edit',compact('room','hotels'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>'required|string|max:255',
            'hotel_id'=>'required',
            'view'=>'required|string|max:255',
            'num_beds'=>'required|string|max:255',
            'max_person'=>'required|string|max:255',
            'size'=>'required|string|max:255',
            'price'=>'required|string|max:255',
            ]);
        $data=$request->except('image');
        $room=Apartment::find($id);
        $path=$room->image;
        if($request->has('image')){
            $path=$this->upload_image($request);
        }
        $data['image']=$path;
        //dd($data);
        $room->update($data);
        return to_route('admin.rooms.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $room=Apartment::find($id);
        if($room->image){
            Storage::disk('public')->delete($room->image);
        }
        $room->delete();
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
