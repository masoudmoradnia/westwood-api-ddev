<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Application;
use App\Productlevel;
use App\Reference;
use App\Solution;
use App\System;
use App\Systemgroup;


class SearchController extends Controller
{
    public function index(Request $request) {
        
        $term = $request->search_term;

        $results['Product'] = Product::search($term)->get();
        $results['Application'] = Application::search($term)->get();
        $results['Productlevel'] = Productlevel::search($term)->get();
        $results['Reference'] = Reference::search($term)->get();
        $results['Solution'] = Solution::search($term)->get();
        $results['System'] = System::search($term)->get();
        $results['Systemgroup'] = Systemgroup::search($term)->get();

        return $results;

    }
}
