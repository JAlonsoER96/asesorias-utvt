<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class posts extends Model
{
	use SoftDeletes;
	public $table='post';

	protected $primaryKey = 'id_post';
	protected $fillable = ['id_post','titulo','cuerpo_post','archivo','fecha_post','id_usuario','id_grupo'];
	protected $date = ['deleted_at'];
}
