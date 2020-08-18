<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'TRAN LE VIET DAT',
                'email' => 'tlvdat.bkdn@gmail.com',
                'password' => '$2y$10$IgTtaJYOYGdckZPKUC8uw.BLrFhNJKLLHqyg3bQ3N7w6xWnch4OHe',
                'role' => 1,
                'image64' => 'images/no-avatar.png',
            ],
        ]);
    }
}
