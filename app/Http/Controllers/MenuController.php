<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application;
use App\Systemgroup;
use App\Productlevel;
use App\Reference;
use App\System;

class MenuController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applications = Application::all()->keyBy('id');
        $systemgroups = Systemgroup::all()->keyBy('id');
        $productlevels = Productlevel::all()->keyBy('id');
        $references = Reference::orderBy('prio' , 'desc')->get()->keyBy('id');
        $selectedRefs = Reference::all()->take(10)->sortByDesc('prio'); 
        $systems = System::all()->keyBy('id');

        return [
            'applications' => $applications,
            'systemgroups' => $systemgroups,
            'productlevels' => $productlevels,
            'references' => $references,
            'systems' => $systems,
            'selectedRefs' => $selectedRefs
        ];
    }
    
}
