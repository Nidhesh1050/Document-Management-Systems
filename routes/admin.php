<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DocumentController;

use App\Http\Controllers\ProjectManagementController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\CMSController;
use App\Http\Controllers\EmailTypeController;
use App\Http\Controllers\EmailContentController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DocumentTypeController;
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
    Route::get('/UserChangeStatus/{id}/{status}',[HomeController::class,'UserChangeStatus']);
    /* User management routes end*/


    /* Category management routes start*/
    Route::get('/admin/category',[CategoryController::class,'categoryAdd']);
    Route::post('/admin/add_category',[CategoryController::class,'categoryAdd']);
    Route::get('/admin/view_category',[CategoryController::class,'categoryView']);
    Route::get('/admin/delete_category/{id}',[CategoryController::class,'categoryDelete']);
    Route::get('/admin/update_category/{id}',[CategoryController::class,'categoryUpdate']);
    Route::post('/admin/edit_category',[CategoryController::class,'categoryEdit']);
    Route::get('/categoryChangeStatus/{id}/{status}',[CategoryController::class,'categoryChangeStatus']);
    /* Category management routes end*/

    /* Document management routes start*/
    Route::get('/admin/createdocument',[DocumentController::class,'addDocument']);
    Route::post('/admin/createdocument',[DocumentController::class,'addDocument']);
    Route::get('/admin/document',[DocumentController::class,'documentView']);
    Route::get('/admin/delete_document/{id}', [DocumentController::class,'documentDelete']);
    Route::get('/admin/edit_document/{id}', [DocumentController::class,'documentEdit']);
    Route::post('/admin/update_document/', [DocumentController::class,'documentUpdate']);
    Route::get('/DocumentChangeStatus/{id}/{status}',[DocumentController::class,'documentChangeStatus']);
    /* Document management routes end*/


     /* Project management routes start*/
     Route::get('/admin/project',[ProjectManagementController::class,'addProject']);
     Route::post('/admin/add_project',[ProjectManagementController::class,'addProject']);
     Route::get('/admin/view_project',[ProjectManagementController::class,'viewProject']);
     Route::get('/admin/delete_project/{id}',[ProjectManagementController::class,'deleteProject']);
     Route::get('/admin/update_project/{id}',[ProjectManagementController::class,'updateProject']);
     Route::post('/admin/edit_project',[ProjectManagementController::class,'editProject']);
     Route::get('/ProjectChangeStatus/{id}/{status}',[ProjectManagementController::class,'ProjectChangeStatus']);
     /* Project management routes end*/

    /* Document type routes start   */

    Route::get('/admin/documentType_view',[DocumentTypeController::class,'documentTypeView']);
    Route::get('/admin/documentType_delete/{id}', [DocumentTypeController::class,'documentTypeDelete']);
    Route::get('/admin/documentType_add', [DocumentTypeController::class,'documentTypeAdd']);
    Route::post('/admin/documentType_add', [DocumentTypeController::class,'documentTypeAdd']);
    Route::get('/admin/documentType_edit/{id}', [DocumentTypeController::class,'documentTypeEdit']);
    Route::post('/admin/documentType_update/', [DocumentTypeController::class,'documentTypeUpdate']);
    Route::get('/DocumentTypeChangeStatus/{id}/{status}',[DocumentTypeController::class,'DocumentTypeChangeStatus']);





    // Route::get('/ProjectChangeStatus/{id}/{status}',[DocumentTypeController::class,'DocumentTypeChangeStatus']);

    /* Side Setting routes start*/
    Route::get('/admin/setting',[SettingController::class,'setting']);
    Route::post('/admin/add_image',[SettingController::class,'add_image']);
    Route::get('/admin/view_image',[SettingController::class,'view_image']);
    Route::get('/admin/edit_image/{id}', [SettingController::class,'edit_image']);
    Route::post('/admin/update_image', [SettingController::class,'update_image']);
    Route::get('/admin/delete_image/{id}',[SettingController::class,'delete_image']);
    Route::get('/admin/logos',[App\Http\Controllers\SettingController::class,'setting']);
    Route::post('/admin/update_logo',[App\Http\Controllers\SettingController::class,'Updateimage']);
/*  Side Setting routes end*/

/* Notification type routes start   */
Route::get('/admin/notification',[NotificationController::class, 'addNotification'])->name('notification');
Route::post('/admin/add_notification',[NotificationController::class, 'addNotification']);
Route::get('/admin/show_notification',[NotificationController::class, 'showNotification']);
Route::get('/admin/delete_notification/{id}', [NotificationController::class,'deleteNotification']);
Route::get('/admin/edit_notification/{id}', [NotificationController::class,'editNotification']);
Route::post('/admin/update_notification', [NotificationController::class,'updateNotification']);
Route::get('/NotificationChangeStatus/{id}/{status}',[NotificationController::class,'statusNotification']);
 /* Notification type routes end   */

/* Content management system routes start*/
Route::get('/admin/addcontent',[CMSController::class,'addcontent']);
Route::post('/admin/add_cms',[CMSController::class,'add_cms']);
Route::get('/admin/view_content',[CMSController::class,'view_content']);
Route::get('/admin/delete_content/{id}',[CMSController::class,'delete_content']);
Route::get('/admin/update_content/{id}',[CMSController::class,'update_content']);
Route::post('/admin/edit_content',[CMSController::class,'edit_content']);

/* Content management system routes end*/

    //Email management routes start by Nidhi

    // email-type
	Route::get('/admin/email',[EmailTypeController::class, 'email'])->name('email');
	Route::post('/admin/add_email',[EmailTypeController::class, 'add_email']);
	Route::get('/admin/show_email',[EmailTypeController::class, 'show_email']);
	Route::get('/admin/emaildelete/{id}', [EmailTypeController::class,'emaildelete']);

	Route::get('/admin/edit_email/{id}', [EmailTypeController::class,'edit_email']);
	Route::post('/admin/emailupdate', [EmailTypeController::class,'emailupdate']);


    //email-content

	Route::get('/admin/content',[EmailContentController::class, 'content'])->name('content');
	Route::post('/admin/add_content',[EmailContentController::class, 'add_content']);
	Route::get('/admin/show_content',[EmailContentController::class, 'show_content']);
	Route::get('/admin/delete/{id}', [EmailContentController::class,'delete']);

	Route::get('/admin/edit_content/{id}', [EmailContentController::class,'edit_content']);
	Route::post('/admin/update', [EmailContentController::class,'update']);

    /* Module Permission route start here*/
    Route::get('/admin/module_permission',[PermissionController::class,'module_permission']);
    Route::post('/admin/module_permission',[PermissionController::class,'permission']);
    /* Module Permission route end here*/


     /* Module Commpany route start here*/
     Route::get('/admin/add_company',[CompanyController::class,'addCompany']);
     Route::post('/admin/add_company',[CompanyController::class,'addCompany']);
     Route::get('/admin/view_company',[CompanyController::class,'index']);
     Route::get('/admin/delete_company/{id}',[CompanyController::class,'delete_company']);
     Route::get('/admin/update_company/{id}',[CompanyController::class,'updateCompany']);
     Route::post('/admin/edit_company',[CompanyController::class,'editCompany']);
     Route::get('/admin/checkCompany', [CompanyController::class, 'checkCompany'])->name('checkCompany');

    /* Module Commpany route end here*/


});
