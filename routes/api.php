<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\ReferenceController;
use App\Http\Controllers\SolutionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\SystemgroupController;
use App\Http\Controllers\ProductlevelController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ImageController;


use App\Download;
use App\Category;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});




Route::get('/menu', [MenuController::class, 'index']);
Route::get('/downloads', [DownloadController::class, 'index']);
Route::get('/downloads/bulk', [DownloadController::class, 'bulk']);
Route::get('/filterdDownloads', [DownloadController::class, 'filter']); // toDo : merge with /downloads
Route::get('/reference', [ReferenceController::class, 'index']);
Route::get('/solution/application/{application}', [SolutionController::class, 'index']);
Route::get('/solution/{solution}', [SolutionController::class, 'show']);
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/applications', [ApplicationController::class, 'index']);
Route::get('/systemgroups', [SystemgroupController::class, 'index']);
Route::get('/productlevels', [ProductlevelController::class, 'index']);
Route::get('/search', [SearchController::class, 'index']);
Route::get('/img/{path}', [ImageController::class, 'show']);

// Route::get('/img/{path}' , function(League\Glide\Server $server , $path) {
//     $server->outputImage($path, ['w' => 300, 'h' => 400]);

// });



