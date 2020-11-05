<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\inscripciones;
use DB;

class InscripcionesController extends Controller
{
    public function listaIns(Request $request)
    {
    	$id_grupo = $request->idg;

    	$consulta = DB::table('inscripciones as i')
    	->join('usuarios as u','i.id_usuario','u.id_usuario')
    	->select('u.nombre_completo as nombre','u.email')->where('i.id_grupo',$id_grupo)->where('u.tipo_usuario','!=','Profesor')
    	->get();
    	return view('asesorias.listaMiembros')->with('consulta',$consulta);
    }
}
