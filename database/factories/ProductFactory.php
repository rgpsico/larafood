<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Tenant;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tenant_id' => $this->factory(Tenant::class),
            'title' => $this->faker->unique()->name,
            'description' => $this->faker->setence,
            'image' => 'pizza.png',
            'price' => 12.9
        ];
    }
}
