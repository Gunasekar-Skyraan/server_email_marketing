<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;

use App\Http\Controllers\CountryStateCityController;


Route::get('/', function () {
    return view('admin.login');
});

Route::get('/api', function () {
    return view('admin.api.api_route_list');
});

Route::get('auth/login', function () {
    return view('auth.login');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('add-to-log', 'App\Http\Controllers\HomeController@myTestAddToLog');

Route::get('/get-country', [CountryStateCityController::class, 'getCountry']);
Route::post('/get-state', [CountryStateCityController::class, 'getState']);
Route::post('/get-city', [CountryStateCityController::class, 'getCity']);


Route::group(['prefix' => 'admin'], function() 
{
	Route::group(['middleware' => 'admin.guest'], function()
    {
		Route::view('/login','admin.login')->name('admin.login');
		Route::post('/login',[App\Http\Controllers\AdminController::class, 'authenticate'])->name('admin.auth');
	});
	
	Route::group(['middleware' => 'admin.auth'], function()
    {
        Route::get('/email_cv', [App\Http\Controllers\Email\EmailUserController::class,'category_list'])->name('admin.category_list');

        Route::get('/dashboard', [App\Http\Controllers\AdminController::class,'dashboard'])->name('admin/dashboard');

        //category_list 

        Route::get('/category_list',[App\Http\Controllers\Email\EmailCategoryController::class,'show'])->name('category.list');

        Route::get('/add_category', [App\Http\Controllers\Email\EmailCategoryController::class,'Add_list'])->name('admin.add_category');

        Route::post('/category.insert', [App\Http\Controllers\Email\EmailCategoryController::class,'store']);

        Route::post('/edit_category_list/{id}',[App\Http\Controllers\Email\EmailCategoryController::class,'EditCatList']);

        Route::any('/edit_category/{id}',[App\Http\Controllers\Email\EmailCategoryController::class,'EditCategory'])->name('admin.edit_category');

        Route::post('/delete_category/{id}',[App\Http\Controllers\Email\EmailCategoryController::class,'delete']);

        Route::post('/category_status_update', [App\Http\Controllers\Email\EmailCategoryController::class, 'active']);

        //profile update
        Route::get('/profile_update', function () 
        {
            return view('admin.accounts.profile_update');
        })->name('admin.profile_update');
        
        Route::any('/home','App\Http\Controllers\AdminController@profileUpdate')->name('profileupdate');

        //Accounts
        
        Route::get('/superadmin',[App\Http\Controllers\AdminController::class,'superadmin'])->name('superadmin.list');
        
        Route::get('/admin_add_sub_admin',[App\Http\Controllers\AdminController::class,'add'])->name('add_superadmin');

        Route::post('/admin_insert',[App\Http\Controllers\AdminController::class,'insert']);

        Route::any('/edit_admin/{id}',[App\Http\Controllers\AdminController::class,'edit'])->name('edit_superadmin');

        Route::any('/edit_admin_list/{id}',[App\Http\Controllers\AdminController::class,'editlist']);

        Route::post('/user_status_update', [App\Http\Controllers\AdminController::class, 'active']);

        Route::post('/delete_admin/{id}',[App\Http\Controllers\AdminController::class,'delete']);

        Route::get('/logActivity', 'App\Http\Controllers\HomeController@logActivity');

        Route::post('/activitydelete',[App\Http\Controllers\AdminController::class,'activitydelete']);

        route::post('/manage/{id}',[App\Http\Controllers\AdminController::class,'manage']);

        // subcategory

        Route::post('/edit_sub_category_list/{id}',[App\Http\Controllers\Email\EmailSubCategoryController::class,'EditSubCatList']);

        Route::post('/insert_sub_category', [App\Http\Controllers\Email\EmailSubCategoryController::class,'store']);
 
        Route::any('/edit_sub_category/{id}',[App\Http\Controllers\Email\EmailSubCategoryController::class,'EditSubCategory'])->name('admin.edit_sub_category');
 
        Route::post('/delete_sub_category/{id}',[App\Http\Controllers\Email\EmailSubCategoryController::class,'delete']);
 
        Route::post('/sub_category_status_update', [App\Http\Controllers\Email\EmailSubCategoryController::class, 'active']);
 
        Route::get('/add_sub_category',[App\Http\Controllers\Email\EmailSubCategoryController::class,'add'])->name('admin.add_sub_category');
 
        Route::get('/sub_category_list',[App\Http\Controllers\Email\EmailSubCategoryController::class,'show'])->name('admin.sub_categorylist');
 
        Route::post('/subcat', [App\Http\Controllers\Email\EmailSubCategoryController::class, 'subCat']);  

        Route::post('/count', [App\Http\Controllers\Email\EmailTemplateCategoryController::class, 'count']);

        

        //Users

        Route::post('/edit_users_list/{id}',[App\Http\Controllers\Email\EmailUserController::class,'EditQuestionList']);

        Route::any('/edit_users/{id}',[App\Http\Controllers\Email\EmailUserController::class,'EditQuestion'])->name('users.edit_users');

        Route::post('/delete_users/{id}',[App\Http\Controllers\Email\EmailUserController::class,'delete']);

        Route::post('/insert_users', [App\Http\Controllers\Email\EmailUserController::class,'store']);

        Route::get('/users_list',[App\Http\Controllers\Email\EmailUserController::class,'show'])->name('users.users');

        Route::get('/add_users',[App\Http\Controllers\Email\EmailUserController::class,'add'])->name('users.add_users');

        Route::post('/users_status_update', [App\Http\Controllers\Email\EmailUserController::class, 'active']);

        //Template

        Route::get('/template_list',[App\Http\Controllers\Email\EmailTemplateController::class,'show'])->name('template.list');

        Route::get('/add_template', [App\Http\Controllers\Email\EmailTemplateController::class,'Add_list'])->name('add_template');

        Route::post('/template.insert', [App\Http\Controllers\Email\EmailTemplateController::class,'store']);

        Route::post('/edit_template_list/{id}',[App\Http\Controllers\Email\EmailTemplateController::class,'EditCatList']);

        Route::any('/edit_template/{id}',[App\Http\Controllers\Email\EmailTemplateController::class,'EditCategory'])->name('edit_template');

        Route::post('/delete_template/{id}',[App\Http\Controllers\Email\EmailTemplateController::class,'delete']);

        Route::post('/template_status_update', [App\Http\Controllers\Email\EmailTemplateController::class, 'active']);

        Route::post('/image_upload', [App\Http\Controllers\Email\EmailTemplateController::class, 'upload'])->name('upload');

        //Template category_list

        Route::get('/template_category_list',[App\Http\Controllers\Email\EmailTemplateCategoryController::class,'show'])->name('template_category.list');

        Route::get('/template_add_category', [App\Http\Controllers\Email\EmailTemplateCategoryController::class,'Add_list'])->name('template_admin.add_category');

        Route::post('/template_category.insert', [App\Http\Controllers\Email\EmailTemplateCategoryController::class,'store']);

        Route::post('/template_edit_category_list/{id}',[App\Http\Controllers\Email\EmailTemplateCategoryController::class,'EditCatList']);

        Route::any('/template_edit_category/{id}',[App\Http\Controllers\Email\EmailTemplateCategoryController::class,'EditCategory'])->name('template_admin.edit_category');

        Route::post('/template_delete_category/{id}',[App\Http\Controllers\Email\EmailTemplateCategoryController::class,'delete']);

        Route::post('/template_category_status_update', [App\Http\Controllers\Email\EmailTemplateCategoryController::class, 'active']);

        //Category

        Route::get('/emails_list',[App\Http\Controllers\Email\SourceEmailController::class,'show'])->name('admin.emailslist');

        Route::get('/add_emails', [App\Http\Controllers\Email\SourceEmailController::class,'Add_list'])->name('admin.add_emails');

        Route::post('/emails.insert', [App\Http\Controllers\Email\SourceEmailController::class,'store']);

        Route::post('/edit_emails_list/{id}',[App\Http\Controllers\Email\SourceEmailController::class,'EditCatList']);

        Route::any('/edit_emails/{id}',[App\Http\Controllers\Email\SourceEmailController::class,'EditCategory'])->name('admin.edit_emails');

        Route::post('/delete_emails/{id}',[App\Http\Controllers\Email\SourceEmailController::class,'delete']);

        Route::post('/emails_status_update', [App\Http\Controllers\Email\SourceEmailController::class, 'active']);

        
        //send emails 
        
        Route::get('/send_emails', [App\Http\Controllers\Email\SendEmailController::class,'Add_list'])->name('admin.send_emails');

        Route::get('/send_emails_list',[App\Http\Controllers\Email\SendEmailController::class,'show'])->name('admin.send_emails_list');

        Route::post('/edit_send_emails_list',[App\Http\Controllers\Email\SendEmailController::class,'EditCatList']);

        Route::any('/edit_send_emails/{id}',[App\Http\Controllers\Email\SendEmailController::class,'EditCategory'])->name('admin.edit_send_emails');

        Route::post('/delete_send_emails/{id}',[App\Http\Controllers\Email\SendEmailController::class,'delete']);

        //template list get and append
        
        Route::post('/send_emails_count', [App\Http\Controllers\Email\SendEmailController::class, 'count']);

        Route::post('/template_list_apend', [App\Http\Controllers\Email\SendEmailController::class, 'template_list_apend']);

        Route::post('/select_subcat', [App\Http\Controllers\Email\SendEmailController::class, 'select_subcat']);

        Route::post('/insert_email', [App\Http\Controllers\Email\SendEmailController::class,'insert_email'])->name('admin.insert_email');



        Route::post('/block_list_count', [App\Http\Controllers\Email\SendEmailController::class,'block_list_count'])->name('admin.block_list_count');

        Route::post('/blocked', [App\Http\Controllers\Email\SendEmailController::class,'blocked'])->name('admin.blocked');
        
        Route::get('/add_block', [App\Http\Controllers\Email\SendEmailController::class,'add_block'])->name('admin.add_block');

        Route::post('/block_list_to_mail', [App\Http\Controllers\Email\SendEmailController::class,'block_list_to_mail'])->name('admin.block_list_to_mail');


        //url to export emails 

        Route::post('/export_url', [App\Http\Controllers\Email\EmailUserController::class,'export_url'])->name('admin.export_url'); 

        Route::post('/insert_export_email', [App\Http\Controllers\Email\EmailUserController::class,'insert_export_email'])->name('admin.insert_export_email');

	});

    Route::get('/logout', [App\Http\Controllers\AdminController::class, 'logout'])->name('admin.logout');
});
