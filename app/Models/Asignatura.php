<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    protected $table = 'asignaturas';
    protected $primaryKey = 'id';
    protected $fillable = [ 'nombre', 'ciclo'];
    public $timestamps = true;

    public function reservas(){
    	return $this->hasMany(Reserva::class,'reserva_id');
    }

}
