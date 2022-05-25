<?php

namespace App\Http\Controllers;

use App\Category;
use App\System;
use App\Product;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Category
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $systems = (System::whereHas('systemgroups', function ($query) {
        //     $query->whereIn('id', request()->input('systemgroups', []));
        // })->get())->pluck('id');

        // $products = (Product::whereHas('productlevel', function ($query) {
        //     $query->whereIn('id', request()->input('productLevels', []));
        // })->get())->pluck('id');

        // $categories[] = request()->input('categories', null);

        // $applications = Category::withCount(['downloads' => function ($query) use ($systems, $products, $categories) {
        //     $query->withFilters(
        //         $categories,
        //         request()->input('applications', []),
        //         $systems,
        //         $products
        //     );
        // }])
        //     ->get();
        // return $applications;
        return Category
            ::with(['childs' => function($q) { 
                $q -> orderBy('prio' , 'DESC');
            }])
            ->whereNull('category_id')
            ->orderBy('prio' , 'DESC')
            ->get();
    }
}
