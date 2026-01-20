<?php

namespace Database\Seeders;

use App\Models\Bulo;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first() ?? User::factory()->create();

        Bulo::create([
            'texto_bulo' => 'Las mujeres cobran menos porque trabajan menos horas.',
            'texto_desmentido' => 'La brecha salarial existe incluso cuando se compara trabajos a tiempo completo con las mismas responsabilidades.',
            'user_id' => $user->id,
        ]);

        Bulo::create([
            'texto_bulo' => 'El feminismo es odio hacia los hombres.',
            'texto_desmentido' => 'El feminismo busca la igualdad de género, no el odio.',
            'user_id' => $user->id,
        ]);

        Bulo::create([
            'texto_bulo' => 'Las mujeres no son buenas en matemáticas.',
            'texto_desmentido' => 'No hay diferencias innatas en las habilidades matemáticas entre géneros.',
            'user_id' => $user->id,
        ]);

        Bulo::create([
            'texto_bulo' => 'El acoso callejero es un cumplido.',
            'texto_desmentido' => 'El acoso callejero es una forma de violencia de género.',
            'user_id' => $user->id,
        ]);
    }
}
