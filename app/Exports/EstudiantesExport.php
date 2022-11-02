<?php

namespace App\Exports;

use App\Models\Modulo_PerfildeUsuario\Estudiantes; 
use App\Models\Modulo_PerfildeUsuario\Grupos;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class EstudiantesExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function collection()
    {
        session()->put('anno', User::find(auth()->id())->anno);
        $anno  = session()->get('anno') ;
        if(User::find(auth()->id())->hasRole('Vicedecana')){
        return  $estudiantes = Estudiantes::join("users", "users.id", "=", "estudiantes.user_id")
        ->join("grupos", "grupos.id", "=", "estudiantes.grupos_id")
        ->select(
        'users.primer_nombre', 
        'users.segundo_nombre', 
        'users.primer_apellido', 
        'users.segundo_apellido',
        'users.anno',
        'grupos.name',
        'periodo_lectivo', 
        'tipo_curso',
        'plan_estudio',
        'organizacion_pe',
        'via_ingreso',
        'situacion_escolar',
        'situacion_militar',
        'cohorte_estudiantil',
        'centro_trabajo',
        'discapacidad',
        'tipo_estudiante',
        'direccion_completa',
        'nombre_madre',
        'organizacion_politica',
        'opcion_uci')
        ->orderBy('users.anno')
        ->get(
            
        );
       
    }else{
        return  $estudiantes = Estudiantes::join("users", "users.id", "=", "estudiantes.user_id")
        ->join("grupos", "grupos.id", "=", "estudiantes.grupos_id")
        ->select(
        'users.primer_nombre', 
        'users.segundo_nombre', 
        'users.primer_apellido', 
        'users.segundo_apellido',
        'users.anno',
        'grupos.name',
        'periodo_lectivo', 
        'tipo_curso',
        'plan_estudio',
        'organizacion_pe',
        'via_ingreso',
        'situacion_escolar',
        'situacion_militar',
        'cohorte_estudiantil',
        'centro_trabajo',
        'discapacidad',
        'tipo_estudiante',
        'direccion_completa',
        'nombre_madre',
        'organizacion_politica',
        'opcion_uci')
        ->where('users.anno','=', $anno)
        ->get();
    
    }

       
    }

    public function headings():array{
        return[
            'Primer nombre', 
            'Segundo nombre', 
            'Primer apellido', 
            'Segundo apellido',
            'Año Académico',
            'Grupos',
            'Periodo lectivo',
            'Tipo de curso',
            'Versión plan de estudio',
            'Organizacion de P.E',
            'Via de ingreso',
            'Situación escolar',
            'Situacion militar',
            'Cohorte estudiantil',
            'Centro de trabajo',
            'Discapacidad',
            'Tipo de estudiante',
            'Direccion completa',
            'Nombre de la madre o tutora',
            'Organizacion politica',
            'Valor opción',

        ];
    }


}
