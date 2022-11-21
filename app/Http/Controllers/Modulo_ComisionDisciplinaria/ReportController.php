<?php

namespace App\Http\Controllers\Modulo_ComisionDisciplinaria;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modulo_Comision_disciplinaria\Report;
use App\Models\Modulo_Comision_disciplinaria\Denunciado;
use Illuminate\Support\Facades\DB;


class ReportController extends Controller
{

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $count_falta = count(DB::table('dictamen')->get());
        $count_tipofalta1 = count(DB::table('dictamen')->where("tipofalta", "Grave")->get());
        $count_tipofalta2 = count(DB::table('dictamen')->where("tipofalta", "Muy Grave")->get());
        $count_tipofalta3 = count(DB::table('dictamen')->where("tipofalta", "Menos Grave")->get());

        $count_denuncia = count(DB::table('denuncia')->get());  
        $count_dn = count(DB::table('denuncia')->where("estado", "Nueva")->get());
        $count_dp = count(DB::table('denuncia')->where("estado", "En proceso")->get());
        $count_df = count(DB::table('denuncia')->where("estado", "Finalizada")->get());
        $count_den = count(DB::table('denunciado')->get());


      
        return view(
            'Modulo_ComisionDisciplinaria.Report.index',
            compact( 'count_tipofalta1', 'count_tipofalta2', 'count_falta', 'count_tipofalta3', 'count_denuncia','count_dn','count_dp','count_df','count_den')
        );
    }}