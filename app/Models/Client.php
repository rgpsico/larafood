<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User  as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Client extends  Authenticatable
{
    use  HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    public function evalutions()
    {
        return $this->hasMany(Evaluation::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
