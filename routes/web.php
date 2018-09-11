<?php

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

// User Routes
Route::group(['namespace' => 'User'], function (){
    Route::get('/', 'HomeController@index')->name('index');
    Route::get('/user/about', 'HomeController@about')->name('about');
    Route::get('/user/contact', 'HomeController@contact')->name('contact');
    Route::get('/post/{post}', 'PostController@post')->name('post');
    Route::get('post/tag/{tag}', 'HomeController@tag')->name('tag');
    Route::get('post/Category/{category}', 'HomeController@category')->name('category');
    Route::post('getPosts', 'PostController@getAllPosts');
    Route::post('saveLike', 'PostController@saveLike');
});

// Admin Routes
Route::group(['namespace' => 'Admin'], function (){
    Route::get('admin/home', 'HomeController@index')->name('admin.home');
    Route::get('admin/user/{id}', 'HomeController@profile')->name('user.profile');
    Route::resource('admin/user', 'UserController');
    Route::resource('admin/role', 'RoleController');
    Route::resource('admin/permission', 'PermissionController');
    Route::resource('admin/post', 'PostController');
    Route::resource('admin/tag', 'TagController');
    Route::resource('admin/category', 'CategoryController');
    Route::get('admin-login', 'Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('admin-login', 'Auth\LoginController@login');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
