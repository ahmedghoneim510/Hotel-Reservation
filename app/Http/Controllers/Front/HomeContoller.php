<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Hotel;
use Illuminate\Http\Request;

class HomeContoller extends Controller
{
    public function index()
    {
        $hotels = Hotel::select()->take(3)->get();
        $aparments = Apartment::with('hotel')->take(4)->get();

        return view('front.home',[
            'hotels' => $hotels,
            'apartments' => $aparments,
        ]);
    }
    public function aboutUs(){
        return view('front.about');
    }
    public function services(){
        return view('front.services');
    }
    public function contacts(){
        return view('front.contacts');
    }
}
