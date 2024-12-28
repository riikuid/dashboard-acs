<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Carbon\Carbon;

class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $data = [];

        for ($i = 0; $i < 100; $i++) {
            $beginTime = $faker->dateTimeBetween('-30 days', 'now');
            $endTime = $faker->dateTimeBetween('now', '+30 days');

            $data[] = [
                'name' => $faker->name,
                'user_type' => $faker->randomElement(['normal', 'visitor', 'maintenance']),
                'begin_time' => $beginTime,
                'end_time' => $endTime,
                'user_verify_mode' => null,
                'note' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('people')->insert($data);
    }
}
