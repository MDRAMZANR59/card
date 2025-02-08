<?php

namespace Database\Seeders;

use App\Models\Version;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VersionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Version::insert(
           [
            [
                'name'=>'USA',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'name'=>'UAE',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'name'=>'CANADA',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'name'=>'BANGLADESH',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'name'=>'AUSTRALIA',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
           ]
        );
    }
}
