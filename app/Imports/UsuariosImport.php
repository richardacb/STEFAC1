<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class UsuariosImport implements ToCollection, WithHeadingRow, WithBatchInserts, WithChunkReading
{
    public function __construct()
    {
        HeadingRowFormatter::default('none');
    }
   
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
       
       User::create([
            'anno' => $row['Año académico'],
            'primer_nombre' => $row['Primer nombre'],
            'segundo_nombre' => $row['Segundo nombre'] == NULL ? " ": $row['Segundo nombre'],
            'primer_apellido' => $row['Primer apellido'],
            'segundo_apellido' => $row['Segundo apellido'],
            'ci' => $row['Carné identidad'],
            'tipo_de_usuario'=> $row['Tipo de usuario'],
            'username'=> $row['Usuario'],
            'password'=> bcrypt($row['Contraseña']),
            'email'=> $row['Correo electrónico'],
            'sexo'=> $row['Sexo'],
            'municipio'=> $row['Municipio'],
            'provincia'=> $row['Provincia'],
            'color_piel'=> $row['Color de piel'],
            'telefono_casa'=> $row['Teléfono - Casa'],
            'telefono_uci'=> $row['Teléfono - UCI'],
            'celular'=> $row['Celular'],
            'solapin'=> $row['Solapín'],
        ])->assignRole('Usuario');
        
        }

        
    }
    public function batchSize(): int
    {
        return 1000;
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
