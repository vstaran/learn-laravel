<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskCommentSeeder extends Seeder
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
        $count_tasks = DB::table('tasks')->count();

        foreach (range(1, 100) as $item) {
            DB::table('task_comments')->insert(
                [
                    'user_id' =>  rand(1, $count_users),
                    'comment' => $faker->text(500),
                    'task_id' => rand(1, $count_tasks),
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            );
        }
    }
}
