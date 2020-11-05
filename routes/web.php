<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','UsuariosController@login')->name('/');



Route::get('/plantilla','navController@inicio')->name('plantilla');
Route::get('/secretaria','navController@secretaria')->name('secretaria');

Route::get('/registro','UsuariosController@registro')->name('registro');
Route::post('/guardaRegistro','UsuariosController@guardaRegistro')->name('guardaRegistro');

Route::get('login','UsuariosController@login')->name('login');
Route::post('session','loginControler@iniaSession')->name('session');
Route::get('cerrarSesion','loginControler@cerrarSesion')->name('cerrarSesion');

Route::get('inicio','UsuariosController@inicioUsuario')->name('inicioUsuario');

Route::get('usuarios','UsuariosController@listaUsuarios');

Route::get('categorias','CategoriasController@listaCategorias')->name('categorias');

Route::get('registroGrupo','GruposController@nuevoGrupo')->name('registroGrupo');

Route::post('guardaGrupo','GruposController@guardar')->name('guardaGrupo');

Route::get('listaPost','PostsController@listaPostsUsuario')->name('listaPost');

Route::GET('/busquedaGrupo','GruposController@busquedaG')->name('busquedaGrupo');

Route::get('/unirse/{id_grupo}','GruposController@unirseG')->name('unirse');

Route::get('/postGrupo/{id_grupo}','PostsController@postGrupo')->name('postGrupo');

Route::get('/crearPost','PostsController@crearPost')->name('crearPost');

Route::POST('saveP','PostsController@gP')->name('saveP');

Route::post('/guardaComentario','ComentariosController@guardaComentario')->name('guardaComentario');

Route::get('/mostrarComentarios','ComentariosController@mostrarComent')->name('mostrarComentarios');

Route::get('dowload/{archivo}','ComentariosController@downloadFile')->name('download');

Route::get('listaIns','InscripcionesController@listaIns')->name('listaIns');