<?php
Auth::routes();
Route::post('registeruser', '\App\Frostbite\Core\Registration\Controllers\RegistrationController@register')->name('registeruser');
Route::post('logoutuser', '\App\Frostbite\Core\Registration\Controllers\RegistrationController@logoutuser')->name('logoutuser');

Route::get('{route}', function () {
    $url_params   = explode('&', str_replace('?', '', strstr(url()->full(), '?')));

    if ($url_params[0] === "") {
        $frost_params = null;
    } else {
        $frost_params = [];
        foreach ($url_params as $param) {
            $param = explode('=', $param);
            $frost_params[$param[0]] = $param[1];
        }
    }
    return view('theme::master', ['frost_params' => $frost_params]);
})->where('route', '^((?!admin).)*$');

// CUSTOM ROUTES FOR APPLICATION
