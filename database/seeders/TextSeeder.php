<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Text;
use Faker\Factory as Faker;

class TextSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();
        Text::unguard();
        for ($i=0; $i < 10; $i++) { 
            
        }
        Text::reguard();
    }
}
