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
        DB::table('task_status')->insert(
            [
                'name' => 'to do',
                'created_at' => now(),
                'updated_at' => now()
            ]
        );

        DB::table('task_status')->insert(
            [
                'name' => 'in progres',
                'created_at' => now(),
                'updated_at' => now()
            ]
        );

        DB::table('task_status')->insert(
            [
                'name' => 'done',
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
    }
}
