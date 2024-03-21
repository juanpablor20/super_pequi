<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Computo
 *
 * @property $id
 * @property $nombre
 * @property $numero_serie
 * @property $caracteristicas
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Computo extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'numero_serie' => 'required',
		'caracteristicas' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','numero_serie','caracteristicas'];



}
