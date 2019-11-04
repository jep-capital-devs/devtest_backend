<?php

namespace App\Frostbite;

use TCG\Voyager\VoyagerServiceProvider;

class FrostbiteServiceProvider extends VoyagerServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->loadViewsFrom(glob(__DIR__.'/**/**/Views/Admin'), 'frostbiteadmin');
        $this->loadViewsFrom(__DIR__, 'frostbitemaster');

        //REQUIRE ALL ROUTES FILES IN MODULES ALSO
        $vendor_folders = array_map(function ($dir) {
            return basename($dir);
        }, glob('../app/Frostbite/*', GLOB_ONLYDIR));

        foreach ($vendor_folders as $vendor_folder) {
            $module_folders = array_map(function ($dir) {
                return basename($dir);
            }, glob('../app/Frostbite/'.$vendor_folder.'/*', GLOB_ONLYDIR));

            foreach ($module_folders as $module_folder) {
                $helper_files = array_map(function ($dir) {
                    return basename($dir);
                }, glob('../app/Frostbite/'.$vendor_folder.'/'.$module_folder.'/Helpers/*.{php}', GLOB_BRACE));

                // load helpers
                foreach ($helper_files as $helper_file) {
                    require_once __DIR__.'/'.$vendor_folder.'/'.$module_folder.'/Helpers/'.$helper_file;
                }
            }
        }
    }
}
