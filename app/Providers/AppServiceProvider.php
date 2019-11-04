<?php

namespace App\Providers;

use File;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    protected function checkForVendor($value)
    {
        if (stristr($value, 'http')) {
            return '<script src="' . $value . '"></script>';
        }

        if ($value == 'jquery') {
            return '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>';
        } elseif ($value == 'nouislider') {
            $str1 = '<link href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.0.2/nouislider.min.css"  rel="stylesheet">';
            $str2 = '<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.0.2/nouislider.min.js"></script>';
            return $str1 . $str2;
        }

        $resource_path = public_path('/themes/frostbite/dist/js/' . $value . '.js');
        return '<script>'. File::get($resource_path) . '</script>';
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('pagescript', function ($expression) {
            $expression = explode(',', preg_replace('/\s+/', '', $expression));
            $return_val = '';

            foreach ($expression as $value) {
                $return_val .= self::checkForVendor(str_replace("'", '', $value));
            }
            return $return_val;
        });

        Blade::directive('pagestyle', function ($expression) {
            $resource_path = public_path('/themes/frostbite/dist/css/' . $expression . '.css');
            return '<style>'. File::get($resource_path) . '</style>';
        });
    }
}
