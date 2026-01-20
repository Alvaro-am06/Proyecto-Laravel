<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::updateOrCreate([
            'email' => 'alvaro@example.com'
        ], [
            'name' => 'alvaro',
            'password' => Hash::make('1234'),
        ]);

        // \App\Models\Meme::create([
        //     'user_id' => $user->id,
        //     'meme_text' => 'Las mujeres ganan menos porque eligen carreras peor pagadas.',
        //     'fact' => 'En realidad, las mujeres ganan menos incluso en las mismas carreras debido a discriminación salarial.',
        // ]);

        // \App\Models\Meme::create([
        //     'user_id' => $user->id,
        //     'meme_text' => 'El 8-M es solo un día para que las mujeres falten al trabajo.',
        //     'fact' => 'El 8-M conmemora la lucha por derechos laborales y contra la violencia de género.',
        // ]);

        // \App\Models\Meme::create([
        //     'user_id' => $user->id,
        //     'meme_text' => 'Las mujeres no necesitan feminismo porque ya tienen igualdad.',
        //     'fact' => 'Las mujeres aún enfrentan brechas salariales, violencia de género y subrepresentación en posiciones de poder.',
        // ]);

        $this->call(BuloSeeder::class);
    }
}
