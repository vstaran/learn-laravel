<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('task_statuses')->insert(
            [
                [
                    'name' => 'to do',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'in progres',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'done',
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            ]
        );
    }
}
