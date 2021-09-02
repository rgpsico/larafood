<?php

use App\Http\Controllers\DetailPlanController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\ACL\ProfileController;
use App\Http\Controllers\Site\SiteController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')
        ->namespace('Admin') 
        ->middleware('auth')       
        ->group(function(){
        require_once('admin/adminRoute.php');

        Route::get('/test-acl', function(){
              
        
        });
        
   
});

/*
teste
*/



/**
 * SITE
 */
Route::get('/plan/{url}',[SiteController::class,'plan'])->name('plan.subscription');
Route::get('/',[SiteController::class,'index'])->name('site.home');


Auth::routes();


