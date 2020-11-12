<?php

namespace Database\Factories;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Traits\SlugHelper;
class TagFactory extends Factory {
	/**
	 * The name of the factory's corresponding model.
	 *
	 * @var string
	 */
	use SlugHelper;
	protected $model = Tag::class;

	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition() {
	    $name = $this->faker->name;
		return [
			'name' =>  $name,
			'slug' => $this->str_slug($name),
			'created_at' => now(),
			'updated_at' => now()
		];
	}
}
