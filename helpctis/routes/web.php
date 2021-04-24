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
    Route::resource('test-centre', TestCentreController::class)->except(['show', 'edit']);
    Route::get('/test-centre/{testCentre}', [App\Http\Controllers\TestCentreController::class, 'show'])->name('tc-show');
    Route::get('/test-centre/{testCentre}/edit', [App\Http\Controllers\TestCentreController::class, 'edit'])->name('tc-edit');

    // test kit
    Route::resource('test-kit', TestKitController::class)->except(['show', 'edit']);
    Route::get('/test-kit/{testKit}', [App\Http\Controllers\TestKitController::class, 'show'])->name('tk-show');
    Route::get('/test-kit/{testKit}/edit', [App\Http\Controllers\TestKitController::class, 'edit'])->name('tk-edit');

    // centre officer
    Route::resource('centre-officer', CentreOfficerController::class)->except(['show', 'edit']);
    Route::get('/centre-officer/{id}', [App\Http\Controllers\CentreOfficerController::class, 'show'])->name('cf-show');
    Route::get('/centre-officer/{id}/edit', [App\Http\Controllers\CentreOfficerController::class, 'edit'])->name('cf-edit');

    // tester
    Route::resource('tester', TesterController::class)->except(['show', 'edit']);
    Route::get('/tester/{id}', [App\Http\Controllers\TesterController::class, 'show'])->name('ts-show');
    Route::get('/tester/{id}/edit', [App\Http\Controllers\TesterController::class, 'edit'])->name('ts-edit');

//TESTER
    // covid test
    Route::resource('covid-test', CovidTestController::class)->except(['show', 'edit']);
    Route::get('/covid-test/{covidTest}', [App\Http\Controllers\CovidTestController::class, 'show'])->name('ct-show');
    Route::get('/covid-test/{covidTest}/edit', [App\Http\Controllers\CovidTestController::class, 'edit'])->name('ct-edit');

    //patient
    Route::resource('patient', PatientController::class)->except(['show', 'edit']);
    Route::get('/patient/{id}', [App\Http\Controllers\PatientController::class, 'show'])->name('pt-show');
    Route::get('/patient/{id}/edit', [App\Http\Controllers\PatientController::class, 'edit'])->name('pt-edit');
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
