<?php

namespace App\Http\Controllers;

// use App\Applicationstandalone as Application; //deprecated : to delete 
use App\Models\Application;
use Illuminate\Http\Request;
use App\System;
use App\Product;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { 
        return Application::all();
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Application $application)
    {
       if($request->has('load')){
           $application->load($request->load);
       }
        return($application);
    }
    
}
