<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\System;

class SystemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        return System::all();
    }
    
   /**
     * Display the specified resource.
     *
     * @param  App\Models\System  $system
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, System $system)
    {
       if($request->has('load')){
           $system->load($request->load);
       }
        return($system);
    }
}
