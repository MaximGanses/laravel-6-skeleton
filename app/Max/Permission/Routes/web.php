<?php
/*
|--------------------------------------------------------------------------
| Permission Routes
|--------------------------------------------------------------------------
|
| Here is where you can register permission routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::prefix('admin')->group(function () {

    Route::prefix('roles')->group(function () {
        Route::get('/', 'RoleController@RoleIndexAction')->name('permission.roles');
        Route::any('/create/new/role', 'RoleController@createRoleAction')->name('permission.roles.create');
        Route::any('/create/role/{role}', 'RoleController@deleteRoleAction')->name('permission.roles.delete');
        Route::get('/{role}/{user}', 'RoleController@addRoleToUserAction')->name('permission.roles.users');
        Route::get('/{role}/{user}/delete', 'RoleController@deleteRoleFromUserAction')->name('permission.roles.users.delete');
        Route::get('/{role}/{permission}/add', 'RoleController@assignRoleToPermission')->name('permission.roles.permission');
        Route::get('/{role}/{permission}/remove', 'RoleController@removeRoleFromPermission')->name('permission.roles.permission.remove');
    });

    Route::prefix('permissions')->group(function () {
        Route::get('/', 'PermissionController@permissionIndexAction')->name('permission.permission');
        Route::any('/create/new/permission', 'PermissionController@createPermissionAction')->name('permission.permission.create');
        Route::get('/{permission}/delete', 'PermissionController@removePermissionAction')->name('permission.permission.delete');
        Route::get('/{permission}/{role}', 'PermissionController@assignPermissionToRole')->name('permission.permission.role');
        Route::get('/{permission}/{role}/delete', 'PermissionController@deleteRoleFromPermissionAction')->name('permission.permission.role');
    });

    Route::prefix('users')->group(function () {

    });

});
