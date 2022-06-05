<?php

namespace App\Http\Controllers;

use App\Models\Reference;
use App\Reference as DReference; //deprecated : to delete (maybe!)
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
    public function index(Request $request , ReferenceFilter $filter)
    {
        if ($request->has('filter')) {
            $references_ids =  DReference::filter($filter)->get()->pluck('id');
            $referencesGroupedByApplication = Applicationstandalone::with(['referencesmm' => function ($q) use ($references_ids) {
                $q->orderBy('prio', 'desc')->whereIn('id', $references_ids);
            }])->get();
            return $referencesGroupedByApplication;
        }
        return Reference::orderBy('prio', 'desc')->take(20)->get();




    }
}
