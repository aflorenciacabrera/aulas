<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;


class Periodo extends Model
{
    use Notifiable, SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $table = 'periodos';
    protected $primaryKey = 'id';
    protected $fillable = [ 'nombre', 'año','fehca_inicio','fecha_fin'];
    public $timestamps = true;

    public function reservas(){
    	return $this->hasMany(Reserva::class,'reserva_id');
    }
}
