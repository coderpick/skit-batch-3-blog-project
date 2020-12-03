<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {

		DB::table('roles')->insert([
			'name' => 'Admin',
			'slug' => 'admin',
			'created_at' => now(),
			'updated_at' => now(),
		]);
		DB::table('roles')->insert([
			'name' => 'Author',
			'slug' => 'author',
			'created_at' => now(),
			'updated_at' => now(),
		]);
	}
}
