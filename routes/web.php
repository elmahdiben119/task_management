<?php

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


Route::get('/', 'HomeController@index')->middleware('auth');
Auth::routes();

Route::get('/register', function () {
    return view('auth.register');
});
/* Projects */
Route::group(['prefix' => 'project'],function(){
    Route::get('add/','ProjectController@store');
    Route::get('edit/{id}','ProjectController@editView');
    Route::get('update/{id}','ProjectController@update');
    Route::get('delete/{id}','ProjectController@destroy');
});


/* Clients */
Route::post('/add/{id}','ClientController@add');
Route::post('/update/{id}','ClientController@update');
Route::post('/delete/{id}','ClientController@delete');


/*Clear all Apllication Cache for real Updates*/
Route::get('/clear', function () {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});
