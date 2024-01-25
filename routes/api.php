<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\DishesController;
use App\Http\Controllers\Front\CategoryController;
use App\Http\Controllers\Front\DishImgController;
use App\Http\Controllers\Front\DishAttrController;
use App\Http\Controllers\Front\SectionController;
use App\Http\Controllers\Front\VendorsController;
use App\Http\Controllers\Front\PhoneVerificationController;
use App\Http\Controllers\Front\UserController;
use App\Http\Controllers\Front\OrderController;
use App\Http\Controllers\Front\AuthController;
use App\Http\Controllers\Front\PasswordController;
use App\Http\Controllers\Front\AddressController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/dishes', [DishesController::class, 'index']);
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/dishimg', [DishImgController::class, 'index']);
Route::get('/dishattr', [DishAttrController::class, 'index']);
Route::get('/sections', [SectionController::class, 'index']);
Route::get('/vendors', [VendorsController::class, 'index']);
Route::get('/orders', [OrderController::class, 'index']);
Route::get('/users', [UserController::class, 'index']);
Route::get('/user/{userId}/orders', [OrderController::class, 'showUserOrders']);
Route::get('/section/{sectionId}/dishes', [DishesController::class, 'showSectionDishes']);
Route::get('/search', [DishesController::class, 'search']);
Route::get('/orders/{orderId}/can-cancel', [OrderController::class, 'canCancelOrder']);


Route::post('/register', [UserController::class, 'register']);
Route::post('/verify-email', [UserController::class, 'verifyEmail']);
Route::post('/verify-password', [UserController::class, 'verifyPassword']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/order', [OrderController::class, 'order']);
Route::post('/send-reset-code', [UserController::class, 'sendResetCode']);
Route::post('/send-delete-account-code', [UserController::class, 'sendDeleteAccountCode']);
Route::post('/delete-account/{userId}', [UserController::class, 'deleteUserAndOrders']);
Route::post('/resend-code/{email}', [UserController::class, 'resendCode']);
Route::post('/users/{userId}/address', [AddressController::class, 'addAddress']);



Route::prefix('users')->group(function () {
    Route::post('{user}/update-profile-image', [UserController::class, 'updateProfileImage']);
});

Route::put('/users/{id}', [UserController::class, 'update']);
Route::put('/users/{userId}/update-password', [UserController::class, 'updatePassword']);
Route::put('/orders/{orderId}/update-status/{newStatus}', [OrderController::class,'updateOrderStatus']);




Route::post('/send-verification-code', [PhoneVerificationController::class, 'sendVerificationCode']);

