<?php

namespace Database\Factories;

use App\Models\Plan;
use App\Models\Tenant;
use Illuminate\Database\Eloquent\Factories\Factory;

class TenantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    
    protected $model = Tenant::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {
        return [
            'plan_id' => $this->factory(Plan::class),
            'cnpj' => uniqid() . date('YmdHis'),
            'name' => $this->faker->unique(),
            'email'=> $this->faker->unique()->safeEmail()
        ];
    }
}