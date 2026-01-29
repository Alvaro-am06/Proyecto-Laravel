<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateTestUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-test-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crear usuario de prueba para login';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user = \App\Models\User::firstOrCreate(
            ['email' => 'alvaro@example.com'],
            [
                'name' => 'Alvaro',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
            ]
        );

        $this->info('Usuario creado/verificado: ' . $user->email);
        $this->info('Contraseña: password');
        $this->info('Email verificado: ' . ($user->email_verified_at ? 'SI' : 'NO'));
        $this->info('Hash de contraseña: ' . $user->password);
    }
}
