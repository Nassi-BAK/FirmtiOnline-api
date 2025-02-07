<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\PublicController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware('guest')
    ->name('register');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware('guest')
    ->name('login');

// Protected routes
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // Add more authenticated routes here
    Route::middleware('auth:sanctum')->get('/test-role', function (Request $request) {
        $user = $request->user();
    
        return response()->json([
            'message' => 'Role test successful',
            'user' => $user->only(['id', 'name', 'email', 'role']),
            'is_admin' => $user->role === 'admin',
            'is_chef' => $user->role === 'chef',
            'is_user' => $user->role === 'user',
        ]);
    });
    Route::get('/public-info', [PublicController::class, 'index'])->withoutMiddleware(['auth:sanctum']);

});