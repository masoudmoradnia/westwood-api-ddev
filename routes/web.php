<?php

use Illuminate\Support\Facades\Route;
use App\Download;
use App\Reference;
use App\Category;
use App\Events\AddDownload;
use App\Events\AddSytemGroupRelationToReferences;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/updateRelations', function () {
    // update download relations
    $downloads = Download::all();
    foreach ($downloads as $download) {
        AddDownload::dispatch($download);
    }
    // update download relations
    $refernces = Reference::all();
    foreach ($refernces as $refernce) {
        AddSytemGroupRelationToReferences::dispatch($refernce);
    }

})->middleware('auth');

Route::get('/', function () {
    // dd(Category::find(26)->childs->first()->title);
});




Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
