<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    protected $table = 'profesores';
    protected $primaryKey = 'id';
    protected $fillable = [ 'nombre'];
    public $timestamps = true;

    public function reservas(){
    	return $this->hasMany(Reserva::class,'reserva_id');
    }
}
