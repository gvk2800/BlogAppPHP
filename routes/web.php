
<?php
use App\Http\Controllers\BlogCategoryController;
use App\Http\Controllers\BlogTagController;
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
Route::get('/', function () {
    return "Hello Laravel 6";
})->middleware('auth');
Route::get('/category',[BlogCategoryController::class,'vv']);
Route::get('/cform',[BlogCategoryController::class,'form']);
Route::post('/cstore',[BlogCategoryController::class,'cstore']);
Route::get('/cindex',[BlogCategoryController::class,'index'])->name('abd');
Route::get('/cshow/{id?}',[BlogCategoryController::class,'cshow'])->name('cshow');
Route::get('/cedit/{id?}',[BlogCategoryController::class,'cedit'])->name('cedit');
Route::post('/cupdate',[BlogCategoryController::class,'cupdate']);
Route::delete('/cdel',[BlogCategoryController::class,'cdel'])->name('cdel');
Route::get('/ctrash','BlogCategoryController@ctrash')->name('ctrash');
Route::post('/restoreData', [BlogCategoryController::class, 'restoreData'])->name('cRestore');
Route::delete('/permanentData', [BlogCategoryController::class, 'perDelete'])->name('cPerDelete');



Route::get('/aform',[BlogTagController::class,'aform']);
Route::post('/astore',[BlogTagController::class,'astore']);
Route::get('/ashow/{id}',[BlogTagController::class,'ashow'])->name('ashow');
Route::get('/aindex',[BlogTagController::class,'aindex'])->name('ain');
Route::post('/aedit',[BlogTagController::class,'aedit'])->name('aedit');
Route::post('/aupdate',[BlogTagController::class,'aupdate']);
Route::delete('/adel',[BlogTagController::class,'adel'])->name('adel');

//blog routes
Route::get('blogindex','BlogController@index')->name('blog.index');
Route::post('/bstore','BlogController@bstore')->name('blog.store');
Route::put('/bupdate','BlogController@bupdate')->name('blog.update');
Route::delete('/bdel','BlogController@bdel')->name('blog.del');

//Auth
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
