<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banners')->insert([
            ['imageURL' => 'images/banner/banner1.jpg'],
            ['imageURL' => 'images/banner/banner2.jpg'],
            ['imageURL' => 'images/banner/banner3.jpg'],

        ]);
    }
}
