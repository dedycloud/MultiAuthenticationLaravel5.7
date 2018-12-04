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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('admin/home', 'AdminController@index')->name('admin.home');

//admin authentication routes are here
// Authentication Routes...
        $this->get('admin', 'Admin\LoginController@showLoginForm')->name('admin.login');
        $this->post('admin', 'Admin\LoginController@login');
        $this->post('admin-logout', 'Admin\LoginController@logout')->name('admin.logout');

        // Password Reset Routes...
        $this->get('admin-password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');

        $this->post('admin-password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');

        $this->get('admin-password/reset/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');

        $this->post('admin-password/reset', 'Admin\ResetPasswordController@reset')->name('admin.password.update');
