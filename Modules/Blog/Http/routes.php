<?php
Route::group(['middleware' => 'auth:admin', 'prefix' => 'blog', 'namespace' => 'Modules\Blog\Http\Controllers'], function()
{
    Route::get('/', 'BlogController@index');
    Route::get('/blogabc', 'BlogController@blogabc');
});
