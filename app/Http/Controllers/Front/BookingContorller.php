<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingContorller extends Controller
{
    public function index(){

        $bookings=Booking::where('user_id',Auth::id())->paginate(8);
      //  dd($bookings);
        return view('front.booking',compact('bookings'));
    }
}
