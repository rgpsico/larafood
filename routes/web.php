<?php

use App\Http\Controllers\DetailPlanController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\ACL\ProfileController;
use App\Http\Controllers\Site\SiteController;
use App\Models\Client;
use Illuminate\Support\Facades\Route;

Route::get('teste1',function(){
 $client = Client::first();
 $token = $client->createToken('token-teste');

        dd($token->plainTextToken);


});

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


