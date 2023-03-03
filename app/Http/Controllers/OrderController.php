<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Micanic;
use App\Models\Service;
use App\Traits\ApiTraits;
use App\Events\MicanicEvent;
use App\Models\Order_service;
use App\Traits\CustomHelpers;
use App\Mail\VerificationCode;
use App\Events\PodcastProcessed;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Resources\OrderResource;
use App\Http\Resources\ServiceResource;
use App\Http\Requests\StoreOrderRequest;
use App\Notifications\MicanicNotification;
use Illuminate\Support\Facades\Notification;

class OrderController extends Controller
{


    public function store(StoreOrderRequest $request)
    {
    $auth=Auth::guard('sanctum')->user();
    $getOrder =Order::where('user_id', $auth->id)->where('status','open')->first();

    
    $results = Micanic::where('id',$request->micanic_id)->first();
    $results= $results->Order;
    foreach ($results as $result ) {
    if ($result->status=='open' ) {
        break ;
        return ApiTraits::errorMessage('this micanic is busy success');
    }}        

    if($getOrder==null){
    $order = new Order;
    $order->micanic_id = $request->micanic_id;
    $order->user_id = $auth->id ;
    $order->Latitude = $request->Latitude;
    $order->longitude = $request->longitude;
    $order->save();
    for ($i=0; $i<sizeof($request->service_id);$i++) {  
        Order_service::insert([
            'order_id'   => $order->id ,
            'service_id' => $request->service_id[$i]
        ]);
        }  

        $orderN = Order::where('user_id',$auth->id)->where('status','open')->first();
        $results=$orderN->Service;
        $results=ServiceResource::collection($orderN->Service);
        $order->servicesName = $results;
        
        // $micanicNotify=Micanic::find($request->micanic_id);
        // $micanicNotify->notify(new MicanicNotification($order));

        broadcast(new PodcastProcessed($order))->toOthers();
       
        Micanic::where('id',$request->micanic_id)->update(['status' => 'Busy']);

    }else{
        return ApiTraits::errorMessage('you have an open order pleasr close first');

    }

     return ApiTraits::data(compact('order'),'results success');
    }


    


    public function show(Order $order)
    {
         $auth=Auth::guard('sanctum')->user();
        $results = Order::where('user_id',$auth->id)->get();
         return ApiTraits::data(compact('results'),'results success');

    }


    // public function delete($orderId)
    // {
    //     $results = Order::find($orderId);
    //     if($results==null){
    //         return  ApiTraits::errorMessage('you have error');
    //     }else{
    //         $results->delete();
    //         return ApiTraits::data(compact('results'),'results success');
    //     }

    // }

    public function showOpenOrderMicanic()
    {
        $auth=Auth::guard('sanctum')->user();
        $results = Order::where('status','open')->where('micanic_id',$auth->id)->first();
         return ApiTraits::data(compact('results'),'results success');
    }
    public function allOrders()
    {
        $results = Order::all();
         return ApiTraits::data(compact('results'),'results success');
    }


}
