<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run() {
		// \App\Models\User::factory(10)->create();
		$this->call(UserTableSeeder::class);
		$this->call(RoleTableSeeder::class);
        Tag::factory(20)->create();
        Category::factory(20)->create();
        Post::factory(50)->create();
	}
}
