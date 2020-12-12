<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

/*Route::get('/', function () {
    return view('auth.login');
});*/
Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'Admin\AdminController@index');
Route::get('/dashboard', 'Admin\AdminController@index');
Route::get('/change-password', 'Admin\AdminController@change_password');
Route::post('/change-password-post', 'Admin\AdminController@change_password_post');
Route::get('/admin-profile', 'Admin\AdminController@profile');
Route::get('/add-state', 'Admin\AdminController@add_state');

Route::get('/interview', 'Admin\InterviewController@create');
Route::get('/fcm/{id}', 'Admin\InterviewController@fcm');
Route::post('/interview', 'Admin\InterviewController@store');
Route::get('/interview/list', 'Admin\InterviewController@index');
Route::get('/interview/list/today', 'Admin\InterviewController@today');
Route::get('/interview/list/tomorrow', 'Admin\InterviewController@tomorrow');
Route::get('/interview/list/inactive', 'Admin\InterviewController@inactive');
Route::get('/interview/list/expired', 'Admin\InterviewController@expired');
Route::get('/interview/list/archived', 'Admin\InterviewController@archived');
Route::get('/api/list', 'Admin\InterviewController@index');
Route::get('/interview/destroy/{id}', 'Admin\InterviewController@destroy');
Route::get('/interview/edit/{id}', 'Admin\InterviewController@edit');
Route::get('/interview/view/{id}', 'Admin\InterviewController@viewInterview');
Route::post('/interview/update/{id}', 'Admin\InterviewController@update');

//*****************Company********************//
Route::get('/add-company', 'Admin\CompanyController@index');
Route::post('/add-company', 'Admin\CompanyController@store');
Route::get('/company-list', 'Admin\CompanyController@show');
Route::get('/company-deactive/{id}', 'Admin\CompanyController@destroy');
Route::get('/company/edit/{id}', 'Admin\CompanyController@edit');
Route::post('/company/update/{id}', 'Admin\CompanyController@update');
Route::get('/company/view/{id}', 'Admin\CompanyController@viewCompany');

//***************Resume***********************//
Route::get('/add-resume', 'Admin\ResumeController@index');
Route::post('/add-resume', 'Admin\ResumeController@store');
Route::get('/resume/edit/{id}', 'Admin\ResumeController@edit');
Route::post('/resume/update/{id}', 'Admin\ResumeController@update');
Route::get('/resume/destroy/{id}', 'Admin\ResumeController@destroy');
Route::get('/resume-list', 'Admin\ResumeController@show');
//**************Industry**********************//
Route::get('/add-industry', 'Admin\IndustryController@index');
Route::post('/add-industry', 'Admin\IndustryController@store');
Route::get('/industry/edit/{id}', 'Admin\IndustryController@edit');
Route::post('/industry/update/{id}', 'Admin\IndustryController@update');
Route::get('/industry/destroy/{id}', 'Admin\IndustryController@destroy');
Route::get('/industry-list', 'Admin\IndustryController@show');
//**************Department**********************//
Route::get('/add-department', 'Admin\DepartmentController@index');
Route::post('/add-department', 'Admin\DepartmentController@store');
Route::get('/department/edit/{id}', 'Admin\DepartmentController@edit');
Route::post('/department/update/{id}', 'Admin\DepartmentController@update');
Route::get('/department/destroy/{id}', 'Admin\DepartmentController@destroy');
Route::get('/department-list', 'Admin\DepartmentController@show');

//*****************Category********************//
Route::get('/add-category', 'Admin\CategoryController@index');
Route::post('/add-category', 'Admin\CategoryController@store');
Route::get('/category-list', 'Admin\CategoryController@show');
Route::get('/category-deactive/{id}', 'Admin\CategoryController@destroy');
Route::get('/category/edit/{id}', 'Admin\CategoryController@edit');
Route::post('/category/update/{id}', 'Admin\CategoryController@update');