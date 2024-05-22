<?php

namespace App\Models;

use App\Services\UserValidationRules;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Validation\Rule;
use Spatie\Permission\Contracts\Role;

class Users extends Authenticatable
{
  protected $guard_name = 'web';
  use Notifiable, HasRoles, HasFactory;

  protected $perPage = 20;
   

  protected $fillable = ['names', 'last_name', 'type_identification', 'number_identification', 'sex_user', 'gender_sex', 'states'];

  public static function getRules()
  {
    return UserValidationRules::rules();
  }

  public static function getPasswordRules()
  {
    return UserValidationRules::passwordRules();
  }

  public static function getUpdateRules()
  {
    return UserValidationRules::updateRules();
  }
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
}
