<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

use API\Utilities;
use Illuminate\Support\Facades\App;

App::before(function($request)
{
	if(starts_with($_SERVER['REQUEST_URI'],'/api/')) {
		header('Access-Control-Allow-Origin: *');
		header('Content-Type: application/json');
	}
	if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
		header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET, PUT, DELETE, POST, OPTIONS');
		header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization, X-Request-With');
		header('Access-Control-Allow-Credentials: true');
		header('Content-Type: application/json');
		exit;
	}
});

Route::group(['prefix' => 'api/v1', 'before' => ''], function(){
	Route::resource('customers', 'CustomersController');
});

// setup wildcard to return 500 if nothing caught above
Route::any('{path?}', function($path) {
	$path = Utilities::capitalize($path);
	return Response::json(['response' => "{$path} Invalid URI"],500);
})->where('path', '.+');

//Route::group(array('prefix' => 'api/v1', 'before' => 'api.auth|api.limit'), function() {
//	Route::resource('customers', 'CustomersAPIController');
//});
