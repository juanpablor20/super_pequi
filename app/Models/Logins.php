<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\Logins as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string $users
 * @property mixed $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @property-read \App\Models\Users|null $usuario
 * @method static \Illuminate\Database\Eloquent\Builder|Logins newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Logins newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Logins permission($permissions, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder|Logins query()
 * @method static \Illuminate\Database\Eloquent\Builder|Logins role($roles, $guard = null, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder|Logins whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Logins whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Logins wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Logins whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Logins whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Logins whereUsers($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Logins withoutPermission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|Logins withoutRole($roles, $guard = null)
 * @mixin \Eloquent
 */
class Logins extends Authenticatable
{
    use HasFactory;
    use HasRoles;
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;

    protected $fillable = ['users', 'password'];
    protected $hidden = ['password', 'remember_token'];
    protected $casts = [
        'password' => 'hashed',
    ];
    public function usuario()
    {
        return $this->hasOne(Users::class, 'number_identification', 'users');
    }

}

  


