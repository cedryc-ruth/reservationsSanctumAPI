<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Artist;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArtistController;


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

//Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/artists', [ArtistController::class, 'index']);
Route::get('/artists/{id}', [ArtistController::class, 'show']);
Route::get('/artists/search/{name}', [ArtistController::class, 'search']);

//Protected routes
Route::group(['middleware'=>['auth:sanctum']], function() {
    Route::post('/artists', [AuthController::class, 'store']);
    Route::put('/artists/{id}', [AuthController::class, 'update']);
    Route::delete('/artists/{id}', [AuthController::class, 'destroy']);

    Route::post('/logout', [AuthController::class, 'logout']);

});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
