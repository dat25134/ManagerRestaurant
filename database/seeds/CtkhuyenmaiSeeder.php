<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CtkhuyenmaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ctkhuyenmais')->insert([
            [
                'id_khuyenmais' => '1',
                'id_mons' => '1',
            ],
            [
                'id_khuyenmais' => '2',
                'id_mons' => '2',
            ],
            [
                'id_khuyenmais' => '3',
                'id_mons' => '3',
            ],
            [
                'id_khuyenmais' => '1',
                'id_mons' => '4',
            ],
            [
                'id_khuyenmais' => '2',
                'id_mons' => '5',
            ],
        ]);
    }
}
