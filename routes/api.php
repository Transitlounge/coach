<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvtasker within a group which
| is assigned the "api" mtaskdleware group. Enjoy building your API!
|
*/

// Route::mtaskdleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });



Route::namespace('API')->group(function () {

	Route::group(['prefix' => 'auth'], function () {
		Route::post('login', 'AuthController@login');
		Route::post('signup', 'AuthController@signup');
		Route::group(['middleware' => 'auth:api'], function() {
				Route::get('logout', 'AuthController@logout');
				Route::get('user', 'AuthController@user');
		});
	});

	Route::get('tasks', 'TaskController@index');
	Route::get('tasks/{task}', 'TaskController@show');
	Route::post('tasks', 'TaskController@store');
	Route::put('tasks/{task}', 'TaskController@update');
	Route::delete('tasks/{task}', 'TaskController@delete');
});
