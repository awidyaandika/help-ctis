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
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('officer/home', [App\Http\Controllers\HomeController::class, 'handleOfficer'])->name('officer.route')->middleware('officer');

Route::resource('testcentres', TestCentreController::class);
Route::get('/manager/home', [App\Http\Controllers\HomeController::class, 'handleManager'])->name('manager.route')->middleware('manager');
Route::get('/manager/test-centre', [App\Http\Controllers\TestCentreController::class, 'index'])->name('view-testcentre')->middleware('manager');
