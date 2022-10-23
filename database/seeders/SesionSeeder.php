<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SesionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('secciones')->insert([
            'nombre' => 'Mañana',
        ]);
        DB::table('secciones')->insert([
            'nombre' => 'Tarde',
        ]);
    }
}
