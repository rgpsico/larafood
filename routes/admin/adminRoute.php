<?php

use App\Http\Controllers\Admin\ACL\PlanProfileController;
use App\Http\Controllers\Admin\ACL\PermissionController;
use App\Http\Controllers\admin\ACL\ProfileController;
use App\Http\Controllers\DetailPlanController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\Admin\ACL\PermissionProfileController;

/*
plan  x Profile
*/ 
Route::get('plans/{id}/Profiles', [PlanProfileController::class,'Profiles'])->name('plans.profiles');;
Route::any('plans/{id}/Profiles/create', [PlanProfileController::class,'ProfilesAvailable'])->name('plans.profiles.available');;
Route::post('plans/{id}/Profiles', [PlanProfileController::class,'attachProfilesPlan'])->name('plans.profiles.attach');;
Route::get('plans/{id}/Profiles/{idProfile}/detach', [PlanProfileController::class,'detachPlanoProfile'])->name('plans.profile.detach');;
Route::get('profiles/{id}/profile', [PlanProfileController::class,'plans'])->name('profiles.plans');;



/*
Permission x Profile
*/ 
Route::get('profiles/{id}/permissions', [PermissionProfileController::class,'permissions'])->name('profiles.permissions');;
Route::any('profiles/{id}/permissions/create', [PermissionProfileController::class,'permissionsAvailable'])->name('profiles.permissions.available');;
Route::post('profiles/{id}/permissions', [PermissionProfileController::class,'attachPermissionsProfile'])->name('profiles.permissions.attach');;
Route::get('profiles/{id}/permissions/{idPermission}/detach', [PermissionProfileController::class,'detachPermissionsProfile'])->name('profiles.permissions.detach');;
Route::get('permissions/{id}/profile', [PermissionProfileController::class,'profiles'])->name('permissions.profiles');;


/*
Permission 
*/ 
Route::post('permissions/', [PermissionController::class,'store'])->name('permissions.store');;
Route::get('permissions', [PermissionController::class,'index'])->name('permissions.index');;
Route::get('permissions/create', [PermissionController::class,'create'])->name('permissions.create');
Route::any('permissions/search', [PermissionController::class,'search'])->name('permissions.search');;
Route::get('permissions/show/{id}', [PermissionController::class,'show'])->name('permissions.show');;
Route::get('permissions/edit/{id}', [PermissionController::class,'edit'])->name('permissions.edit');;
Route::delete('permission/destroy/{id}', [PermissionController::class,'destroy'])->name('permissions.destroy');;
Route::put('permissions/{id}', [PermissionController::class,'update'])->name('permissions.update');;




/*
Profile 
*/ 
Route::get('profiles', [ProfileController::class,'index'])->name('profiles.index');;
Route::get('profiles/create', [ProfileController::class,'create'])->name('profiles.create');
Route::any('profiles/search', [ProfileController::class,'search'])->name('profiles.search');;
Route::get('profiles/show/{id}', [ProfileController::class,'show'])->name('profiles.show');;
Route::get('profiles/edit/{id}', [ProfileController::class,'edit'])->name('profiles.edit');;
Route::delete('profiles/destroy/{id}', [ProfileController::class,'destroy'])->name('profiles.destroy');;
Route::post('profiles/', [ProfileController::class,'store'])->name('profile.store');;
Route::put('profiles/{id}', [ProfileController::class,'update'])->name('profile.update');;



/*
Plans  details
*/ 
Route::delete('plans/{url}/details/{idDetail}',[DetailPlanController::class,'destroy'])->name('details.plan.destroy');
Route::get('plans/{url}/details/{idDetail}/show',[DetailPlanController::class,'show'])->name('details.plan.show');
Route::put('plans/{url}/details/{idDetail}/update',[DetailPlanController::class,'update'])->name('details.plan.update');
Route::get('plans/{url}/details/{idDetail}/edit',[DetailPlanController::class,'edit'])->name('details.plan.edit');
Route::post('plans/{url}/details/store',[DetailPlanController::class,'store'])->name('details.plan.store');
Route::get('plans/{url}/details/create',[DetailPlanController::class,'create'])->name('details.plan.create');
Route::get('plans/{url}/details',[DetailPlanController::class,'index'])->name('details.plan.index');




/*
Plans 
*/ 
Route::get('plans/create',[PlanController::class,'create'])->name('plans.create');
Route::get('plans/create',[PlanController::class,'create'])->name('plans.create');
Route::put('plans/{url}',[PlanController::class,'update'])->name('plans.update');
Route::get('plans/{url}/edit',[PlanController::class,'edit'])->name('plans.edit');
Route::any('plans/search',[PlanController::class,'search'])->name('plans.search');
Route::get('plans/{url}',[PlanController::class,'show'])->name('plans.show');
Route::delete('plans/{id}',[PlanController::class,'destroy'])->name('plans.destroy');
Route::get('plans',[PlanController::class,'index'])->name('plans.index');
Route::post('plans',[PlanController::class,'store'])->name('plans.store');
Route::get('/',[PlanController::class,'index'])->name('admin.index');

?>