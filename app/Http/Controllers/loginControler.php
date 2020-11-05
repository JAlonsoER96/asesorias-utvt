<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\usuarios;
use Session;


class loginControler extends Controller
{
    public function iniaSession(Request $request)
    {
    	$this->validate($request,[
    		'email'=>'required',
    		'contrasena'=>'required',
    	]);

    	$consulta = usuarios::where('email',$request->email)->where('contrasena',$request->contrasena)->get();
    	if(count($consulta) == 0){
    		Session::flash('error','Error al iniciar Sesión');
    		return redirect()->route('login');
    	}else{
    		Session::put('sesionname',$consulta[0]->nombre_completo);
            Session::put('sesionid',$consulta[0]->id_usuario);
            Session::put('sesiontipo',$consulta[0]->tipo_usuario);
            $sname = Session::get('sesionname');
            $sid = Session::get('sesionid');
            $stip=Session::get('sesiontipo');
            return redirect()->route('inicioUsuario')->with('msj','Bienvenido '.$sname);
    	}
    }
    public function cerrarSesion()
    {
       Session::forget('sesionname');
       Session::forget('sesionid');
       Session::forget('sesiontipo');
       Session::flush();
       Session::flash('error', 'Session Cerrada Correctamente');
       return redirect()->route('login');
    }
}
