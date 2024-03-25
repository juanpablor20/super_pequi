<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contacts extends Model
{
    use HasFactory;

    static $rules = [
		'email_con' => 'required',
		'telephone_con' => 'required',
		'id_user_con' => 'required',
    ];

    protected $perPage = 20;

    protected $fillable = ['email_con','telephone_con','id_user_con'];

  
}


