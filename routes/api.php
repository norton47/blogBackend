<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::group(['prefix' => 'v1', 'namespace' => 'api\v1'], function () {
    Route::resource('category', 'CategoryController', ['only' => ['index']]);
    Route::resource('post', 'CategoryController', ['only' => ['index', 'show']]);

    Route::resource('comment', 'CommentController');
    //Route::resource('like', 'CategoryController');
});