<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Booking;
use App\Models\Hotel;
use DateTime;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function show($id)
    {
        $apartments = Hotel::find($id)->apartments;
        $hotel = Hotel::find($id);
        return view('front.hotel',[
            'apartments' => $apartments,
            'hotel' => $hotel,
        ]);
    }
    public function showDetail($id)
    {
        $room=Apartment::findOrFail($id);
        return view('front.room',['room'=>$room]);
    }
    public function roomBooking(Request $request,$id)
    {
//       dd($request->all());
        $request->validate([

            'check_in' => 'required|date',
            'check_out' => 'required|date|after_or_equal:check_in',
            'email' => 'required|string',
            'phone_number' => 'required|string',
            'name'=>'required|string',

        ]);
        try {
            $room=Apartment::findOrFail($id);
            $checkIn = new DateTime($request->check_in);
            $checkOut = new DateTime($request->check_out);
            $interval = $checkIn->diff($checkOut);
            $daysDifference = $interval->days;
            //dd($daysDifference);
            $book=Booking::create([
                'apartment_id' => $id,
                'user_id' => auth()->id(),
                'email' => $request->email,
                'phone' => $request->phone_number,
                'check_in' => $request->check_in,
                'check_out' => $request->check_out,
                'total_nights' => $daysDifference,
                'total_price' => $daysDifference * $room->price,
            ]);
            return to_route('hotel.payment',$book->id);
        }catch (\Exception $e){
            return back()->with('error','Something went wrong! Please try again.');
        }

    }
}
