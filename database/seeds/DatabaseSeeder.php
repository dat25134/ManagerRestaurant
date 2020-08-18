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
        $this->call(UserSeeder::class);
        $this->call(KhuvucSeeder::class);
        $this->call(BanSeeder::class);
        $this->call(BannerSeeder::class);
        $this->call(KhuyenmaiSeeder::class);
        $this->call(MonSeeder::class);
        $this->call(CtkhuyenmaiSeeder::class);

    }
}
