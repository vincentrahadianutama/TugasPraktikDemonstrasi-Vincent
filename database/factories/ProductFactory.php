<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    // Tentukan model yang terkait dengan factory ini
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'price' => $this->faker->numberBetween(10000, 100000),
            'stok_quantity' => $this->faker->numberBetween(1, 100),
            'image1_url' => $this->faker->imageUrl(),
            'product_category_id' => 1, // Sesuaikan dengan ID kategori yang ada
        ];
    }
}
