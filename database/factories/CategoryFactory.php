<?php

namespace Database\Factories;

use App\Models\Category;
use App\Traits\SlugHelper;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    use SlugHelper;
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->name;
		return [
			'name' =>  $name,
			'slug' => $this->str_slug($name),
			'created_at' => now(),
			'updated_at' => now()
		];
    }
}
