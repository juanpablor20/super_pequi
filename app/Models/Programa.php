<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Programa extends Model
{
    
    static $rules = [
		'nom_pro' => 'required',
		'estados' => 'required',
    ];

    protected $perPage = 20;
    protected $fillable = ['nom_pro','estados'];


    // public function relaciones()
    // {
    //     return $this->hasMany('App\Models\Relacione', 'programa_id', 'id');
    // }

    public function fichas()
{
    return $this->belongsToMany(Ficha::class, 'relacions', 'programa_id', 'ficha_id');
}

}
