<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CityController;
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
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
});

Route::group([
    'middleware' => ['client.verify'],
], function ($router) {
    Route::get('/user-profile-data', [UserController::class, 'getProfileData']);
});

Route::group(['prefix' => 'book'], function () {
    Route::get('/', [BookController::class, 'index']);
    Route::post('/', [BookController::class, 'store']);
    Route::get('/{bookId}', [BookController::class, 'show']);
    Route::put('/{bookId}', [BookController::class, 'update']);
    Route::delete('/{bookId}', [BookController::class, 'destroy']);
});


Route::group(['prefix' => 'city'], function () {
    Route::get('/', [CityController::class, 'index']);
    Route::post('/', [CityController::class, 'store']);
    Route::get('/{postId}', [CityController::class, 'show']);
    Route::put('/{postId}', [CityController::class, 'update']);
    Route::delete('/{postId}', [CityController::class, 'destroy']);
});
