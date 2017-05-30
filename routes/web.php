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

Route::get('/', function () {
    if (auth()->check()){
        return redirect('/home');
    }
    return view('login');
})->name('login');
Route::post('/login', 'AuthController@login')->middleware('guest');
Route::post('/logout', 'AuthController@destroy')->middleware('auth');
Route::group(['middleware' => 'auth', 'prefix' => 'home'], function (){
    Route::get('/', function (){
        if (auth()->user()->role == 'admin'){
            return view('admin.home');
        }
        return view('dashboard.home');
    });
    Route::post('/proof', 'ProofsController@upload');
});
Route::get('/home/pdf/{name}', function ($name){
    $website = view('pdf', ['name' => $name])->render();
    return $website;
});