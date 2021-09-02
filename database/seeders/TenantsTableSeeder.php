<?php

namespace Database\Seeders;

use App\Models\Plan;
use App\Models\Tenant;
use Illuminate\Database\Seeder;

class TenantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plan = Plan::first();

       $plan->tenants()->create([
           'cnpj'=>'238890909332323',
           'name' => 'EspecializaTi',
           'url' => 'especializati',
           'email' => 'carlos@especialti.com.br',
           'logo'=>'logo.png'
       ]);
    }
}
