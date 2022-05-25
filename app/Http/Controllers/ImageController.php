<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use League\Glide\Server;

class ImageController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Server $server , $path)
    {
        if($request->w < 150) {
            $w = 150;
        } else {
            $w = $request->w;
        }
        $h= $request->h;
        $fit = $request->fit;
        $bg = $request->bg;
        $server->outputImage($path, ['w' => $w, 'h' => $h , 'fit' => $fit ,'bg'=>$bg]);


    }
}
