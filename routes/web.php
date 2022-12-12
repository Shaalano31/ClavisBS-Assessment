<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;

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


Route::controller(CompanyController::class)->group(function() {

    // Show all Companies
    Route::get('/companies', "index");

    // Show Create Form
    Route::get('/companies/create', "create");

    // Store Company Data
    Route::post('/companies/store', "store");

    // Show Edit Form
    Route::get('/companies/{company}/edit', "edit");

    // Update Company
    Route::put("/companies/{company}", "update");

    // Delete Company
    Route::delete("/companies/{company}", "destroy");
});
