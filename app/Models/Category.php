<?php

namespace App\Models;

use App\Tenant\Observers\TenantObserver;

use Illuminate\Database\Eloquent\Model;
use App\Tenant\Traits\TenantTrait;


class Category extends Model
{
    use TenantTrait;
 protected $fillable = ['name','url','description'];

 public function products()
 {
     return $this->belongsToMany(Product::class);
 }

 
}
