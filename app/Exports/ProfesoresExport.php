<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Modulo_PerfildeUsuario\Profesores; 
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;


class ProfesoresExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        session()->put('anno', User::find(auth()->id())->anno);
        $anno  = session()->get('anno') ;
        if(User::find(auth()->id())->hasRole('Vicedecana')){
        return  $profesores = Profesores::join("users", "users.id", "=", "profesores.user_id")
        ->join("grupos", "grupos.id", "=", "profesores.grupos_id")
        ->join("asignaturas", "asignaturas.id", "=", "profesores.asignaturas_id")
        ->select(
        'users.primer_nombre', 
        'users.segundo_nombre', 
        'users.primer_apellido', 
        'users.segundo_apellido',
        'users.anno',
        'grupos.name',
        'periodo_lectivo',
        'tipo_de_clases',
        'asignaturas.nombre',
       )
        ->orderBy('users.anno')
        ->get();
       
    }else{
        return  $profesores = Profesores::join("users", "users.id", "=", "profesores.user_id")
        ->join("grupos", "grupos.id", "=", "profesores.grupos_id")
        ->join("asignaturas", "asignaturas.id", "=", "profesores.asignaturas_id")
        ->select(
        'users.primer_nombre', 
        'users.segundo_nombre', 
        'users.primer_apellido', 
        'users.segundo_apellido',
        'users.anno',
        'grupos.name',
        'periodo_lectivo',
        'tipo_de_clases',
        'asignaturas.nombre',)
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
            'Período lectivo',
            'Tipo de clases',
            'Asignaturas',
           
        ];
    }
    


}

