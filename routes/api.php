<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('content',function () {
    return response()->json(
        [
            ['content' => 'My first post'],
            ['content' => 'My second post'],
            ['content' => 'My n post']
        ],
        200
    );
});

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
