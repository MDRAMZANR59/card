<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Card::create(
            [
                `platform_id`=>1 `title`, `usage`, `deliveryTime`, `qty`, `image`,
            ]
        )
    }
}
