<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use App\posts;
use App\usuarios;
use App\grupos;
use App\inscripciones;
use Carbon\Carbon;
use Mail;

class PostsController extends Controller
{
    public function listaPostsUsuario()
    {

    	$usuario = Session::get('sesionid');
    	$posts = posts::where('id_usuario',$usuario)->get();
    	if (count($posts) == 0) {
    		echo "No tiene POSTS";
    	}
    	else{
    		echo json_encode($posts);
    		
    	}
    	 
    }
    public function postGrupo($id_grupo)
    {
        $idg = $id_grupo;
        $nextR = posts::withTrashed()->orderBy('id_post','desc')->take(1)->get();
        $count = count($nextR);
        if ($count == 0) {
            $idps = 1;
        }else{
            $idps = $nextR[0]->id_post+1;
        }

        $consulta = posts::orderBy('id_post','desc')->where('id_grupo',$id_grupo)->get();
        return view('asesorias.postGrupo')->with('consulta',$consulta)->with('idg',$idg)->with('idps',$idps);
    }
    public function crearPost(){
        return view('asesorias.crearPost');
    }

    public function gP(Request $request)
    {
        if ($request->ttl!="" && $request->cp!="") {

            /*$correos = DB::table('inscripciones as i')
                ->join('grupos as gr','i.id_grupo','gr.id_grupo')
                ->join('usuarios as usr','i.id_usuario','usr.id_usuario')
                ->select('usr.email')
                ->where('i.id_grupo',$request->idg)
                ->get();

                dd($correos);*/
           $archivo = $request->file('arcv');
           if ($archivo !="") {
            $ldate = date('Ymd_His_');
            $f = $archivo->getClientOriginalName();
            $f2 = $ldate.$f;
            \Storage::disk('local')->put($f2, \File::get($archivo));
            echo "Archivo Guardado".'<br>';
            }

            $p = new posts;
            $p->titulo = $request->ttl;
            $p->cuerpo_post = $request->cp;
            if ($archivo!="") {
                $p->archivo=$f2;
            }
            $myTime = Carbon::now('America/Mexico_City');
            $p->fecha_post=$myTime->toDateTimeString();
            $p->id_usuario = Session::get('sesionid');
            $p->id_grupo = $request->idg;
            if ($p->save()) {

                $correos = DB::table('inscripciones as i')
                ->join('grupos as gr','i.id_grupo','gr.id_grupo')
                ->join('usuarios as usr','i.id_usuario','usr.id_usuario')
                ->select('usr.email')
                ->where('i.id_grupo',$request->idg)
                ->get();
                foreach ($correos as $corr) {
                    $mail = $corr->email;
                    Mail::send('asesorias.mails.nuevoPost',$request->all(), function ($message) use ($mail){
                        $message->to($mail);
                        $message->subject('Post Agregado');
                        });
                }                  
                return redirect()->back()->with('msj','Post Creado Correctamente');
            }
        }else{
            return redirect()->back()->with('msj','No ingreso los datos completos');
        }
    }

}