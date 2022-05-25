<?php

namespace App\Http\Controllers;

use App\Reference;
use App\Applicationstandalone;
use App\Http\Filters\ReferenceFilter;
use App\System;
use App\Systemgroup;
use Illuminate\Http\Request;

class ReferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ReferenceFilter $filter)
    {
        $references_ids =  Reference::filter($filter)->get()->pluck('id');

         $referencesGroupedByApplication = Applicationstandalone::with(['referencesmm'=> function ($q) use ($references_ids) {
            $q->orderBy('prio', 'desc')->whereIn('id', $references_ids);
        }]) -> get();
       
        // foreach($referencesGroupedByApplication as $key=>$application) {
        //     if(!sizeof($application['referencesmm'])) {
        //         unset($referencesGroupedByApplication[$key]);
        //     }
        // }

        return $referencesGroupedByApplication;
        
       
    }

    
}
