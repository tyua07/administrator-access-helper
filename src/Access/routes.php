<?php

Route::group(['prefix' => 'api'], function () {
    //角色
    Route::resource('roles', '\Yangyifan\Administrator\Access\Controller\RolesController');
    //菜单
    Route::resource('menus', '\Yangyifan\Administrator\Access\Controller\MenusController');
    //管理员
    Route::resource('admin-info', '\Yangyifan\Administrator\Access\Controller\AdminInfoController');
    //管理员下面的菜单
    Route::resource('admin-info.menus', '\Yangyifan\Administrator\Access\Controller\AdminInfoMenusController', ['only' => 'index']);
    //节点
    Route::resource('nodes', '\Yangyifan\Administrator\Access\Controller\NodesController');
});


