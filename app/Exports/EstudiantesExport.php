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
        $estudiantes = Estudiantes::join("users", "users.id", "=", "estudiantes.user_id")
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
        return $estudiantes;
        // $estudiantes = DB::select('SELECT users.primer_nombre,users.segundo_nombre,users.primer_apellido,users.segundo_apellido,
        // users.anno,e.name,e.periodo_lectivo,e.tipo_curso,e.plan_estudio,e.organizacion_pe,e.via_ingreso,e.situacion_escolar,
        // e.situacion_militar,e.cohorte_estudiantil,e.centro_trabajo,e.discapacidad,e.tipo_estudiante,e.direccion_completa,e.nombre_madre,
        // e.organizacion_politica,e.opcion_uci
        // FROM users
        // INNER JOIN (SELECT e.periodo_lectivo,e.tipo_curso,e.plan_estudio,e.organizacion_pe,e.via_ingreso,e.situacion_escolar,
        // e.situacion_militar,e.cohorte_estudiantil,e.centro_trabajo,e.discapacidad,e.tipo_estudiante,e.direccion_completa,e.nombre_madre,
        // e.organizacion_politica,e.opcion_uci, grupos.name  FROM estudiantes as e INNER JOIN
        //     grupos as g ON e.grupos_id = g.id) as e ON users.id = e.user_id

        // WHERE users.anno = ' . $anno . '
        // ');
        // return $estudiantes;
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
    // DECLARE @Number INT;  
    // SET @Number = 50;  
    // IF @Number > 100  
    //    PRINT 'The number is large.';  
    // ELSE   
    //    BEGIN  
    //       IF @Number < 10  
    //       PRINT 'The number is small.';  
    //    ELSE  
    //       PRINT 'The number is medium.';  
    //    END ;  
    // GO

//     USE AdventureWorks2012;  
// GO  
// SELECT   ProductNumber, Name, "Price Range" =   
//       CASE   
//          WHEN ListPrice =  0 THEN 'Mfg item - not for resale'  
//          WHEN ListPrice < 50 THEN 'Under $50'  
//          WHEN ListPrice >= 50 and ListPrice < 250 THEN 'Under $250'  
//          WHEN ListPrice >= 250 and ListPrice < 1000 THEN 'Under $1000'  
//          ELSE 'Over $1000'  
//       END  
// FROM Production.Product  
// ORDER BY ProductNumber ;  
// GO

}
