<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comentarios extends Model
{
    protected $primaryKey = 'id_comentario';
    protected $fillable = ['id_comentario','archivo','fecha_comentario','id_post','id_usuario'];
    protected $date = 'deleted_at';
}
