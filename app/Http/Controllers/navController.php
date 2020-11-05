<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use \Session;

class navController extends Controller
{
    public function inicio(){
    	return view('paginaweb.plantilla');
    }
    public function secretaria(){
    	return view('paginaweb.secretaria');
    }
    /*public function registro(){
    	return view('paginaweb.registro');
    }
    public function guardaRegistro(Request $request){
    	$nombre = $request->name;
        $mail = $request->email;
        $password = $request->password;
        if ($nombre == "" || $mail == "" || $password == "") {
            echo "NO se ingresaron datos o los datos no estan completos";
        }else{
            $usuario = new User;
            $usuario->name = $request->name;
            $usuario->email = $request->email;
            $usuario->password = $request->password;
            $usuario->save();
            return back()->with('msj','Usuario agregado correctamente');
        }
    }*/
}
