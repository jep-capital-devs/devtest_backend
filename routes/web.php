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

// CUSTOM THEME ROUTING SYSTEM
$app_root = base_path();
require_once  $app_root."/app/Frostbite/web.php";

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
