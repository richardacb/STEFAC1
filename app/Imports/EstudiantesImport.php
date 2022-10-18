<?php

namespace App\Imports;

use App\Models\Modulo_PerfildeUsuario\Estudiantes;
use App\Models\Modulo_PerfildeUsuario\Grupos;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

class EstudiantesImport implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading
{
    
    private $grupos;

    public function __construct()
    {
        $this->grupos = Grupos::pluck('id','name');
        HeadingRowFormatter::default('none');
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    
    public function model(array $row)
    {
        
        return new Estudiantes([
            'grupos_id' => $this->grupos[$row['Grupo']],
            'first_name' => $row['Primer nombre'],
            'second_name' => $row['Segundo nombre'],
            'first_username' => $row['Primer apellido'],
            'second_username' => $row['Segundo apellido'],
            'carnet' => $row['Carné identidad'],
            'academic_year' => $row['Año académico'],
            'periodo_lectivo'=> $row['Período lectivo'],
            'tipo_curso'=> $row['Tipo de curso'],
            'plan_estudio'=> $row['Versión plan de estudio'],
            'organizacion_pe'=> $row['Organizacion de P.E.'],
            'via_ingreso'=> $row['Vía de ingreso(abreviatura)'],
            'sexo'=> $row['Sexo'],
            'situacion_escolar'=> $row['Situación escolar'],
            'municipio'=> $row['Municipio'],
            'provincia'=> $row['Provincia'],
            'situacion_militar'=> $row['Situación Militar'],
            'cohorte_estudiantil'=> $row['Cohorte estudiantil'],
            'centro_trabajo'=> $row['Centro de trabajo'],
            'discapacidad'=> $row['Discapacidad'],
            'tipo_estudiante'=> $row['Tipo estudiante'],
            'usuario'=> $row['Usuario'],
            'direccion_completa'=> $row['Direccion completa'],
            'nombre_madre'=> $row['Nombre de la madre o tutora'],
            'organizacion_politica'=> $row['Organización política'],
            'color_piel'=> $row['Color de piel'],
            'telefono'=> $row['Teléfono'],
            'telefono_uci'=> $row['Teléfono - UCI'],
            'celular'=> $row['Celular'],
            'solapin'=> $row['Solapín'],
            'opcion_uci'=> $row['Valor opción'],
        ]);
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
