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
        DB::table('homepages')->insert([
			array('headline' => 'NEW ARRIVALS', 'content'=> 'REVIVE YOUR WARDROBE WITH CHIC KNITS'),
            array('headline' => 'TUXEDO', 'content' => 'REVIVE YOUR WARDROBE WITH CHIC KNITS'),
            array('headline' => 'SWEATER', 'content'=> 'REVIVE YOUR WARDROBE WITH CHIC KNITS'),
            array('headline' => 'Trekking Shoes', 'content'=> ''),
            array('headline' => 'Casuall Glasses', 'content'=> ''),
            array('headline' => 'Fresh Look T-Shirt', 'content'=> ''),
            array('headline' => 'Elegant Watches', 'content'=> ''),
			]);
    }
}
