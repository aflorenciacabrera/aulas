<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
class Edificio extends Model
{
    use Notifiable, SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $table = 'edificios';
    protected $primaryKey = 'id';
    protected $fillable = [ 'nombre'];
    public $timestamps = true;

    public function aulas(){
    	return $this->hasMany(Aula::class,'aula_id');
    }
}
