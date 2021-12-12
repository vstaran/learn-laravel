<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Faker\Factory as Faker;

class UserSeeder extends Seeder
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

        // use foreach for create user
        foreach (range(1, 10) as $item) {
            DB::table('users')->insert([
               'name' => $faker->name(),
               'email' => $faker->unique()->safeEmail(),
               'password' => Hash::make('password'),
               'created_at' => now(),
               'updated_at' => now()
           ]);
        }

        // php artisan db:seed
        // php artisan migrate:fresh --seed
    }
}
