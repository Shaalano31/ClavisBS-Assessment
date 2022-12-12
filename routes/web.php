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


// Show all Companies
Route::get('/companies', [CompanyController::class, "index"]);

// Show Create Form
Route::get('/companies/create', [CompanyController::class, "create"]);

// Store Company Data
Route::post('/companies/store', [CompanyController::class, "store"]);

// Show Edit Form
Route::get('/companies/{company}/edit', [CompanyController::class, "edit"]);

// Update Company
Route::put("/companies/{company}", [CompanyController::class, "update"]);

// Delete Company
Route::delete("/companies/{company}", [CompanyController::class, "destroy"]);
