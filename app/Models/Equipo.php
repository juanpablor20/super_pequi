<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Equipo
 *
 * @property $id
 * @property $num_serie
 * @property $descripcion
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Equipo extends Model
{
    
    static $rulles = [
		'num_serie' => 'required',
		'descripcion' => 'required',
    ];

    protected $perPage = 20;

    protected $fillable = ['num_serie','descripcion'];



}
