<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Applicationstandalone as Application;
use App\Solution;

class SolutionController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reference  $reference
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Application $application)
    {
        return $application->solutions->where('category', $request->category); 
    }

     /**
     * Display the specified resource.
     *
     * @param  \App\Solution  $application
     * @return \Illuminate\Http\Response
     */
    public function show(Solution $solution)
    {
        // $systems = $solution->systems;
        // $products = $solution->products;
        // $solution['systems'] = $systems;
        // $solution['products'] = $products;
        return $solution->load(['systems', 'products', 'downloads']);
    }
}
