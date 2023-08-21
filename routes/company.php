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

Route::group(['prefix' => 'company'], function() {
	Route::middleware(['auth', 'user-access:company'])->group(function () {
        Route::get('/home', [HomeController::class, 'companyHome']);
		/* User management routes start*/
            Route::get('/userManagement',[HomeController::class,'userManagement']);
            Route::get('/delete_user/{id}', [HomeController::class,'delete']);
            Route::get('/edit_user/{id}', [HomeController::class,'edit']);
            Route::post('/update_user', [HomeController::class,'update']);
            
            Route::get('/adduser',[HomeController::class,'adduser']);
            Route::post('/register_user',[HomeController::class,'register']);
        /* User management routes end*/
    
    
        /* Category management routes start*/
            Route::get('/category',[CategoryController::class,'category']);
            Route::post('/add_category',[CategoryController::class,'add_category']);
            Route::get('/view_category',[CategoryController::class,'view_category']);
            Route::get('/delete_category/{id}',[CategoryController::class,'delete_category']);
            Route::get('/update_category/{id}',[CategoryController::class,'update_category']);
            Route::post('/edit_category',[CategoryController::class,'edit_category']);
        /* Category management routes end*/
    
        /* Document management routes start*/
            Route::get('/createdocument',[DocumentController::class,'createdocument']);
            Route::post('/add_document',[DocumentController::class,'add_document']);
            Route::get('/document',[DocumentController::class,'document']);
            Route::get('/delete_document/{id}', [DocumentController::class,'delete_document']);
            Route::get('/edit_document/{id}', [DocumentController::class,'edit_document']);
            Route::post('/update_document/', [DocumentController::class,'update_document']);
        /* Document management routes end*/
    
    
        /* Project management routes start*/
            Route::get('/project_management',[ProjectManagementController::class,'project_management']);
            Route::post('/add_project',[ProjectManagementController::class,'add_project']);
            Route::get('/view_project',[ProjectManagementController::class,'view_project']);
            Route::get('/delete_project/{id}',[ProjectManagementController::class,'delete_project']);
            Route::get('/update_project/{id}',[ProjectManagementController::class,'update_project']);
            Route::post('/edit_project',[ProjectManagementController::class,'edit_project']);
        /* Project management routes end*/
    
        /* Document type routes start   */
    
            Route::get('/view_document',[DocumentController::class,'view_document']);
            Route::get('/deletedocument/{id}', [DocumentController::class,'deletedocument']);
            Route::get('/add_document', [DocumentController::class,'add_documenttype']);
            Route::post('/register',[DocumentController::class,'register']);
            Route::get('/edit/{id}', [DocumentController::class,'edit']);
            Route::post('/documentupdate/', [DocumentController::class,'documentupdate']);
    
        /* Side Setting routes start*/
            Route::get('/setting',[SettingController::class,'setting']);
            Route::post('/add_image',[SettingController::class,'add_image']);
            Route::get('/view_image',[SettingController::class,'view_image']);
            Route::get('/edit_image/{id}', [SettingController::class,'edit_image']);
            Route::post('/update_image', [SettingController::class,'update_image']);
            Route::get('/delete_image/{id}',[SettingController::class,'delete_image']);
        /*  Side Setting routes end*/
    
        /* Notification type routes start   */
            Route::get('/notification',[NotificationController::class, 'Notification'])->name('notification');
            Route::post('/add_notification',[NotificationController::class, 'add_notification']);
            Route::get('/show_notification',[NotificationController::class, 'show_notification']);
            Route::get('/delete/{id}', [NotificationController::class,'delete']);
            
            Route::get('/edit_notification/{id}', [NotificationController::class,'edit_notification']);
            Route::post('/update_notification', [NotificationController::class,'update_notification']);
        /* Notification type routes end   */
        
        /* Content management system routes start*/
            Route::get('/addcontent',[CMSController::class,'addcontent']);
            Route::post('/add_cms',[CMSController::class,'add_cms']);
            Route::get('/view_content',[CMSController::class,'view_content']);
            Route::get('/delete_content/{id}',[CMSController::class,'delete_content']);
            Route::get('/update_content/{id}',[CMSController::class,'update_content']);
            Route::post('/edit_content',[CMSController::class,'edit_content']);
        
        /* Content management system routes end*/
    
        //Email management routes start by Nidhi
    
        // email-type
            Route::get('/email',[EmailTypeController::class, 'email'])->name('email');
            Route::post('/add_email',[EmailTypeController::class, 'add_email']);
            Route::get('/show_email',[EmailTypeController::class, 'show_email']);
            Route::get('/emaildelete/{id}', [EmailTypeController::class,'emaildelete']);
        
            Route::get('/edit_email/{id}', [EmailTypeController::class,'edit_email']);
            Route::post('/emailupdate', [EmailTypeController::class,'emailupdate']);
        
    
        //email-content
    
            Route::get('/content',[EmailContentController::class, 'content'])->name('content');
            Route::post('/add_content',[EmailContentController::class, 'add_content']);
            Route::get('/show_content',[EmailContentController::class, 'show_content']);
            Route::get('/delete/{id}', [EmailContentController::class,'delete']);
        
            Route::get('/edit_content/{id}', [EmailContentController::class,'edit_content']);
            Route::post('/update', [EmailContentController::class,'update']);
        
            /* Module Permission route start here*/
            Route::get('/module_permission',[PermissionController::class,'module_permission']);
            Route::post('/module_permission',[PermissionController::class,'permission']);
        /* Module Permission route end here*/
    
    
    
        /* Module Commpany route start here*/
            Route::get('/addcompany',[CompanyController::class,'addCompany']);
            Route::post('/company_add',[CompanyController::class,'Company_add']);
            Route::get('/view_company',[CompanyController::class,'view_company']);
            Route::get('/delete_company/{id}',[CompanyController::class,'delete_company']);
            Route::get('/update_company/{id}',[CompanyController::class,'update_company']);
            Route::post('/edit_company',[CompanyController::class,'edit_company']);
            Route::get('/checkCompany', [CompanyController::class, 'checkCompany'])->name('checkCompany');
        
        /* Module Commpany route end here*/
	});
});
