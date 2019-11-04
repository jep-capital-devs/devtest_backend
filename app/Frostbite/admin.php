<?php
Route::group(['prefix' => 'admin/frost'], function () {
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

        return view('frostbitemaster::master', ['frost_params' => $frost_params]);
    });
});
