<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Systemgroup;
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
        // if ($request->filter == 'download') {
        //     return $this->get_Filterd_system_groups();
        // }
        return Systemgroup::all();
    }
    
    /**
     * returns filterd system groups for mediathek
     * toDo: refactor using filter class
     */
    // private function get_Filterd_system_groups()
    // {
    //     $query_systems = (System::whereHas('systemgroups', function ($query) {
    //         $query->whereIn('id', request()->input('systemgroups', []));
    //     })->get())->pluck('id');

    //     $query_products = (Product::whereHas('productlevel', function ($query) {
    //         $query->whereIn('id', request()->input('productLevels', []));
    //     })->get())->pluck('id');

    //     $categories[] = request()->input('categories', null);


    //     // there is no relation between downloads and system group so first get count of downloads for alle systems
    //     $systems = System::withCount(['downloads' => function ($query) use ($query_systems, $query_products, $categories) {
    //         $query->withFilters(
    //             $categories,
    //             request()->input('applications', []),
    //             $query_systems,
    //             $query_products
    //         );
    //     }])->get();
    //     $systems = $systems->keyBy('id');

    //     // now get all systemgroups
    //     $systemgroups = Systemgroup::All();
    //     $systemgroupModified=[];
    //     foreach ($systemgroups as $systemgroup) {
    //         $systemgroup->downloads_count = 0;
    //         $systemIds = $systemgroup->systems->keyBy('id')->keys()->all();
    //         foreach ($systems as $systemid=>$system) {
    //             if (in_array($systemid, $systemIds)) {
    //                 $systemgroup->downloads_count += $system->downloads_count;
    //             }
    //         }
    //         $systemgroupModified[] = $systemgroup;
    //     }
        
    //     return $systemgroupModified;
    // }
}
