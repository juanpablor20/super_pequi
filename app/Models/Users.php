<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Users extends Model
{
    
    static $rules = [
		'names' => 'required',
		'last_name' => 'required',
		'type_identification' => 'required',
		'number_identification' => 'required',
    'sex_user' => 'required',
    'gender_sex' => 'required',
    ];

    protected $perPage = 20;

    protected $fillable = ['names','last_name','type_identification','number_identification', 'sex_user', 'gender_sex'];

    public function contacts()
    {
        return $this->hasOne(Contacts::class, 'id_user_con', 'id');
    }
   
    public function Address()
    {
        return $this->hasOne(Address::class, 'id_user_add', 'id');
    }
    
  
  public function uniones_rol()
  {
    return $this->belongsToMany(Rolls::class, 'unions', 'user_id', 'rolls_id');
  }

  
 

}
