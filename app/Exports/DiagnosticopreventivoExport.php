<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Modulo_PerfildeUsuario\Diagnosticopreventivo; 
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DiagnosticopreventivoExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        session()->put('anno', User::find(auth()->id())->anno);
        $anno  = session()->get('anno') ;
        if(User::find(auth()->id())->hasRole('Vicedecana')){
        return  $diagnosticopreventivo = Diagnosticopreventivo::join("users", "users.id", "=", "diagnosticopreventivo.user_id")
        ->join("estudiantes", "users.id", "=", "estudiantes.user_id")
        ->join("grupos", "grupos.id", "=", "estudiantes.grupos_id")
        ->select(
        'users.primer_nombre', 
        'users.segundo_nombre', 
        'users.primer_apellido', 
        'users.segundo_apellido',
        'users.anno',
        'grupos.name',
        'nacionalidad',
        'adicciones_Alcohol',
        'adicciones_Tabaco',
        'adicciones_Café',
        'adicciones_Tecnoadicciones',
        'adicciones_Drogas',
        'tipo_medicamentos',
        'tipo_medicamentos_consumo',
        'grupo_social',
        'creencia_religiosa',
        'prob_de_personalidad',
        'desc_prob_de_personalidad',
        'prob_de_psiquiatricos',
        'desc_prob_de_psiquiatricos',
        'prob_de_economicos',
        'desc_prob_de_economicos',
        'prob_de_sociales',
        'desc_prob_de_sociales',
        'prob_de_familiares',
        'desc_prob_de_familiares',
        'prob_de_academicos',
        'desc_prob_de_academicos',
        'prob_de_disciplina',
        'desc_prob_de_disciplina',
        'prob_de_asistencia',
        'desc_prob_de_asistencia'
       )
        ->orderBy('users.anno')
        ->get();
       
    }else{
        return  $diagnosticopreventivo = Diagnosticopreventivo::join("users", "users.id", "=", "diagnosticopreventivo.user_id")
        ->join("estudiantes", "users.id", "=", "estudiantes.user_id")
        ->join("grupos", "grupos.id", "=", "estudiantes.grupos_id")
        ->select(
        'users.primer_nombre', 
        'users.segundo_nombre', 
        'users.primer_apellido', 
        'users.segundo_apellido',
        'users.anno',
        'grupos.name',
        'nacionalidad',
        'adicciones_Alcohol',
        'adicciones_Tabaco',
        'adicciones_Café',
        'adicciones_Tecnoadicciones',
        'adicciones_Drogas',
        'tipo_medicamentos',
        'tipo_medicamentos_consumo',
        'grupo_social',
        'creencia_religiosa',
        'prob_de_personalidad',
        'desc_prob_de_personalidad',
        'prob_de_psiquiatricos',
        'desc_prob_de_psiquiatricos',
        'prob_de_economicos',
        'desc_prob_de_economicos',
        'prob_de_sociales',
        'desc_prob_de_sociales',
        'prob_de_familiares',
        'desc_prob_de_familiares',
        'prob_de_academicos',
        'desc_prob_de_academicos',
        'prob_de_disciplina',
        'desc_prob_de_disciplina',
        'prob_de_asistencia',
        'desc_prob_de_asistencia')
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
            'Nacionalidad',
            'Alcohol',
            'Tabaco',
            'Café',
            'Tecnoadicciones',
            'Drogas',
            'Medicamentos Consumo',
            'Medicamentos',
            'Grupo Social',
            'Creencia Religiosa',
            'Problemas de personalidad',
            'Descripción Problemas de personalidad',
            'Problemas de psiquiatricos',
            'Descripción Problemas de psiquiatricos',
            'Problemas de economicos',
            'Descripción Problemas de economicos',
            'Problemas de sociales',
            'Descripción Problemas de sociales',
            'Problemas de familiares',
            'Descripción Problemas de familiares',
            'Problemas de academicos',
            'Descripción Problemas de academicos',
            'Problemas de disciplina',
            'Descripción Problemas de disciplina',
            'Problemas de asistencia',
            'Descripción Problemas de asistencia',
        ];
    }


}

