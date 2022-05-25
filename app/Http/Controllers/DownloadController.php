<?php

namespace App\Http\Controllers;

use App\Application;
use App\Category;
use App\Download;
use App\System;
use App\Product;
use App\Http\Filters\DownloadFilter;
use Illuminate\Http\Request;
use ZipArchive;


class DownloadController extends Controller
{
    /**
     * Display a listing of the resource.
     *  @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = $request->c;
        $relation = $request->m;
        $id = $request->id;
        $categories = explode(',', $categories);

        $downloads = Category::whereIn('id', $categories)
                ->with('downloads', function ($query) use ($relation,$id) {
                    $query->whereHas($relation, function ($query) use ($id) {
                        $query->where('id', '=', $id);
                    });
                })
     ->get();

        return $downloads;
    }

    /**
     * Display a listing of the resource.
     *  @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function filter(DownloadFilter $filter)
    {

        // $systems = (System::whereHas('systemgroups' , function($query){
        //     $query->whereIn('id' , request()->input('systemgroups', []));
        // })->get())->pluck('id');

        // $products = (Product::whereHas('productlevel' , function($query){
        //     $query->whereIn('id' , request()->input('productLevels', []));
        // })->get())->pluck('id');    
        
        // $categories[] = request()->input('categories', null);


        // $downloads = Download::withFilters(
        //     $categories,
        //     request()->input('applications', []),
        //     $systems,
        //     $products           
        // )->get();

        return Download::filter($filter)->get();        

    }
    /**
     * generate zip files
     *  @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */

    public function bulk(Request $request) {
        if ($request->has('ids')) {
            // Define Dir Folder
            $public_dir=public_path().'/storage';

            // Zip File Name
            $zipFileName = 'Westwood_download.'.md5(time()).'.zip';
            // Create ZipArchive Obj
            $zip = new ZipArchive;
            if ($zip->open($public_dir . '/temp/' . $zipFileName, ZipArchive::CREATE) === true) {
                // Add File in ZipArchive
                foreach($request->ids as $file){
                    $file_path = $public_dir.$file;
                    $file_name = str_replace('/','',$file);
                    $zip->addFile($file_path, $file_name);
                }
                // Close ZipArchive
                $zip->close();
            }
            return($zipFileName);
            // // Set Header
            // $headers = array(
            //     'Content-Type' => 'application/octet-stream',
            // );
            // $filetopath=$public_dir.'/'.$zipFileName;
            // // Create Download Response
            // if (file_exists($filetopath)) {
            //     return response()->download($filetopath, $zipFileName, $headers);
            // }
        }

    }


}
