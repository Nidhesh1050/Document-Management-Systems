<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DocumentController;

use App\Http\Controllers\ProjectManagementController;
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
    Route::get('/admin/userManagement',[HomeController::class,'userManagement']);
    Route::get('/admin/delete_user/{id}', [HomeController::class,'delete']);
    Route::get('/admin/edit_user/{id}', [HomeController::class,'edit']);
    Route::post('/admin/update_user', [HomeController::class,'update']);
    Route::get('/admin/adduser',[HomeController::class,'adduser']);
    Route::post('/admin/register_user',[HomeController::class,'register']);
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
    Route::get('/admin/createdocument',[DocumentController::class,'createdocument']);
    Route::post('/admin/add_document',[DocumentController::class,'add_document']);
    Route::get('/admin/document',[DocumentController::class,'document']);
    Route::get('/admin/delete/{id}', [DocumentController::class,'deletedocument']);
    Route::get('/admin/edit/{id}', [DocumentController::class,'edit_document']);
    Route::post('/admin/update/', [DocumentController::class,'update_document']);
    /* Document management routes end*/


     /* Project management routes start*/
     Route::get('/admin/project_management',[ProjectManagementController::class,'project_management']);
     Route::post('/admin/add_project',[ProjectManagementController::class,'add_project']);
     Route::get('/admin/view_project',[ProjectManagementController::class,'view_project']);
     Route::get('/admin/delete_project/{id}',[ProjectManagementController::class,'delete_project']);
     Route::get('/admin/update_project/{id}',[ProjectManagementController::class,'update_project']);
     Route::post('/admin/edit_project',[ProjectManagementController::class,'edit_project']);
     /* Project management routes end*/

    /* Document type routes start   */

    Route::get('/admin/view_document',[DocumentController::class,'view_document']);
    Route::get('/admin/deletedocument/{id}', [DocumentController::class,'deletedocument']);
    Route::get('/admin/add_document', [DocumentController::class,'add_documenttype']);
    Route::post('/admin/register',[DocumentController::class,'register']);
    Route::get('/admin/edit/{id}', [DocumentController::class,'edit']);
    Route::post('/admin/update/', [DocumentController::class,'update']);

});
