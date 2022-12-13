<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UserController;

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

Route::controller(EmployeeController::class)->group(function() {

    // Show all Employees
    Route::get('/employees', "index");

    // Show Create Form
    Route::get('/employees/create', "create");

    // Store employee Data
    Route::post('/employees/store', "store");

    // Show Edit Form
    Route::get('/employees/{employee}/edit', "edit");

    // Update Employee
    Route::put("/employees/{employee}", "update");

    // Delete Employee
    Route::delete("/employees/{employee}", "destroy");
});

Route::controller(UserController::class)->group(function() {

    // Show all Users
    Route::get('/users', "index");

    // Show Create Form
    Route::get('/users/create', "create");

    // Store user Data
    Route::post('/users/store', "store");

    // Show Edit Form
    Route::get('/users/{user}/edit', "edit");

    // Update user
    Route::put("/users/{user}", "update");

    // Delete user
    Route::delete("/users/{user}", "destroy");
});