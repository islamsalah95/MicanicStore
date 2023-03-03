<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Traits\ApiTraits;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addService(StoreServiceRequest $request )
    {
        $results=Service::create(['name' => $request->name,'price' => $request->price]);
       
        return ApiTraits::data(compact('results'),'results success');

    }

    public function allServices( )
    {
        $results=Service::get();
       
        return ApiTraits::data(compact('results'),'results success');

    }
 
}
