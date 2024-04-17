<?php

namespace App\Models;

use App\Events\UserUpdated;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Contracts\Role;
class Users extends Model
{
  protected $guard_name = 'web';
  use Notifiable, HasRoles;
    
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
//     protected $dispatchesEvents = [
//       'updated' => UserUpdated::class,
//   ];

//   protected static function boot()
//   {
//       parent::boot();

//       static::updating(function ($user) {
//           // Verificar si el número de documento ha cambiado
//           if ($user->isDirty('number_identification')) {
//               // Buscar el registro correspondiente en la tabla 'logins' por el ID del usuario
//               $login = Logins::where('user_id', $user->id)->first();
              
//               // Si se encontró el registro en 'logins', actualizar ambos campos
//               if ($login) {
//                   $login->update([
//                       'users' => $user->number_identification,
//                       // Agregar otros campos que desees actualizar en 'logins'
//                       // 'other_field' => $user->other_field,
//                       // Agregar más campos según sea necesario
//                   ]);
//               }
//           }
//       });
//   }
  
    // public function roles(): BelongsToMany
    // {
    //     return $this->belongsToMany(Role::class);
    // }


  
 

}
