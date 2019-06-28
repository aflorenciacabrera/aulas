<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
   protected $table = 'aulas';
   protected $primaryKey = 'id';
    
protected $fillable = ['edificio_id','piso_id','nombre', 'capacidad'];

    public $timestamps = true;

    public function edificio(){
    	return $this->belongsTo(Edificio::class, 'edificio_id','id');
    }

    public function piso(){
    	return $this->belongsTo(Piso::class, 'piso_id','id');
    }

     public function caracteristicas(){
        return $this->belongsToMany(Caracteristica::class);
    }

}
