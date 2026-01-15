<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemeSeeder extends Seeder
{
    public function run()
    {
        DB::table('memes')->insert([
            [
                'titulo' => 'Primer meme',
                'url' => 'https://ejemplo.com/meme1.jpg',
            ],
            [
                'titulo' => 'Segundo meme',
                'url' => 'https://ejemplo.com/meme2.jpg',
            ],
        ]);
    }
}
