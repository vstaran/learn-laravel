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
        DB::table('task_labels')->insert(
            [
                [
                    'name' => 'bug',
                    'description' => 'This is description bug',
                    'color' => '#e41813',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'feature',
                    'description' => 'This is description feature',
                    'color' => '#009a00',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'urgent',
                    'description' => 'This is description urgent',
                    'color' => '#157ae8',
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            ]
        );
    }
}
