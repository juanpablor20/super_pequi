<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Validation\Rule;
use Spatie\Permission\Contracts\Role;

class Users extends Model
{
  protected $guard_name = 'web';
  use Notifiable, HasRoles;
  use HasFactory;
  static $rules = [
    'names' => 'required|min:2|max:50',
    'last_name' => 'required|min:2|max:50',
    'type_identification' => 'required',
    'number_identification' => 'required|numeric|digits_between:6,12|unique:users,number_identification',
    'sex_user' => 'required|string',
    'gender_sex' => 'required',
    'email_con' => 'required|email',
    'telephone_con' => 'required|regex:/^\d{10}$/',
    'addres_add' => 'required',
  
  ];
  static $rules1 = [
  'password' => ['required', 'string', 'min:8', 'confirmed'],
  ];
  static $updateRules = [
    'names' => 'required',
    'last_name' => 'required',
    'type_identification' => 'required',
    'number_identification' => 'required',
    'sex_user' => 'required',
    'gender_sex' => 'required',
    'email_con' => 'required',
    'telephone_con' => 'required',
    'addres_add' => 'required',
  ];

  protected $perPage = 20;

  protected $fillable = ['names', 'last_name', 'type_identification', 'number_identification', 'sex_user', 'gender_sex', 'states'];

  public function contacts()
  {
    return $this->hasOne(Contacts::class, 'id_user_con', 'id');
  }

  public function Address()
  {
    return $this->hasOne(Address::class, 'id_user_add', 'id');
  }
  public function services()
  {
    return $this->hasMany(Service::class, 'user_id');
  }
  public function Relacion()
  {
    return $this->hasMany(Relationship::class, 'index_card_id', 'user_rel_id', 'id');
  }
  public function login()
    {
        return $this->belongsTo(Logins::class, 'number_identification', 'users');
    }
    
}
