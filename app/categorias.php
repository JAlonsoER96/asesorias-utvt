<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class categorias extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'id_categoria';
    protected $fillable = ['id_categoria','nombre_categoria'];
    protected $date = 'deleted_at';
}
