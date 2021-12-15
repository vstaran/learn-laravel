<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('task_groups')->insert(
            [
                [
                    'name' => 'My',
                    'color' => '#00FF00',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Family',
                    'color' => '#FF1155',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Shopping',
                    'color' => '#FF00FF',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Work',
                    'color' => '#FFFF00',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Hobbies',
                    'color' => '#FF0080',
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            ]
        );
    }
}
