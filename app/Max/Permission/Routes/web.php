<?php


Route::prefix('permission')->group(function () {
    Route::get('/', 'PermissionController@indexAction')->name('permission.index');

    Route::get('/roles', 'RoleController@RoleIndexAction')->name('permission.roles');
    Route::any('/roles/create/new/role', 'RoleController@createRoleAction')->name('permission.roles.create');
    Route::any('/roles/create/role/{role}', 'RoleController@deleteRoleAction')->name('permission.roles.delete');
    Route::get('/roles/{role}/{user}', 'RoleController@addRoleToUserAction')->name('permission.roles.users');
    Route::get('/roles/{role}/{user}/delete', 'RoleController@deleteRoleFromUserAction')->name('permission.roles.users.delete');
    Route::get('/roles/{role}/{permission}/add', 'RoleController@assignRoleToPermission')->name('permission.roles.permission');
    Route::get('/roles/{role}/{permission}/remove', 'RoleController@removeRoleFromPermission')->name('permission.roles.permission.remove');


    Route::get('/permissions', 'PermissionController@permissionIndexAction')->name('permission.permission');
    Route::any('/permissions/create/new/permission', 'PermissionController@createPermissionAction')->name('permission.permission.create');
    Route::get('/permissions/{permission}/{role}', 'PermissionController@assignPermissionToRole')->name('permission.permission.role');
    Route::get('/permissions/{permission}/{role}/delete', 'PermissionController@deleteRoleFromPermissionAction')->name('permission.permission.role');

    Route::get('/user', 'PermissionController@indexAction')->name('permission.user');
});
