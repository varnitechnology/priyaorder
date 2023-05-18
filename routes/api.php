<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\ClarityController; 
use App\Http\Controllers\API\ColorController; 
use App\Http\Controllers\API\ShapeController; 
use App\Http\Controllers\API\CompanyController; 
use App\Http\Controllers\API\OrderController; 
use App\Http\Controllers\API\UserTypeController; 
use App\Http\Controllers\API\ContactController;
use App\Http\Controllers\API\DispatcheController;

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

Route::controller(RegisterController::class)->group(function(){
    Route::post('register', 'register');
    Route::post('login', 'login');
});
Route::middleware('auth:sanctum')->group( function () {
    Route::resource('products', ProductController::class);
	Route::resource('clarities', ClarityController::class);
    Route::resource('colors', ColorController::class);
    Route::resource('shapes', ShapeController::class);
    Route::resource('company', CompanyController::class);
    Route::resource('order', OrderController::class);
    Route::resource('usertype', UserTypeController::class);
    Route::resource('contact', ContactController::class);
    Route::resource('dispatche', DispatcheController::class);
});
