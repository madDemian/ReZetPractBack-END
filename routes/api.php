<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

Route::group(['middleware'=>['auth:sanctum']], function (){
    Route::get('/me',[UserController::class,'me']);
    Route::get('/logout',[AuthController::class,'logout']);
    Route::apiResource('posts', PostController::class)->except('index');
});

Route::get('posts', [PostController::class, "index"]);
Route::get('/{user:user_name}/posts',[UserController::class,'getUserPosts']);
Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);
Route::get('/{user:user_name}',[UserController::class,'getUserInfo']);


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
