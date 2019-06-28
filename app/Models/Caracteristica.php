<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Caracteristica extends Model
{
    protected $table = 'caracteristicas';
    protected $primaryKey = 'id';
    protected $fillable = [ 'nombre','descripcion'];
    public $timestamps = true;

      public function aulas(){
    	return $this->belongsToMany(Aula::class);
    }
}
