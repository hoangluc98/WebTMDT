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
        // $this->call(UsersTableSeeder::class);
        \DB::table('admins')->insert([
        	'name' => 'HoangLuc',
        	'email' => 'luclego98@gmail.com',
        	'password' => bcrypt('12345678')
        ]);
    }
}
