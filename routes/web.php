<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParmachyManagmantController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/',[ParmachyManagmantController::class,'index'])->name('home');
Route::post('/medicine-new',[ParmachyManagmantController::class,'create'])->name('medicine.new');
// Route::post('/',[ParmachyManagmantController::class,'manage'])->name('home');
 Route::get('/medicine-edit/{id}',[ParmachyManagmantController::class,'edit'])->name('medicine.edit');
 Route::post('/medicine-update/{id}',[ParmachyManagmantController::class,'update'])->name('medicine.update');
 Route::get('/medicine-delete',[ParmachyManagmantController::class,'delete'])->name('medicine.delete');
// Route::get('/', function () {
//     return view('welcome');
// });
