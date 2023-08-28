<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Company\CategoryController;
use App\Http\Controllers\Company\DocumentController;
use App\Http\Controllers\Company\ProjectManagementController;
use App\Http\Controllers\Company\SettingController;
use App\Http\Controllers\Company\NotificationController;
use App\Http\Controllers\Company\CMSController;
use App\Http\Controllers\Company\EmailTypeController;
use App\Http\Controllers\Company\EmailContentController;
use App\Http\Controllers\Company\PermissionController;
use App\Http\Controllers\Company\CompanyController;
use App\Http\Controllers\Company\UserController;
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
        Route::get('/home', [HomeController::class, 'companyHome'])->name('company.home');

		/* User management routes start*/
            Route::get('/userManagement',[UserController::class,'userManagement']);
            Route::get('/delete_user/{id}', [UserController::class,'delete']);
            Route::get('/edit_user/{id}', [UserController::class,'edit']);
            Route::post('/update_user', [UserController::class,'update']);
            
            Route::get('/adduser',[HomeController::class,'adduser']);
            Route::post('/register_user',[HomeController::class,'register']);
            Route::get('/UserChangeStatus/{id}/{status}',[UserController::class,'UserChangeStatus']);
        /* User management routes end*/
    
    
        /* Category management routes start*/
            
            
            Route::get('/category',[CategoryController::class,'categoryAdd']);
            Route::post('/add_category',[CategoryController::class,'categoryAdd']);
            Route::get('/view_category',[CategoryController::class,'categoryView']);
            Route::get('/delete_category/{id}',[CategoryController::class,'categoryDelete']);
            Route::get('/update_category/{id}',[CategoryController::class,'categoryUpdate']);
            Route::post('/edit_category',[CategoryController::class,'categoryEdit']);
            Route::get('/categoryChangeStatus/{id}/{status}',[CategoryController::class,'categoryChangeStatus']);
            Route::get('/checkName', [CategoryController::class, 'checkName'])->name('checkName');
        /* Category management routes end*/
    
        /* Document management routes start*/
            Route::get('/createdocument',[DocumentController::class,'addDocument']);
            Route::post('/createdocument',[DocumentController::class,'addDocument']);
            Route::get('/document',[DocumentController::class,'documentView']);
            Route::get('/delete_document/{id}', [DocumentController::class,'documentDelete']);
            Route::get('/edit_document/{id}', [DocumentController::class,'documentEdit']);
            Route::post('/update_document/', [DocumentController::class,'documentUpdate']);
            Route::get('/DocumentChangeStatus/{id}/{status}',[DocumentController::class,'documentChangeStatus']);
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
    Route::get('/logos',[SettingController::class,'setting']);
    Route::post('/update_logo',[SettingController::class,'Updateimage']);
/*  Side Setting routes end*/
    
       /* Notification type routes start   */
Route::get('/notification',[NotificationController::class, 'addNotification'])->name('notification');
Route::post('/add_notification',[NotificationController::class, 'addNotification']);
Route::get('/show_notification',[NotificationController::class, 'showNotification']);
Route::get('/delete_notification/{id}', [NotificationController::class,'deleteNotification']);
Route::get('/edit_notification/{id}', [NotificationController::class,'editNotification']);
Route::post('/update_notification', [NotificationController::class,'updateNotification']);
Route::get('/NotificationChangeStatus/{id}/{status}',[NotificationController::class,'statusNotification']);
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
