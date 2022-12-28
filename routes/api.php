<?php

use App\Http\Controllers\ExpertController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SearchController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Login And Register
Route::group(['middleware'=>['auth','isAdmin']],function(){


});

Route::post('register',[LoginController::class,'register']);
Route::post('login',[LoginController::class,'login']);

//Every thing else
Route::get('blog',[ExpertController::class,'index']);
Route::get('blog/{id}',[ExpertController::class,'show']);
Route::post('blog',[ExpertController::class,'store']);
Route::get('blog/edit/{id}',[ExpertController::class,'edit']);
Route::patch('blog/{id}',[ExpertController::class,'update']);
Route::post('blog/create',[ExpertController::class,'create']);



//search


    Route::get('search', [SearchController::class,'Search']);

    Route::get('autocomplete', [SearchController::class,'autocomplete']);
