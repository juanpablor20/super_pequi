<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    
    static $rules = [
		'email_con' => 'required',
		'telephone_con' => 'required',
		'id_user_con' => 'required',
    ];

    protected $perPage = 20;

    protected $fillable = ['email_con','telephone_con','id_user_con'];

    public function contactos()
    {
        return $this->hasMany(Contact::class, 'id_user_con', 'id');
    }

    
    

}
