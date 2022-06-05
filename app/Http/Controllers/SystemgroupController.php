<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Systemgroup; deprecated : to delete
use App\Models\Systemgroup;
use App\System;
use App\Product;

class SystemgroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        return Systemgroup::all();
    }
    
   /**
     * Display the specified resource.
     *
     * @param  App\Models\Systemgroup  $systemgroup
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Systemgroup $systemgroup)
    {
       if($request->has('load')){
           $systemgroup->load($request->load);
       }
        return($systemgroup);
    }
}
