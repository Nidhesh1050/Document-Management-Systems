<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DocumentController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::middleware(['auth', 'user-access:admin'])->group(function () {
  
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');

    /* User management routes start*/
    Route::get('/admin/user-list',[HomeController::class,'userManagement']);
    Route::get('/admin/categorymanagement',[HomeController::class,'categorymanagement']);
    Route::get('/admin/delete/{id}', [HomeController::class,'delete']);
    Route::get('/admin/edit/{id}', [HomeController::class,'edit']);
    Route::post('/admin/update/', [HomeController::class,'update']);
    Route::get('/admin/adduser',[HomeController::class,'adduser']);
    Route::post('/admin/register',[HomeController::class,'register']);
    /* User management routes end*/
    

    /* Category management routes start*/
    Route::get('/admin/category',[CategoryController::class,'category']);
    Route::post('/admin/add_category',[CategoryController::class,'add_category']);
    Route::get('/admin/view_category',[CategoryController::class,'view_category']);
    Route::get('/admin/delete_category/{id}',[CategoryController::class,'delete_category']);
    Route::get('/admin/update_category/{id}',[CategoryController::class,'update_category']);
    Route::post('/admin/edit_category',[CategoryController::class,'edit_category']);
    /* Category management routes end*/


     /* Document management routes start*/
     Route::get('/admin/document',[DocumentController::class,'document']);
     Route::post('/admin/add_document',[DocumentController::class,'add_document']);
     

     /* Document management routes end*/
    
});
