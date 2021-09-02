<?php


use  App\Http\Controllers\Admin\ACL\PlanProfileController;
use App\Http\Controllers\Admin\ACL\PermissionController;
use App\Http\Controllers\admin\ACL\ProfileController;
use App\Http\Controllers\DetailPlanController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\Admin\ACL\PermissionProfileController;
use App\Http\Controllers\Admin\ACL\PermissionRoleController;
use App\Http\Controllers\Admin\ACL\RoleController;
use App\Http\Controllers\Admin\ACL\RoleUserController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\CategoryProductController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\TableController;
use App\Http\Controllers\admin\TenantController;
use App\Http\Controllers\admin\UserController;
use App\Models\Category;


Route::get('users/{id}/role/{idRole}/detach', [RoleUserController::class,'detachRolePlan'])->name('users.role.detach');
Route::post('users/{id}/roles', [RoleUserController::class,'attachRolesUser'])->name('users.roles.attach');
Route::any('users/{id}/roles/create', [RoleUserController::class,'rolesAvailable'])->name('users.roles.available');
Route::get('users/{id}/roles', [RoleUserController::class,'roles'])->name('users.roles');
Route::get('roles/{id}/users', [RoleUserController::class,'users'])->name('roles.users');




/**
 * Tenants 
 * */
Route::any('tenants/search', [TenantController::class,'search'])->name('tenants.search');;
Route::get('tenants', [TenantController::class,'index'])->name('tenants.index');
Route::post('tenants/posts', [TenantController::class,'store'])->name('tenants.store');
Route::get('tenants/create', [TenantController::class,'create'])->name('tenants.create');
Route::get('tenants/{id}', [TenantController::class,'edit'])->name('tenants.edit');
Route::get('tenants/show/{id}', [TenantController::class,'show'])->name('tenants.show');
Route::put('tenants/{id}/update', [TenantController::class,'update'])->name('tenants.update');
Route::delete('tenants/{id}', [TenantController::class,'destroy'])->name('tenants.destroy');



/*
ROUTES Mesas
*/

Route::any('table/search', [TableController::class,'search'])->name('table.search');;

Route::get('table', [TableController::class,'index'])->name('table.index');
Route::post('table/posts', [TableController::class,'store'])->name('table.store');
Route::get('table/create', [TableController::class,'create'])->name('table.create');
Route::get('table/{id}', [TableController::class,'edit'])->name('table.edit');
Route::get('table/show/{id}', [TableController::class,'show'])->name('table.show');
Route::put('table/{id}/update', [TableController::class,'update'])->name('table.update');
Route::delete('table/{id}', [TableController::class,'destroy'])->name('table.destroy');



/*
Produto   x Categoria
*/ 
Route::get('products/{id}/categories', [CategoryProductController::class,'categories'])->name('products.categories');;
Route::any('products/{id}/categories/create', [CategoryProductController::class,'categoriesAvailable'])->name('products.categories.available');;
Route::post('products/{id}/categories', [CategoryProductController::class,'attachCategoriesProduct'])->name('products.categories.attach');;
Route::get('products/{id}/categories/{idCategory}/detach', [CategoryProductController::class,'detachCategoryProduct'])->name('products.category.detach');;
Route::get('profiles/{id}/profile', [CategoryProductController::class,'products'])->name('categories.products');;





/*
ROUTES Products
*/ 
Route::any('products/search', [ProductController::class,'search'])->name('products.search');;

Route::get('products', [ProductController::class,'index'])->name('products.index')->middleware('can:products');
Route::post('products/posts', [ProductController::class,'store'])->name('products.store')->middleware('can:products');
Route::get('products/create', [ProductController::class,'create'])->name('products.create')->middleware('can:products');
Route::get('products/{id}', [ProductController::class,'edit'])->name('products.edit')->middleware('can:products');
Route::get('products/show/{id}', [ProductController::class,'show'])->name('products.show')->middleware('can:products');
Route::put('products/{id}/update', [ProductController::class,'update'])->name('products.update')->middleware('can:products');
Route::delete('products/{id}', [ProductController::class,'destroy'])->name('products.destroy')->middleware('can:products');



/*
ROUTES Categorias
*/ 
Route::any('categories/search', [CategoryController::class,'search'])->name('categories.search');;
Route::get('categories', [CategoryController::class,'index'])->name('categories.index');
Route::post('categories/posts', [CategoryController::class,'store'])->name('categories.store');
Route::get('categories/create', [CategoryController::class,'create'])->name('categories.create');
Route::get('categories/{id}', [CategoryController::class,'edit'])->name('categories.edit');
Route::get('categories/show/{id}', [CategoryController::class,'show'])->name('categories.show');
Route::put('categories/{id}/update', [CategoryController::class,'update'])->name('categories.update');
Route::delete('categories/{id}', [CategoryController::class,'destroy'])->name('categories.destroy');

/*
Usuarios
*/ 

Route::get('users/search', [UserController::class,'search'])->name('users.search');;
Route::get('users', [UserController::class,'index'])->name('users.index');
Route::post('users/posts', [UserController::class,'store'])->name('users.store');
Route::get('users/create', [UserController::class,'create'])->name('users.create');
Route::get('users/{id}', [UserController::class,'edit'])->name('users.edit');
Route::get('users/show/{id}', [UserController::class,'show'])->name('users.show');
Route::put('users/{id}/update', [UserController::class,'update'])->name('users.update');
Route::delete('users/{id}', [UserController::class,'destroy'])->name('users.destroy');



/*
Cargos
*/ 
Route::get('roles/search', [RoleController::class,'search'])->name('roles.search');;
Route::get('roles', [RoleController::class,'index'])->name('roles.index');
Route::post('roles/posts', [RoleController::class,'store'])->name('roles.store');
Route::get('roles/create', [RoleController::class,'create'])->name('roles.create');
Route::get('roles/{id}', [RoleController::class,'edit'])->name('roles.edit');
Route::get('roles/show/{id}', [RoleController::class,'show'])->name('roles.show');
Route::put('roles/{id}/update', [RoleController::class,'update'])->name('roles.update');
Route::delete('roles/{id}', [RoleController::class,'destroy'])->name('roles.destroy');



Route::get('roles/{id}/permission/{idPermission}/detach', [PermissionRoleController::class,'detachPermissionRole'])->name('roles.permission.detach');
Route::post('roles/{id}/permissions',[PermissionRoleController::class,'attachPermissionsRole'])->name('roles.permissions.attach');
Route::any('roles/{id}/permissions/create', [PermissionRoleController::class,'permissionsAvailable'])->name('roles.permissions.available');
Route::get('roles/{id}/permissions', [PermissionRoleController::class,'permissions'])->name('roles.permissions');
Route::get('permissions/{id}/role', [PermissionRoleController::class,'roles'])->name('permissions.roles');
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
Route::get('profiles/{id}/permissions/{idPermission}/detach', [PermissionProfileController::class,'detachPermissionsProfile'])->name('profiles.permission.detach');;
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
Route::get('profiles/create', [ProfileController::class,'create'])->name('profiles.create')->middleware('can:profiles');
Route::any('profiles/search', [ProfileController::class,'search'])->name('profiles.search')->middleware('can:profiles');
Route::get('profiles/show/{id}', [ProfileController::class,'show'])->name('profiles.show')->middleware('can:profiles');
Route::get('profiles/edit/{id}', [ProfileController::class,'edit'])->name('profiles.edit')->middleware('can:profiles');
Route::delete('profiles/destroy/{id}', [ProfileController::class,'destroy'])->name('profiles.destroy')->middleware('can:profiles');
Route::post('profiles/', [ProfileController::class,'store'])->name('profile.store')->middleware('can:profiles');
Route::put('profiles/{id}', [ProfileController::class,'update'])->name('profile.update')->middleware('can:profiles');



/*
Plans  details
*/ 
Route::delete('plans/{url}/details/{idDetail}',[DetailPlanController::class,'destroy'])->name('details.plan.destroy');
Route::get('plans/{url}/details/create',[DetailPlanController::class,'create'])->name('details.plan.create');
Route::get('plans/{url}/details/{idDetail}/show',[DetailPlanController::class,'show'])->name('details.plan.show');
Route::put('plans/{url}/details/{idDetail}/update',[DetailPlanController::class,'update'])->name('details.plan.update');
Route::get('plans/{url}/details/{idDetail}/edit',[DetailPlanController::class,'edit'])->name('details.plan.edit');
Route::post('plans/{url}/details/store',[DetailPlanController::class,'store'])->name('details.plan.store');
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