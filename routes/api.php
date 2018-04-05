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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::group(['prefix'=>'v1','as'=>'v1.'], function(){
    Route::resource('users', 'Api\UserController');
    Route::resource('companies', 'Api\CompanyController');
});

// Test Routes
// Route::get('/v1/users', function() {
//     return response()->json([
//         'page' => 1,
//         'total' => 20,
//         'users' => [
//             [
//                 'company' => [],
//                 'address' => [],
//             ],
//             [],[],[],[],[],[],
//             [],[],[],[],[],[],
//             [],[],[],[],[],[],[]
//         ]
//     ])->setStatusCode(200);
// });
//
// Route::get('/v1/users/2', function() {
//     return response()->json([
//         'total' => 1,
//         'user' => [
//             "name" => "Ervin Howell",
//             "username" => "ehowell",
//             "email" => "shanna@melissa.tv",
//             "phone" => "020-7365-9514",
//             "website" => "shanna.net",
//             'company' => [],
//             'address' => [],
//         ]
//     ])->setStatusCode(200);
// });
