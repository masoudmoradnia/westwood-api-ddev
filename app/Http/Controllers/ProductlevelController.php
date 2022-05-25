<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Productlevel;
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
        // $query_systems = (System::whereHas('systemgroups', function ($query) {
        //     $query->whereIn('id', request()->input('systemgroups', []));
        // })->get())->pluck('id');

        // $query_products = (Product::whereHas('productlevel', function ($query) {
        //     $query->whereIn('id', request()->input('productLevels', []));
        // })->get())->pluck('id');

        // $categories[] = request()->input('categories', null);


        // // there is no relation between downloads and productlevels  so first get count of downloads for alle products
        // $products = Product::withCount(['downloads' => function ($query) use ($query_systems, $query_products, $categories) {
        //     $query->withFilters(
        //         $categories,
        //         request()->input('applications', []),
        //         $query_systems,
        //         $query_products
        //     );
        // }])->get();
        // $products = $products->keyBy('id');

        // // now get all systemgroups
        // $productlevels = Productlevel::All();
        // $productlevelsModified=[];
        // foreach ($productlevels as $productlevel) {
        //     $productlevel->downloads_count = 0;
        //     $productIds = $productlevel->products->keyBy('id')->keys()->all();
        //     foreach ($products as $productid=>$product) {
        //         if (in_array($productid, $productIds)) {
        //             $productlevel->downloads_count += $product->downloads_count;
        //         }
        //     }
        //     $productlevelsModified[] = $productlevel;
        // }
        
        // return $productlevelsModified;

        return Productlevel::all();
    }
}
