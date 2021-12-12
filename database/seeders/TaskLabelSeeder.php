<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskLabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('task_label')->insert(
            [
                [
                    'name' => 'bug',
                    'description' => 'This is description bug',
                    'color' => '#00FF00',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'feature',
                    'description' => 'This is description feature',
                    'color' => '#0000FF',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'urgent',
                    'description' => 'This is description urgent',
                    'color' => '#FFFF00',
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            ]
        );
    }
}
