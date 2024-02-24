<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Srmklive\PayPal\Facades\PayPal;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Illuminate\Support\Facades\Session;

class PaypalController extends Controller
{
    public function handlePayment($id)
    {
        $booking = Booking::findOrFail($id);
        Session::put('id',$booking->id);
        Session::put('user_id',Auth::id());
        $provider = new PayPalClient(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $provider->setAccessToken($paypalToken);

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => 'http://localhost:8000/paypal/payment/success',
                "cancel_url" => 'http://localhost:8000/paypal/payment/cancel',
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $booking['total_price'],
                    ],
                    "custom_id"=> $booking['id'],
                ]
            ]
        ]);
        if (isset($response['id']) && $response['id'] != null) {

            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }

            return redirect()
                ->route('cancel.payment')
                ->with('error', 'Something went wrong.');

        } else {
            return redirect()
                ->route('hotel.room.booking')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }





    }

    public function paymentCancel()
    {
        dd('Your payment is canceled. You can create cancel page here.');

    }

    public function paymentSuccess(Request $request)
    {
        $booking_id=Session::get('id');
        $user_id=Session::get('user_id');


        Session::forget('id');
        Session::forget('user_id');

        // login
        $user=User::find($user_id);
        Auth::login($user);


        $provider = new PayPalClient(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);
        // check status of payment
        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            $booking=Booking::findOrFail($booking_id);
            $booking->update([
                'status'=>'approved',
            ]);
            return redirect()
                ->route('home')
                ->with('success', 'Transaction complete.');
        } else {
            return redirect()
                ->route('home')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }
}
