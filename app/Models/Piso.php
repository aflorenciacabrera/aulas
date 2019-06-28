<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Piso extends Model
{
    protected $table = 'pisos';
    protected $primaryKey = 'id';
    protected $fillable = [ 'numero'];
    public $timestamps = true;

    public function aulas(){
    	return $this->hasMany(Aula::class,'aula_id');
    }
}
