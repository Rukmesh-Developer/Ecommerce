<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;

/*

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
//LoginController

Route::get('/', [LoginController::class, 'index']);
Route::get('/createnewuser', [LoginController::class, 'createnewuser'])->name('createnewuser');

Route::post('/login_acn', [LoginController::class, 'login_acn']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::group(['middleware' => 'Adminauth'], function () {
  Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('dashboard');



  Route::get('/changepassword', [LoginController::class, 'changepassword'])->name('changepassword');
  Route::post('/updatepassword', [LoginController::class, 'updatepassword'])->name('updatepassword');
  Route::get('profile', [LoginController::class, 'showprofile'])->name('profile');
  Route::post('profileupdate/{id}', [LoginController::class, 'profileupdate'])->name('profileupdate');

  //category controller

  Route::get('/category', [CategoryController::class, 'index'])->name('category');
  Route::post('/store', [CategoryController::class, 'store'])->name('store');
  Route::get('/delete/{category1}', [CategoryController::class, 'delete'])->name('delete');
  Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit');
  Route::post('/update', [CategoryController::class, 'update'])->name('update');


  //Subcategory Controller

  Route::get('/subcategory', [SubcategoryController::class, 'index'])->name('subcategory');
  Route::post('/subcatstore', [SubcategoryController::class, 'subcatstore'])->name('subcatstore');
  Route::get('/subdelete/{id}', [SubcategoryController::class, 'subdelete'])->name('subdelete');
  Route::get('/subcatedit/{id}', [SubcategoryController::class, 'subcatedit'])->name('subcatedit');
  Route::post('/subcatupdate', [SubcategoryController::class, 'subcatupdate'])->name('subcatupdate');



  //Product Controller

  Route::get('/product', [ProductController::class, 'index'])->name('product');
  Route::post('/productstore', [ProductController::class, 'productstore'])->name('productstore');
  Route::get('/productdelete/{id}', [ProductController::class, 'productdelete'])->name('productdelete');
   Route::get('/productedit/{id}', [ProductController::class, 'productedit'])->name('productedit');
  // Route::post('/subcatupdate', [ProductController::class, 'subcatupdate'])->name('subcatupdate');


  // Get 

  Route::post('/getcategory', [ProductController::class, 'getcategory'])->name('getcategory');
  //Route::post('/updategetcategory', [Formlogin::class, 'updategetcategory'])->name('updategetcategory');



});