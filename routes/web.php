<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ExpertController;

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

//Route::get('/', function () {
  //  return view('welcome');
//});

Route::prefix('/blog')->group(function(){
  Route::get('/create',[ExpertController::class,'create'])->name('blog.create');
  Route::get('/',[ExpertController::class,'index'])->name('blog.index');
  Route::get('/{id}',[ExpertController::class,'show'])->name('blog.show');
  Route::post('/',[ExpertController::class,'store'])->name('blog.store');
  Route::get('/edit/{id}',[ExpertController::class,'edit'])->name('blog.edit');
  Route::patch('/{id}',[ExpertController::class,'update'])->name('blog.update');
  Route::delete('/1',[ExpertController::class,'destroy'])->name('blog.destroy ');
});



Route::controller(SearchController::class)->group(function(){

    Route::get('search', 'Search');

    Route::get('autocomplete', 'autocomplete')->name('autocomplete');

});
