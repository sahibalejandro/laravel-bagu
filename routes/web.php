<?php

Route::group([
    'prefix' => '/bagu',
    'namespace' => 'Sahib\Bagu\Http\Controllers'], function () {

    Route::get('/', 'BaguController@index');
    Route::get('/api/records', 'BaguController@records');
    Route::get('/api/records/{id}', 'BaguController@show')
        ->where('id', '[0-9]+');
});
