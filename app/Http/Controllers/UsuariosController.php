<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\usuarios;
use App\grupos;
use Session;
use DB;
use Mail;

class UsuariosController extends Controller
{
    public function login()
    {
        return view('paginaweb.login');
    }

	public function registro(){
		$nextR = usuarios::withTrashed()->orderBy('id_usuario','desc')->take(1)->get();
        $count = count($nextR);
        if ($count == 0) {
            $idcs = 1;
        }else{
            $idcs = $nextR[0]->id_usuario+1;
        }
    	return view('paginaweb.registro')->with(['id'=>$idcs]);
    }

    public function guardaRegistro(Request $request){

    	$this->validate($request,[
    		'nombre'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,é,ó,á,í,ú]+$/'],
    		'app'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,é,ó,á,í,ú]+$/'],
    		'apm'=>['regex:/^[A-Z][A-Z,a-z, ,ñ,é,ó,á,í,ú]+$/'],
    		'edad'=>'required|numeric|integer|min:18',
    		'email'=>'required|email|unique:usuarios',
    		'telefono'=>'unique:usuarios|regex:/^[0-9]{10}$/',
    		'contrasena'=>'unique:usuarios|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/|min:6|max:12',
    		'tipo_usuario'=>'required',
    	]);

    	$usuario = new usuarios;
    	$usuario->id_usuario = $request->id_usuario;
    	$usuario->nombre_completo = $request->nombre.' '.$request->app.' '.$request->apm;
    	$usuario->edad = $request->edad;
    	$usuario->email = $request->email;
    	$usuario->telefono = $request->telefono;
    	$usuario->tipo_usuario = $request->tipo_usuario;
    	$usuario->contrasena = $request->contrasena;

    	if($usuario->save()){
            $correo = $request->email;
            Mail::send('asesorias.inscripcionPagina',$request->all(), function ($message) use ($correo){
                $message->to($correo);
                $message->subject('Correo Bienvenida');
            });
            return redirect()->route('/')->with('error','Usuario Agregado Correctamente');
    	}else{
    		return redirect()->back()->with('msj','Error al registrarse');
    	}
    }
    
    public function inicioUsuario()
    {
        if (Session::get('sesionid')!="") {
            $tp = Session::get('sesiontipo');
            if ($tp=="Profesor"){
                $grupos = DB::table('grupos as g')
                ->join('categorias as c','g.id_categoria','c.id_categoria')
                ->select('g.*','c.nombre_categoria as categoria')->where('g.id_usuario',Session::get('sesionid'))
                ->get();
                return view('paginaweb.inicioUsuario')->with(['tp'=>$tp,'grupos'=>$grupos]);
            }else{
                $consulta = DB::table('inscripciones as i')
                ->join('usuarios as u','i.id_usuario','u.id_usuario')
                ->join('grupos as g','i.id_grupo','g.id_grupo')
                ->join('categorias as c','g.id_categoria','c.id_categoria')
                ->select('u.id_usuario','u.nombre_completo as usuario','g.id_grupo','c.nombre_categoria as categoria', 'i.fecha_inscripcion as fecha')
                ->where('i.id_usuario',Session::get('sesionid'))->get();
                return view('paginaweb.inicioUsuario')->with(['tp'=>$tp,'consulta'=>$consulta]);
            }
        }else{
            Session::flash('error','Cession Cerrada o expirada');
            return redirect()->route('login');
        }        
    }
}
