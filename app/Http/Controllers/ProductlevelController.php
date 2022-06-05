<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productlevel;
use App\System;
use App\Product;

class ProductlevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Productlevel::all();
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Models\Productlevel  $productlevel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Productlevel $productlevel)
    {
       if($request->has('load')){
           $productlevel->load($request->load);
       }
        return($productlevel);
    }
}
