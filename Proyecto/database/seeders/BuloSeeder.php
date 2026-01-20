<?php

namespace Database\Seeders;

<<<<<<< HEAD
use App\Models\Bulo;
use App\Models\User;
=======
use App\Models\User;
use App\Models\Bulo;
>>>>>>> d588ac2a64f0cd160723851e0b964a89c97f87a4
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
<<<<<<< HEAD
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
=======
        $users = User::count() < 3
            ? collect([
                User::create([
                    'name' => 'Sofía López',
                    'email' => 'sofia@example.com',
                    'password' => bcrypt('password123'),
                ]),
                User::create([
                    'name' => 'Miguel Fernández',
                    'email' => 'miguel@example.com',
                    'password' => bcrypt('12345678'),
                ]),
                User::create([
                    'name' => 'Laura Martínez',
                    'email' => 'laura@example.com',
                    'password' => bcrypt('larau123'),
                ]),
            ])
            : User::take(3)->get();

        $bulos = [
            [
                'texto' => 'Las mujeres son peores conductoras que los hombres',
                'texto_desmentido' => 'Los datos de la DGT desmontan el mito: los hombres protagonizan el 80% de los accidentes mortales y el 90% de las infracciones por alcohol y drogas. Aunque las mujeres tienen accidentes leves en ciudad, su conducción es mucho más segura, responsable y menos costosa para las aseguradoras.',
            ],
            [
                'texto' => 'Las mujeres no trabajan tanto como los hombres',
                'texto_desmentido' => 'Las mujeres han alcanzado en 2025 máximos históricos de ocupación, liderando sectores clave como la medicina, la biotecnología y la educación. Además, ocupan casi el 40% de los puestos directivos en España, demostrando que son el motor principal del crecimiento económico y la innovación científica actual.',
            ],
            [
                'texto' => 'El feminismo es una exageración',
                'texto_desmentido' => 'La igualdad de género no es un capricho, sino un derecho fundamental que reconoce la dignidad y autonomía de la mujer. Minimizar sus experiencias o burlarse de ellas perpetúa injusticias y estereotipos dañinos. Empoderar a las mujeres significa respetar su voz, apoyar sus decisiones y valorar su contribución en todos los ámbitos de la vida.',
            ],
        ];

        foreach ($bulos as $bulo) {
            $users->random()->bulos()->create([
                'texto' => $bulo['texto'],
                'texto_desmentido' => $bulo['texto_desmentido'],
            ]);
        }
>>>>>>> d588ac2a64f0cd160723851e0b964a89c97f87a4
    }
}
