<?php

namespace Database\Factories\Products;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Products\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => ucfirst($this->faker->words(2, TRUE)),
            'category_id' => Category::inRandomOrder()->first()->id,
            'description'   => $this->faker->paragraph(),
            'price' => $this->faker->numberBetween(15,250),
            'image' => 'shop_example.jpg',
            'SKU' => $this->faker->ean13(),
            'is_active' => rand(0, 1),
            'productRating' => rand(1, 5),
            'productBrand' => ucfirst($this->faker->word(1))
        ];
    }
}
