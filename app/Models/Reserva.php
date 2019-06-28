<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $table = 'reservas';
    protected $primaryKey = 'id';
    
    protected $fillable = ['aula_id','periodo_id','asignatura_id','profesor_id','fecha','hora_inicio','hora_fin','descripcion','f_clase_inagural','h_clase_inagural'];

    public $timestamps = true;

    public function aula(){
    	return $this->belongsTo(Aula::class, 'profesor_id','id');
    }

    public function periodo(){
    	return $this->belongsTo(Periodo::class, 'periodo_id','id');
    }

    public function asignatura(){
    	return $this->belongsTo(Asignatura::class, 'asignatura_id','id');
    }

    public function profesor(){
    	return $this->belongsTo(Profesor::class, 'profesor_id','id');
    }
}
