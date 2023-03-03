<?php

namespace App\Http\Controllers;

use Stripe\Charge;
use Stripe\Stripe;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Order_service;
use App\Models\Payment;
use App\Models\payments;
use Stripe\StripeClient;
use App\Traits\ApiTraits;
use Illuminate\Http\Request;
use App\Traits\CustomHelpers;
use App\Http\Requests\StripeRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;
use App\Http\Resources\ServiceResource;
use App\Http\Requests\webStore\StorecartRequest;

class PaymentController extends Controller
{


    public function store(StripeRequest $request)
    {
        $user=Auth::guard('sanctum')->user();

        $order = Order::where('user_id',$user->id)->where('status','open')->first();
        $results=$order->Service;
        $results=ServiceResource::collection($order->Service);
         $sums=0;
        foreach ($results as $result ) {
              $sums+=$result->price;
        }

         $stripe = new StripeClient(env('STRIPE_SECRET'));
           $stripeToken=$stripe->tokens->create([
             'card' => [
                 'number' => $request->number,
                 'exp_month' => $request->exp_month,
                 'exp_year' => $request->exp_year,
                 'cvc' => $request->cvc,
             ],
           ]);
         Stripe::setApiKey(env('STRIPE_SECRET'));
         Charge::create([
                 'amount' => 100 *  $sums,
                 'currency' => 'egp',
                 "source" =>$stripeToken,
                 'description' => 'desc',
             ]); 
 
 

        $payments = new Payment; 
        $payments->total_price = $sums ;
        $payments->order_id=$order->id  ;
        $payments->save();

         Order_service::where('order_id',$order->id)->delete();
         
        return ApiTraits::data(compact('payments'),'results success');
         
     }





    public function showllPayments()
    {
         $Payments=Payment::all();
         return ApiTraits::data(compact('Payments'),'results success');

    }


    public function UserPayments()
    {
        $results=[];
        $user=Auth::guard('sanctum')->user();
        $Payments=Order::select('id')->where('user_id',$user->id)->get();
        foreach($Payments as $Payment){
                $P=Order::find($Payment->id);
                $last=$P->Payment;
                array_push($results, $last);
        }
         return ApiTraits::data(compact('results'),'results success');

    }


    public function getTotalPayments()
    {
        $totalPrice=Payment::all()->sum('total_price');
        return ApiTraits::data(compact('totalPrice'),'results success');

    }


    public function clear()
    {
        Payment::truncate();
        return ApiTraits::successMessage("done");
    
    }
}

