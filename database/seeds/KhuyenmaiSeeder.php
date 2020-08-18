<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KhuyenmaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('khuyenmais')->insert([
            [
                'tenKM' => 'Combo các món mực',
                'phantramKM' => '15',
                'tungay' => '2020-08-12',
                'denngay' => '2020-08-14',
                'imageURL' => 'images/khuyenmai/combo-muc.jpg',
            ],
            [
                'tenKM' => 'Combo các món Bò',
                'phantramKM' => '20',
                'tungay' => '2020-08-12',
                'denngay' => '2020-08-14',
                'imageURL' => 'images/khuyenmai/combo-bo.jpg',
            ],
            [
                'tenKM' => 'Combo các món heo',
                'phantramKM' => '20',
                'tungay' => '2020-08-12',
                'denngay' => '2020-08-14',
                'imageURL' => 'images/khuyenmai/combo-heo.jpg',
            ],
        ]);
    }
}
