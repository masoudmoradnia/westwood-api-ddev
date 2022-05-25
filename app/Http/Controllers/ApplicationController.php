<?php

namespace App\Http\Controllers;

use App\Applicationstandalone as Application;
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
        // if ($request->filter == 'download') {
        //     return $this->get_Filterd_applications();
        // }

        return Application::all();
    }

    /**
     * returns filterd applications for mediathek
     * ToDo: refactor using filter class
     */

    // private function get_Filterd_applications()
    // {
    //     $systems = (System::whereHas('systemgroups', function ($query) {
    //         $query->whereIn('id', request()->input('systemgroups', []));
    //     })->get())->pluck('id');

    //     $products = (Product::whereHas('productlevel', function ($query) {
    //         $query->whereIn('id', request()->input('productLevels', []));
    //     })->get())->pluck('id');

    //     $applications = Application::withCount(['downloads' => function ($query) use ($systems, $products) {
    //         $query->withFilters(
    //             request()->input('categories', []),
    //             request()->input('applications', []),
    //             $systems,
    //             $products
    //         );
    //     }]) ->get();
    //     return $applications;
    // }
}
