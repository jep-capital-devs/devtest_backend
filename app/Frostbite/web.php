<?php
/*
 * !!! NEVER TOUCH THIS FILE !!!
 */

$theme_data = collect(DB::select(DB::raw("SELECT folder FROM voyager_themes WHERE active = 1")));
if (empty($theme_data)) {
    DB::table('voyager_themes')->insert(array(
     0 =>
     array(
         'name'   => 'Frosbite Scaffold Theme',
         'folder' => 'frostbite',
         'active' => 1,
         'version' => '1.0',
         'created_at' => date('Y-m-d H:i:s'),
         'updated_at' => date('Y-m-d H:i:s'),
     )
 ));
}

$frost_core   = '\App\Frostbite\Core\\';
$frost_sure   = '\App\Frostbite\Suretypedia\\';
$frost_bx     = '\App\Frostbite\BondExchange\\';
$frost_jet    = '\App\Frostbite\Jet\\';
$frost_ccis   = '\App\Frostbite\Ccis\\';

//REQUIRE ALL ROUTES FILES IN MODULES ALSO
$folders = array_map(function ($dir) {
    return basename($dir);
}, glob('../app/Frostbite/*', GLOB_ONLYDIR));

foreach ($folders as $folder) {
    $inner_folders = array_map(function ($dir) {
        return basename($dir);
    }, glob('../app/Frostbite/'.$folder.'/*', GLOB_ONLYDIR));

    foreach ($inner_folders as $inner_folder) {
        if (file_exists('../app/Frostbite/'.$folder.'/'.$inner_folder.'/web.php')) {
            require_once  $app_root.'/app/Frostbite/'.$folder.'/'.$inner_folder.'/web.php';
        }
    }
}
// Non-Admin
require_once  $app_root.'/resources/views/themes/frostbite/web.php';
//Admin functionality for admin.php
require_once  $app_root.'/app/Frostbite/admin.php';
