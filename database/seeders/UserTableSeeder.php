<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UserTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table( 'users' )->insert( [
            'role_id'           => 1,
            'name'              => 'Mr. Admin',
            'email'             => 'admin@blog.com',
            'email_verified_at' => now(),
            'password'          => bcrypt( 'password' ),
            'created_at'        => now(),
            'updated_at'        => now(),
        ] );
        DB::table( 'users' )->insert( [
            'role_id'           => 2,
            'name'              => 'Mr. Author',
            'email'             => 'author@blog.com',
            'email_verified_at' => now(),
            'password'          => bcrypt( 'password' ),
            'created_at'        => now(),
            'updated_at'        => now(),
        ] );
    }
}
