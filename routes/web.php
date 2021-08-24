<?php

use App\Http\Controllers\DetailPlanController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\ACL\ProfileController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')
        ->namespace('Admin')        
        ->group(function(){
        require_once('admin/adminRoute.php');
   
});
Route::get('/', function () {
    return view('welcome');
});
