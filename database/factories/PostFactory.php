<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use App\Traits\SlugHelper;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    use SlugHelper;
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence;
        return [
            'user_id' =>function(){
             return User::all()->random();
            },
            'title' =>$title,
            'slug'  =>Str::slug($title),
            'body' =>$this->faker->paragraph,
            'image' =>$this->faker->imageUrl($width = 900, $height = 480,'technics'),
            'status'=>$this->faker->numberBetween($min = 0, $max = 1),
            'is_approved'=>$this->faker->numberBetween($min = 0, $max = 1),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
