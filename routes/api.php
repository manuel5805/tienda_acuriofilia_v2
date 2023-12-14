<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReadUserController;
use App\Http\Controllers\ReadOrderController;
use App\Http\Controllers\CreateUserController;
use App\Http\Controllers\DeleteUserController;
use App\Http\Controllers\UpdateUserController;
use App\Http\Controllers\CreateOrderController;
use App\Http\Controllers\ReadInquiryController;
use App\Http\Controllers\ReadProductController;
use App\Http\Controllers\UserReviewsController;
use App\Http\Controllers\CreateReviewController;
use App\Http\Controllers\OrderProductController;
use App\Http\Controllers\UpdateReviewController;
use App\Http\Controllers\UserInquirysController;
use App\Http\Controllers\CreateCommentController;
use App\Http\Controllers\CreateInquiryController;
use App\Http\Controllers\CreateProductController;
use App\Http\Controllers\DeleteCommentController;
use App\Http\Controllers\DeleteInquiryController;
use App\Http\Controllers\DeleteProductController;
use App\Http\Controllers\UpdateProductController;
use App\Http\Controllers\ProductReviewsController;
use App\Http\Controllers\ReadAllInquiryController;
use App\Http\Controllers\ReadUserCommentsController;
use App\Http\Controllers\ReadOrderProductsController;
use App\Http\Controllers\ReadInquiryCommentsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Login 
Route::post('/login', [LoginController::class, 'login']);

//Users
Route::post('/users/store', [CreateUserController::class, 'store']);
Route::put('/users/update/{user}', [UpdateUserController::class, 'update']);
Route::delete('/users/delete/{user}', [DeleteUserController::class, 'destroy']);
Route::get('/users/read/{user}', [ReadUserController::class, 'show']);

 //Products
Route::post('/products/store', [CreateProductController::class, 'store']);
Route::put('/products/update/{product}', [UpdateProductController::class, 'update']);
Route::delete('/products/delete/{product}', [DeleteProductController::class, 'destroy']);
Route::get('/products/read/{product}', [ReadProductController::class, 'show']);

//Reviews
Route::post('/reviews/store', [CreateReviewController::class, 'store']);
Route::put('/reviews/update/{review}', [UpdateReviewController::class, 'update']);
Route::get('/reviews/user/{userId}', [UserReviewsController::class, 'showUserReviews']);
Route::get('/reviews/product/{productId}', [ProductReviewsController::class, 'showProductReviews']);

//Inquiries
Route::post('/inquiries/store', [CreateInquiryController::class, 'store']);
Route::get('/inquiries/read/{inquiry}',[ReadInquiryController::class, 'show']);
Route::get('/inquiries/user/{userId}',[UserInquirysController::class, 'showUserInquirys']);
Route::delete('/inquiries/delete/{inquiry}',[DeleteInquiryController::class, 'destroy']);
Route::get('/inquiries/read_all', [ReadAllInquiryController::class, 'showAll']);

//Comments
Route::post('/comments/store', [CreateCommentController::class, 'store']);
Route::delete('/comments/delete/{comment}', [DeleteCommentController::class, 'destroy']);
Route::get('/comments/user/{userId}', [ReadUserCommentsController::class, 'showUserComments']);
Route::get('/comments/inquiry/{inquiryId}', [ReadInquiryCommentsController::class, 'showInquiryComments']);

//Orders
Route::post('/orders/store', [CreateOrderController::class, 'store']);
Route::get('/orders/read/{userId}', [ReadOrderController::class, 'showUserOrders']);
Route::post('/orders/{orderId}/products', [OrderProductController::class, 'addProductsToOrder']);
Route::get('/orders/read/products/{orderId}', [ReadOrderProductsController::class, 'showProductOrders']);





