<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\comentarios;
use Carbon\Carbon;
use Storage;
use Session;
use DB;
use Mail;

class ComentariosController extends Controller
{
    public function guardaComentario(Request $request)
    {
    	$ar = $request->archivo;
    	if ($ar != "") {
    	 	$this->validate($request,[
    	 		'comentario'=>'required|min:10|max:250',
    	 		'archivo'=>'file|mimes:gif,jpeg,png,pdf,doc,xmls',
    	 	]);
    	 }else{
    	 	$this->validate($request,[
    	 		'comentario'=>'required|min:10|max:250',
    	 	]);
    	 }

    	 $file = $request->file('archivo');
    	 if ($file!="") {
    	 	$ldate = date('Ymd_His_');
    	 	$f = $file->getClientOriginalName();
    	 	$f2 = $ldate.$f;
    	 	Storage::disk('local')->put($f2, \File::get($file));
    	 }

    	 $coment = new comentarios;

    	 $coment->comentario = $request->comentario;
    	 if ($ar != "") {
    	 	$coment->archivo=$f2;
    	 }
    	 $myTime = Carbon::now('America/Mexico_City');
         $coment->fecha_comentario=$myTime->toDateTimeString();
         $coment->id_post = $request->idp;
         $coment->id_usuario = Session::get('sesionid');
         if ($coment->save()) {

            $consulta = DB::table('comentarios as cmnt')
            ->join('post as p','cmnt.id_post','p.id_post')
            ->join('grupos as grp','grp.id_grupo','p.id_grupo')
            ->join('inscripciones as i','i.id_grupo','grp.id_grupo')
            ->join('usuarios as u','u.id_usuario','i.id_usuario')
            ->select('u.nombre_completo as name_us','u.email','p.titulo','grp.id_grupo')
            ->where('cmnt.id_post',$request->idp)
            ->where('cmnt.comentario',$request->comentario)
            ->orderBy('u.id_usuario','desc')->get();
            $data = array(['titulo'=>$consulta[0]->titulo,'idp'=>$consulta[0]->id_grupo]);
            foreach ($consulta as $corr) {
                $mail = $corr->email;
                Mail::send('asesorias.mails.comentarioPost',$data[0], function ($message) use ($mail){
                    $message->to($mail);
                    $message->subject('Nuevo Comentario');
                });
            }
            return redirect()->back()->with('msj','Comentario agregado correctamente');
         }
    }
    public function mostrarComent(Request $request)
    {
        $idp = $request->id_post;

        $consulta = DB::table('comentarios as c')
        ->join('usuarios as u','c.id_usuario','u.id_usuario')
        ->select('c.id_comentario','c.comentario','c.fecha_comentario','c.archivo','u.nombre_completo as comentado_por')
        ->where('c.id_post',$idp)
        ->orderBy('c.fecha_comentario','desc')
        ->get();
        return view('asesorias.comentarios',['consulta'=>$consulta]);
    }
    public function downloadFile($archivo)
    {
        if (Session::get('sesionid')!="") {
            return Storage::download($archivo);
        }else{
            Session::flash('error','Debe iniciar sesión para descargar el archivo');
            return redirect()->route('/');
        }
    }

}
