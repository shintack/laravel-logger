<?php

/*
|--------------------------------------------------------------------------
| Laravel Logger Web Routes
|--------------------------------------------------------------------------
|
*/

Route::group(['prefix' => 'activity', 'namespace' => 'shintack\LaravelLogger\App\Http\Controllers', 'middleware' => ['web', 'auth', 'activity']], function () {

    // Dashboards
    Route::get('/', 'LaravelLoggerController@showAccessLog');
    Route::get('/cleared', ['uses' => 'LaravelLoggerController@showClearedActivityLog']);

    // Drill Downs
    Route::get('/log/{id}', 'LaravelLoggerController@showAccessLogEntry');
    Route::get('/cleared/log/{id}', 'LaravelLoggerController@showClearedAccessLogEntry');

    // Forms
    Route::delete('/clear-activity', ['uses' => 'LaravelLoggerController@clearActivityLog']);
    Route::delete('/destroy-activity', ['uses' => 'LaravelLoggerController@destroyActivityLog']);
    Route::post('/restore-log', ['uses' => 'LaravelLoggerController@restoreClearedActivityLog']);
});
