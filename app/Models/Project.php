<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
    	'name', 'description','final_date', 'hex'
    ];

    public function tasks ()
    {
    	return $this->hasMany('App\Models\Task')
    }
    /*
    	hasMany (Uno a Muchos) El modelo que tiene muchos registros vinculados
    	belongsTo (Pertenece a) El modelo que debe vincularse a su "padre"
    	hasOne (uno a uno)*/
}
