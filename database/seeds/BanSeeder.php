<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bans')->insert([
            [
                'ma_ban' => '1',
                'tenban' => 'A1',
                'soghe' => '2',
                'created_at' => '2020-08-11 23:37:48',
                'updated_at' => '2020-08-11 23:37:48',
                'id_khuvucs'=> '1',
            ],
            [
                'ma_ban' => '2',
                'tenban' => 'A2',
                'soghe' => '4',
                'created_at' => '2020-08-11 23:37:48',
                'updated_at' => '2020-08-11 23:37:48',
                'id_khuvucs'=> '1',
            ],
            [
                'ma_ban' => '3',
                'tenban' => 'A3',
                'soghe' => '8',
                'created_at' => '2020-08-11 23:37:48',
                'updated_at' => '2020-08-11 23:37:48',
                'id_khuvucs'=> '1',
            ],
            [
                'ma_ban' => '4',
                'tenban' => 'B3',
                'soghe' => '8',
                'created_at' => '2020-08-11 23:37:48',
                'updated_at' => '2020-08-11 23:37:48',
                'id_khuvucs'=> '2',
            ],
            [
                'ma_ban' => '5',
                'tenban' => 'C5',
                'soghe' => '8',
                'created_at' => '2020-08-11 23:37:48',
                'updated_at' => '2020-08-11 23:37:48',
                'id_khuvucs'=> '3',
            ],
        ]);
    }
}
