<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestCentreController;
use App\Http\Controllers\TestKitController;
use App\Http\Controllers\CentreOfficerController;
use App\Http\Controllers\TesterController;
use App\Http\Controllers\CovidTestController;
use App\Http\Controllers\PatientController;

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

Route::group(['middleware' => 'auth'], function() {
//    MANAGER & OFFICER
    // test centre
    Route::resource('test-centre', TestCentreController::class);
    // test kit
    Route::resource('test-kit', TestKitController::class);
    // centre officer
    Route::resource('centre-officer', CentreOfficerController::class);
    // tester
    Route::resource('tester', TesterController::class);

//TESTER
    // covid test
    Route::resource('covid-test', CovidTestController::class);
    //patient
    Route::resource('patient', PatientController::class);
});

Route::group(['middleware' => 'manager'], function() {
    //login
    Route::get('/manager/home', [App\Http\Controllers\HomeController::class, 'index'])->name('manager-home');
});

Route::group(['middleware' => 'officer'], function() {
    //login
    Route::get('/officer/home', [App\Http\Controllers\HomeController::class, 'index'])->name('officer-home');
});

Route::group(['middleware' => 'tester'], function() {
    //login
    Route::get('/testers/home', [App\Http\Controllers\HomeController::class, 'index'])->name('tester-home');
});

Route::group(['middleware' => 'patient'], function() {
    //login
    Route::get('/patients/home', [App\Http\Controllers\HomeController::class, 'index'])->name('patient-home');

});
