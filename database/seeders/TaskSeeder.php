<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * @see https://github.com/fzaninotto/Faker
         */
        $faker = Faker::create();

        $count_users = DB::table('users')->count();
        $count_groups = DB::table('task_groups')->count();
        $count_labels = DB::table('task_labels')->count();
        $count_statuses = DB::table('task_statuses')->count();

        foreach (range(1, 10) as $item) {

            $task_id = DB::table('tasks')->insertGetId(
                [
                    'name' => $faker->jobTitle(),
                    'description' => $faker->text(500),
                    'task_group_id' => rand(1, $count_groups),
                    'creator_user_id' => rand(1, $count_users),
                    'assigned_user_id' => rand(1, $count_users),
                    'priority' => rand(1, 5),
                    'task_status_id' => rand(1, $count_statuses),
                    //'parent_task_id' => null,
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            );

            foreach (range(1, rand(1, 5)) as $item) {
                DB::table('task_label')->insert(
                    [
                        'task_label_id' => rand(1, $count_labels),
                        'task_id' => $task_id
                    ]
                );
            }

        }


        // Add sub Tasks
        foreach (range(1, 5) as $item) {
            DB::table('tasks')->insert(
                [
                    'name' => $faker->jobTitle(),
                    'description' => $faker->text(500),
                    'task_group_id' => rand(1, $count_groups),
                    'creator_user_id' => rand(1, $count_users),
                    'assigned_user_id' => rand(1, $count_users),
                    'priority' => rand(1, 5),
                    'task_status_id' => rand(1, $count_statuses),
                    'parent_task_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            );
        }



    }
}
