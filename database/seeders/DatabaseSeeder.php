<?php

namespace Database\Seeders;

use App\Models\TaskComment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call([
            UserSeeder::class,
            TaskStatusSeeder::class,
            TaskLabelSeeder::class,
            TaskGroupSeeder::class,
            TaskSeeder::class,
            TaskCommentSeeder::class
        ]);

    }
}
