<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Equipment extends Model
{
    static $rules = [
        'type_equi' => 'required',
        'serie_equi' => 'required',
    ];

    protected $perPage = 20;
    protected $fillable = ['type_equi', 'serie_equi', 'characteristics', 'states'];
}
