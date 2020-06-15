<?php

Route::namespace('\Austenc\Socialize\Http\Controllers')->prefix('socialize/settings/')->name('socialize.settings.')->group(function () {
    Route::get('/', 'SocializeController@index')->name('index');
    Route::post('/', 'SocializeController@store')->name('store');
});
