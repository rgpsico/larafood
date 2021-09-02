<?php

use App\Http\Controllers\Api\{
    CategoryApiController,
    ProductApiController,
    TableApiController,
    TenantApiController
};

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

route::group([
    'prefix'=>'v1'
],function() {
Route::get('/tenants/{uuid}',[TenantApiController::class,'show']);
Route::get('/tenants',[TenantApiController::class,'index']);

Route::get('/categories',[CategoryApiController::class,'categoriesByTenant']);
Route::get('/categories/{url}',[CategoryApiController::class,'show']);


Route::get('/table',[TableApiController::class,'getAllTable']);
Route::get('/table/{uuid}',[TableApiController::class,'show']);


Route::get('/product',[ProductApiController::class,'ProductsByTenant']);
Route::get('/product/{flag}',[ProductApiController::class,'show']);
});