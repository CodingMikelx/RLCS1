<?php

namespace Database\Seeders;

use App\Models\Images;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File; //import the File facade
use Illuminate\Support\Facades\DB; // Import the DB facade
use Illuminate\Support\Facades\Schema; 

class ImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $imagesDirectory = 'app\public\MonkeyResource\images';
        $files = File::files(storage_path($imagesDirectory));
        // Images::unguard();
        Schema::disableForeignKeyConstraints();
        foreach ($files as $file) {
            $filename = pathinfo($file, PATHINFO_FILENAME);

            DB::table('images')->insert([
                'name' => $filename,
                'text_id' => '1',
                'type' => 'single',
                'imageDirectory' => $imagesDirectory . '\\' . $filename,
            ]);
        }
        // Images::reguard();
        Schema::enableForeignKeyConstraints();
    }
}
