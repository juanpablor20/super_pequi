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

/**
 *
 *
 * @property int $id
 * @property string $names
 * @property string $last_name
 * @property string $type_identification
 * @property string $number_identification
 * @property string $sex_user
 * @property string $gender_sex
 * @property string $states
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Address|null $Address
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Relationship> $Relacion
 * @property-read int|null $relacion_count
 * @property-read \App\Models\Contacts|null $contacts
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Service> $services
 * @property-read int|null $services_count
 * @method static \Database\Factories\UsersFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Users newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Users newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Users permission($permissions, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder|Users query()
 * @method static \Illuminate\Database\Eloquent\Builder|Users role($roles, $guard = null, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereGenderSex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereNames($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereNumberIdentification($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereSexUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereStates($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereTypeIdentification($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Users withoutPermission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|Users withoutRole($roles, $guard = null)
 * @mixin \Eloquent
 */
class Users extends Authenticatable
{

    use HasFactory;
    
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
