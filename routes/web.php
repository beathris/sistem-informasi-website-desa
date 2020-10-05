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

Auth::routes();

Route::resource('/dashboard', 'DashboardController');
Route::resource('/visi-misi', 'VisiMisiController');
Route::resource('/sejarah-desa', 'SejarahDesaController');
Route::resource('/staff-category', 'StaffCategoryController');
Route::resource('/staff', 'StaffController');
Route::resource('/institution', 'InstitutionController');
Route::resource('/potency-category', 'PotencyCategoryController');
Route::resource('/potency', 'PotencyController');
Route::resource('/service', 'ServicesController');
Route::resource('/administration-area', 'AdministrationAreaController');
Route::resource('/education', 'EducationController');
Route::resource('/under-graduate', 'UnderGraduateDataController');
