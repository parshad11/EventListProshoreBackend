<?php
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => '/pro',
    'namespace' => 'Proshore', 'as' => 'api.',
    'middleware' => 'decrypt-key'
], function () {

    Route::get('get-event-list', 'EventCurdController@getEventList');
    Route::post('add-event-list', 'EventCurdController@addEventList');
    Route::post('edit-event-list', 'EventCurdController@editEventList');
    Route::delete('delete-event-list', 'EventCurdController@deleteEventList');
});