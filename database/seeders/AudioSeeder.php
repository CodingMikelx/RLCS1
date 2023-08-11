<?php

namespace Database\Seeders;

use App\Models\Audio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File; //import the File facade
use Illuminate\Support\Facades\DB; // Import the DB facade

class AudioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $audioDir = 'app\public\MonkeyResource\audios';
        $audios = File::files(storage_path($audioDir));
        foreach ($audios as $audio) {
            $audioName = pathinfo($audio, PATHINFO_FILENAME);
            DB::table('audio')->insert([
                'name' => $audioName,
                'audioDirectory' => $audioDir . '\\' . $audioName,
            ]);
        }
    }
}
