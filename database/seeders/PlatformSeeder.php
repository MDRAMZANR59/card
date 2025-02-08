<?php

namespace Database\Seeders;

use App\Models\Platform;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Platform::insert(
           [
            [
                'name'=>'Roblox',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'name'=>'Google Play',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'name'=>'Streem',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'name'=>'Apple',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'name'=>'Game',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
           ]
        );
    }
}
