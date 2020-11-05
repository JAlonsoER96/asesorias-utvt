<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\grupos;
use App\categorias;
use App\inscripciones;
use Session;
use DB;
use Mail;
use Carbon\Carbon;

class GruposController extends Controller
{
    //
    public function nuevoGrupo()
    {
        if (Session::get('sesionid') !="" ) {
            if (Session::get('sesiontipo')=="Profesor") {
                $consulta = grupos::orderBy('id_grupo','desc')->take(1)->get();
                $count = count($consulta);
                if ($count == 0) {
                    $idgs = 1;
                }else{
                    $idgs = $consulta[0]->id_grupo+1;
                }
                $categorias = categorias::orderBy('id_categoria','desc')->get();
                return view('asesorias.altaGrupo')->with('categorias',$categorias)->with('idgs',$idgs);
            }else{
                Session::flash('error','La creación de grupos es solo para maestros');
            }
        }else{
            Session::flash('error','No ha iniciado session');
            return redirect()->route('login');
        }
    }

    public function guardar(Request $request)
    {
    	if (Session::get('sesionid') !="" ) {
            if (Session::get('sesiontipo')=="Profesor") {

                $grupo = new grupos;
                $grupo->id_grupo = $request->id_grupo;
                $grupo->id_usuario = Session::get('sesionid');
                $grupo->id_categoria = $request->id_categoria;
                $grupo->save();

                //El profesor se inscribira automaticamente a su propio grupo

                $ins = new inscripciones;
                $myTime = Carbon::now('America/Mexico_City');
                $ins->fecha_inscripcion = $myTime->toDateString();
                $ins->id_grupo = $request->id_grupo;
                $ins->id_usuario = Session::get('sesionid');
                $ins->save();

                return back()->with('msj','Grupo creado correctamente');
            }
        }
    }
    public function busquedaG(Request $request)
    {
       $filtro = $request->categoria;
       $consulta1 = DB::table('grupos as g')
       ->join('categorias as c','g.id_categoria','c.id_categoria')
       ->join('usuarios as u','g.id_usuario','u.id_usuario')
       ->select('g.id_grupo','c.nombre_categoria as categoria','u.nombre_completo as creado_por')->where('c.nombre_categoria','LIKE','%'.$filtro.'%')
       ->orderBy('c.nombre_categoria','asc')
       ->get();

       //Saber si el usuario ya esta inscrito en el grup

       return view('asesorias.resultadoBusqueda1')->with('resultado',$consulta1);
    }
    public function unirseG($id_grupo)
    {
        $idu = Session::get('sesionid');
        $consulta = DB::table('inscripciones as i')
        ->join('grupos as g','i.id_grupo','g.id_grupo')
        ->join('usuarios as u','i.id_usuario','u.id_usuario')
        ->select('g.id_grupo','u.nombre_completo','i.fecha_inscripcion')
        ->where('g.id_grupo',$id_grupo)->where('u.id_usuario',$idu)
        ->take(1)
        ->get();
        $count = count($consulta);
        if ($count == 0) {
            $newins = new inscripciones;
            $myTime = Carbon::now('America/Mexico_City');
            $newins->fecha_inscripcion=$myTime->toDateString();
            $newins->id_usuario = $idu;
            $newins->id_grupo = $id_grupo;
            $newins->save();

            $datosMail = DB::table('grupos as grp')
            ->join('usuarios as usr','grp.id_usuario','usr.id_usuario')
            ->join('categorias as ctg','grp.id_categoria','ctg.id_categoria')
            ->select('usr.email','ctg.nombre_categoria')->where('grp.id_grupo',$id_grupo)->take(1)->get();

            $data = array(['email'=>$datosMail[0]->email,'categoria'=>$datosMail[0]->nombre_categoria]);
            $correo = $datosMail[0]->email;

            Mail::send('asesorias.mails.uniongrupo',$data[0], function ($message) use ($correo){
                $message->to($correo);
                $message->subject('Se han unido a tu grupo');
            });
            return redirect()->back()->with('msj','Se ha unido correctamente al grupo');
        }else{
            return redirect()->back()->with('msj','Se habia unido al grupo con anterioridad en la fecha'.' '.$consulta[0]->fecha_inscripcion);
        }
    }
}
