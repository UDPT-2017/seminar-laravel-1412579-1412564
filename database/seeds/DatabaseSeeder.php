<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
			array('username' => 'admin', 'password'=>Hash::make(1), 'level' => '1'),
			]);
    }
}
