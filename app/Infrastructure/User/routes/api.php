<?php

Route::group([
    'prefix' => 'users',
], static function () {
    Route::get('/', 'UserController@list');
    Route::patch('/{id}', 'UserController@update');
    Route::delete('/{id}', 'UserController@delete');
});
