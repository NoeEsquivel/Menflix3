<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class EncryptPasswords extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'encrypt:passwords';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Encripta las contraseñas existentes en la base de datos';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Obtener todos los usuarios
        $users = User::all();

        foreach ($users as $user) {
            // Verifica si la contraseña ya está encriptada o no
            if (!Hash::needsRehash($user->password)) {
                // Si la contraseña no está encriptada, se encripta
                $user->password = bcrypt($user->password);
                $user->save();
                $this->info("Contraseña encriptada para el usuario: {$user->email}");
            } else {
                $this->info("Contraseña ya está encriptada para el usuario: {$user->email}");
            }
        }

        return 0;
    }
}
