<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
})->name('welcome');

use App\Http\Controllers\DataController;
Route::get('/getRecords', [DataController::class, 'getRecords'])->name('getRecords');
Route::get('/getPost', [DataController::class, 'getPost'])->name('getPost');
Route::get('/deletePost', [DataController::class, 'deletePost'])->name('deletePost');
Route::get('/getFutureRecords', [DataController::class, 'getFutureRecords'])->name('getFutureRecords');

Route::get('/registera', function () {
    return view('register');
});
Route::get('/addDriver', function () {
    return view('addDriver');
})->name('addDriver');
// routes/web.php
Route::group(['namespace' => 'App\Http\Controllers'], function () {
   // Route::post('/add', 'addController@processButtonClick')->name('add');

Route::get('/showData', 'showPlace@showData')->name('showData');

});
Route::get('/getPlaces', [DataController::class, 'getPlaces'])->name('getPlaces');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
