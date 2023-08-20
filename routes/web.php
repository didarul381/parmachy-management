<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParmachyManagmantController;
use App\Http\Controllers\SalesController;

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
 Route::get('/medicine-sales',[SalesController::class,'index'])->name('medicine.sales');
//  Route::get('/medicine-sales',[SalesController::class,'show'])->name('medicine.sales');
 Route::get('/varcode',[SalesController::class,'varcode'])->name('medicine.varcode');
 Route::post('/medicine-sales-new',[SalesController::class,'create'])->name('medicine.sales.new');
 Route::post('/medicine-sales-new',[SalesController::class,'addtocart'])->name('medicine.sales.new');
 Route::get('/medicine-remove/{id}',[SalesController::class,'remove'])->name('medicine.remove');
 Route::post('/update-cart-product/{id}',[SalesController::class,'update'])->name('update-cart-product');

// Route::get('/', function () {
//     return view('welcome');
// });
