<?php

use App\Http\Controllers\Api\{
    CategoryApiController,
    EvaluationApiController,
    OrderApiController,
    ProductApiController,
    TableApiController,
    TenantApiController
};
use App\Http\Controllers\Api\Auth\AuthClientController;
use App\Http\Controllers\Api\Auth\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/sanctum/token',[AuthClientController::class,'auth']);

route::group([
      'middleware' => ['auth:sanctum']
],function() {
Route::get('auth/me',[AuthClientController::class,'me']);
Route::post('/auth/logout',[AuthClientController::class,'logout']);
Route::post('/auth/v1/orders',[OrderApiController::class,'store']);

Route::post('/auth/v1/orders/{identifyOrder}/evaluations',[EvaluationApiController::class,'store']);

Route::get('/auth/v1/my-orders',[OrderApiController::class,'myOrders']);

});

route::group([
    'prefix'=>'v1'
],function() {
Route::get('/tenants/{uuid}',[TenantApiController::class,'show']);
Route::get('/tenants',[TenantApiController::class,'index']);


Route::get('/categories/{identify}',[CategoryApiController::class,'show']);
Route::get('/categories',[CategoryApiController::class,'categoriesByTenant']);



Route::get('/table',[TableApiController::class,'getAllTable']);
Route::get('/table/{identify}',[TableApiController::class,'show']);


Route::get('/product/{identify}',[ProductApiController::class,'show']);
Route::get('/product',[ProductApiController::class,'ProductsByTenant']);

Route::get('/client',[RegisterController::class,'store']);

Route::post('/orders',[OrderApiController::class,'store']);
Route::get('/orders/{identify}',[OrderApiController::class,'show']);



});