<?php

namespace Database\Seeders;

use App\Models\Amount;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AmountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Amount::insert(
            [
                [
                    'title'=>'1',
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ],
                [
                    'title'=>'2',
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ],
                [
                    'title'=>'3',
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ],
                [
                    'title'=>'4',
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ],
                [
                    'title'=>'5',
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ],
            ]
        );
    }
}
