<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Environment extends Model
{
    
    static $rules = [
		'names' => 'required',
		
    ];

    protected $perPage = 20;
    protected $fillable = ['names','states'];



}
