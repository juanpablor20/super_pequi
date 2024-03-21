<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class admin extends Model
{


    static $rules = [
		'name_user' => 'required',
		'last_name_user' => 'required',
        'type_identification_user' => 'required',
        'number_identification_user' => 'required'
    ];
    protected $fillable = ['name_user','last_name_user', 'type_identification_user', 'number_identification_user', 'state_user'];

    public function contactos()
    {
        return $this->hasMany(Contact::class, 'id_user_con', 'id');
    }
    public function direciones()
    {
        return$this->hasMany(Addres::class, 'id_user_add', 'id');
    }

   
   

  
}
