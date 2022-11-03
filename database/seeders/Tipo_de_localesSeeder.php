<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tipo_de_localesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_de_locales')->insert([
            'tipo' => 'Salon',
        ]);
        DB::table('tipo_de_locales')->insert([
            'tipo' => 'Aula',
        ]);
        DB::table('tipo_de_locales')->insert([
            'tipo' => 'Laboratorio',
        ]);
        DB::table('tipo_de_locales')->insert([
            'tipo' => 'Deporte',
        ]);
    }
}
