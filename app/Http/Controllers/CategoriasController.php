<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\categorias;

class CategoriasController extends Controller
{
    public function listaCategorias()
    {
    	$categorias = categorias::withTrashed()->get();
    	echo json_encode($categorias);
    }
}
