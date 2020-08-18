<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mons')->insert([
            [
                'tenmon' => 'Salad trộn dầu giấm',
                'tentienganh' => 'Salad mixed with vinegar',
                'imageURL' => 'images/mons/salad-dg.jpg',
                'gia' => '50000',
                'nhommons' => 'Khai vị',
                'donvitinhs' => 'đĩa',
            ],
            [
                'tenmon' => 'Salad trộn 3 màu',
                'tentienganh' => 'Salad with 3 colors',
                'imageURL' => 'images/mons/salad-3m.jpg',
                'gia' => '45000',
                'nhommons' => 'Khai vị',
                'donvitinhs' => 'đĩa',
            ],
            [
                'tenmon' => 'Salad trộn trứng',
                'tentienganh' => 'Salad with eggs',
                'imageURL' => 'images/mons/salad-egg.jpg',
                'gia' => '40000',
                'nhommons' => 'Khai vị',
                'donvitinhs' => 'đĩa',
            ],
            [
                'tenmon' => 'Rau mầm trộn cá hộp',
                'tentienganh' => 'Canned fish sprouts',
                'imageURL' => 'images/mons/rau-ca.jpg',
                'gia' => '89000',
                'nhommons' => 'Khai vị',
                'donvitinhs' => 'đĩa',
            ],
            [
                'tenmon' => 'Rau sống Đà Lạt',
                'tentienganh' => 'Vegetables Da Lat',
                'imageURL' => 'images/mons/rau-dl.jpg',
                'gia' => '60000',
                'nhommons' => 'Khai vị',
                'donvitinhs' => 'đĩa',
            ],
            [
                'tenmon' => 'Xà lách xoong trộn bò',
                'tentienganh' => 'Salad Xoong  beef mix',
                'imageURL' => 'images/mons/salad-meat.jpg',
                'gia' => '50000',
                'nhommons' => 'Khai vị',
                'donvitinhs' => 'đĩa',
            ],
            [
                'tenmon' => 'Tôm Hùm nướng phô mai',
                'tentienganh' => 'Grilled Lobster with cheese',
                'imageURL' => 'images/mons/tom-cheese.jpg',
                'gia' => '300000',
                'nhommons' => 'Nướng',
                'donvitinhs' => 'kg',
            ],
            [
                'tenmon' => 'Mực nướng sa tế',
                'tentienganh' => 'Grilled squid satay',
                'imageURL' => 'images/mons/muc-sate.jpg',
                'gia' => '200000',
                'nhommons' => 'Nướng',
                'donvitinhs' => 'kg',
            ],
            [
                'tenmon' => 'Bò cuộn nấm kim chi nướng',
                'tentienganh' => 'Beef roll with kimchi mushroom',
                'imageURL' => 'images/mons/bo-kimchi.jpg',
                'gia' => '170000',
                'nhommons' => 'Nướng',
                'donvitinhs' => 'phần',
            ],
            [
                'tenmon' => 'Cá nướng giấy bạc',
                'tentienganh' => 'Grilled fish foil',
                'imageURL' => 'images/mons/ca-giaybac.jpg',
                'gia' => '120000',
                'nhommons' => 'Nướng',
                'donvitinhs' => 'kg',
            ],
            [
                'tenmon' => 'Sườn dê nướng tảng',
                'tentienganh' => 'Grilled goat ribs',
                'imageURL' => 'images/mons/suon-de.jpg',
                'gia' => '170000',
                'nhommons' => 'Nướng',
                'donvitinhs' => 'kg',
            ],
            [
                'tenmon' => 'Sườn heo BBQ',
                'tentienganh' => 'BBQ pork ribs',
                'imageURL' => 'images/mons/suon-heo.jpg',
                'gia' => '200000',
                'nhommons' => 'Nướng',
                'donvitinhs' => 'kg',
            ],
            [
                'tenmon' => 'Lẩu thái chua cay',
                'tentienganh' => 'Hot and sour hotpot',
                'imageURL' => 'images/mons/lau-thai.jpg',
                'gia' => '200000',
                'nhommons' => 'Lẩu',
                'donvitinhs' => 'phần',
            ],
            [
                'tenmon' => 'Lẩu ếch măng chua',
                'tentienganh' => 'Frog sour hotpot',
                'imageURL' => 'images/mons/lau-ech.jpg',
                'gia' => '170000',
                'nhommons' => 'Lẩu',
                'donvitinhs' => 'phần',
            ],
            [
                'tenmon' => 'Lẩu hải sản',
                'tentienganh' => 'Seafood hotpot',
                'imageURL' => 'images/mons/lau-haisan.jpg',
                'gia' => '220000',
                'nhommons' => 'Lẩu',
                'donvitinhs' => 'phần',
            ],
            [
                'tenmon' => 'Gỏi ngó sen tôm thịt',
                'tentienganh' => 'Salad with lotus, shrimp and meat',
                'imageURL' => 'images/mons/goi-tom.jpg',
                'gia' => '120000',
                'nhommons' => 'Gỏi',
                'donvitinhs' => 'đĩa',
            ],
            [
                'tenmon' => 'Nộm xoài hải sản',
                'tentienganh' => 'Seafood mango salad',
                'imageURL' => 'images/mons/goi-xoai.jpg',
                'gia' => '140000',
                'nhommons' => 'Gỏi',
                'donvitinhs' => 'đĩa',
            ],
            [
                'tenmon' => 'Gỏi ổi tai heo',
                'tentienganh' => 'Guava pork ear salad',
                'imageURL' => 'images/mons/goi-taiheo.jpg',
                'gia' => '90000',
                'nhommons' => 'Gỏi',
                'donvitinhs' => 'đĩa',
            ],
            [
                'tenmon' => 'Gỏi bò kim chi',
                'tentienganh' => 'Kimchi beef salad',
                'imageURL' => 'images/mons/goi-bo.jpg',
                'gia' => '140000',
                'nhommons' => 'Gỏi',
                'donvitinhs' => 'đĩa',
            ],
            [
                'tenmon' => 'Gỏi mực',
                'tentienganh' => 'Squid salad',
                'imageURL' => 'images/mons/goi-muc.jpg',
                'gia' => '80000',
                'nhommons' => 'Gỏi',
                'donvitinhs' => 'đĩa',
            ],
            [
                'tenmon' => 'Mực xào chua ngọt',
                'tentienganh' => 'Fried sweet and sour',
                'imageURL' => 'images/mons/muc-xao.jpg',
                'gia' => '120000',
                'nhommons' => 'Xào',
                'donvitinhs' => 'đĩa',
            ],
            [
                'tenmon' => 'Thịt heo xào lá móc mật',
                'tentienganh' => 'Stir-fried pork with honey leaves',
                'imageURL' => 'images/mons/heo-xao.jpg',
                'gia' => '170000',
                'nhommons' => 'Xào',
                'donvitinhs' => 'đĩa',
            ],
        ]);
    }
}
