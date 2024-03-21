<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsersBorrower extends Model
{
    
    static $rules = [
		'name_user' => 'required',
		'last_name_user' => 'required',
		'type_identification_user' => 'required',
		'number_identification_user' => 'required',
		'state_user' => 'required',
    ];

    protected $perPage = 20;

  
    protected $fillable = ['name_user','last_name_user','type_identification_user','number_identification_user','state_user'];



}
