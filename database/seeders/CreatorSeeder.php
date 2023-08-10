<?php

namespace Database\Seeders;

use App\Models\Creator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class CreatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();
        for($i = 0; $i < 10; $i++){
            // DB::table('creator')->inset([
            //     'name' => $faker->name,
            //     'role' => $faker->jobTitle,
            // ]);
            Creator::updateOrCreate(['name' => $faker->name, 'role' => $faker->jobTitle]);
        }
    }
}
