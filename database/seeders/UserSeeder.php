<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       User::create([
           'primer_nombre' => 'Admin',
           'segundo_nombre' => 'Adminn',
           'primer_apellido' => 'Adminnn',
           'segundo_apellido' => 'Adminnnn',
           'ci' => '98110206980',
           'tipo_de_usuario' => 'Profesor',
           'password' => bcrypt('password'),
           'email' => 'adminjpq@admin.com',
           'username' => 'adminjpq',
           'sexo' => 'Masculino',
           'anno'=>NULL,
           'municipio' => 'Matanzas',
           'provincia' => 'Habana',
           'color_piel' => 'Blanco',
           'telefono_casa' => '',
           'telefono_uci' => '',
           'telefono_uci' => '',
           'telefono_uci' => 'E12334',
       ])->assignRole('Administrador');
    }
}