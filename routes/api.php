<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\DonationRequestController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\PetitionController;
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


// Login and Register public Routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
// Protected Routes
 Route::group(['middleware' => ['auth:sanctum']], function () {
     //donatios routes
    Route::get('/donations/{search?}', [DonationController::class, 'index']);
    Route::get('/donation/{id}', [DonationController::class, 'show']);
    Route::post('/donations', [DonationController::class, 'store']);
    Route::post('/donations/{id}/requests', [DonationRequestController::class, 'store']);
    Route::put('/donations/{id}', [DonationController::class, 'update']);
    Route::delete('/donations/{id}', [DonationController::class, 'destroy']);
    //petitions routes  
    Route::get('/petitions', [PetitionController::class, 'index']);
    Route::get('/petition/{id}', [PetitionController::class, 'show']);
    Route::post('/petitions', [PetitionController::class, 'store']);
    Route::delete('/petitions/{id}', [PetitionController::class, 'destroy']);
    //user routes
    Route::post('/users/{id}', [AuthController::class, 'update']);
    Route::get('/users/{id}', [AuthController::class, 'show']);
    Route::post('/logout', [AuthController::class, 'logout']); //log out user

});