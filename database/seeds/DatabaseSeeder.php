<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);

        DB::table('users')->insert([
            'name' => 'Admin2',
            'email' => 'admin2',
            'password' => bcrypt('Ant201200'),
            'ma_nv' => 'admin',
            'role_id' => 1,
        ]);
    }
}
