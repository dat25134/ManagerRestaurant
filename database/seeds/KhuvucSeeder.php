<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KhuvucSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('khuvucs')->insert([
            ['Tenkhuvuc' => 'A'],
            ['Tenkhuvuc' => 'B'],
            ['Tenkhuvuc' => 'C'],
        ]);
    }
}
