<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class inscripciones extends Model
{
    protected $primaryKey = 'id_inscripcion';
    protected $fillable = ['id_inscripcion','fecha_inscripcion','id_usuario','id_grupo'];
}
