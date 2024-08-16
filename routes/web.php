<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\Usercontroller;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Front\IndexController;

use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\MailController;
use App\Http\Controllers\Admin\ProductController;
use GuzzleHttp\Middleware;
use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Mail;

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

Route::get('/redirects', [IndexController::class, 'redirects']);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'], function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    // User
    Route::resource('/user', Usercontroller::class,);
    Route::post('update_status/', [Usercontroller::class, 'updateStatus'])->name('isdiscount');
    // Setting
    Route::resource('/setting', SettingController::class,);
    Route::post('update_site/', [SettingController::class, 'updateSite'])->name('isStatussite');



    Route::resource('roles', RoleController::class);
    Route::post('/role_delete/{id}', [RoleController::class, 'delete'])->name('role.delete');
    Route::resource('permissions', PermissionController::class);
    Route::post('/roles/{role}/permissions', [RoleController::class, 'givePermission'])->name('roles.permissions');
    Route::delete('/roles/{role}/permissions/{permission}', [RoleController::class, 'revokePermission'])->name('roles.permission.revoke');
    Route::post('/permissions/{permission}/roles', [PermissionController::class, 'giveRoles'])->name('permission.roles');
    Route::delete('/permissions/{permission}/roles/{role}', [PermissionController::class, 'removeRole'])->name('permissions.roles.remove');
    Route::get('/user/{user}', [Usercontroller::class, 'showRole'])->name('user.role');
    Route::post('/user/{user}/roles', [Usercontroller::class, 'giveUserRole'])->name('user.roles');
    Route::delete('/user/{user}/roles/{role}', [Usercontroller::class, 'revokeUserRole'])->name('user.roles.remove');
    Route::post('/user/{user}/permissions', [Usercontroller::class, 'giveUserPermissions'])->name('user.permissions');
    Route::delete('/user/{user}/permissions/{permission}', [Usercontroller::class, 'revokeUserPermissions'])->name('user.permissions.remove');
    Route::resource('products', ProductController::class);

    Route::get('/usertest', [Usercontroller::class, 'test'])->name('test');
    Route::get('/sendemail', [MailController::class, 'sendEmail'])->name('sendemail');
    Route::get('/email', [MailController::class, 'index'])->name('email');
    Route::post('/postemail', [MailController::class, 'store'])->name('postemail');

    Route::post('/sendemailcustomer', [MailController::class, 'sendcustomer'])->name('sendcustomer');

    
});

Route::middleware(['web', 'guest'])->controller(AuthController::class)->group(function () {
    Route::get('/admin/login', 'index')->name('login');
    Route::post('/admin/login', 'auth')->name('auth');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/error', [ProductController::class, 'error'])->name('error');
