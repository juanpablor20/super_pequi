<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\Logins as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

use Illuminate\Database\Eloquent\Model;

class Logins extends Authenticatable
{
    use HasFactory;
    use HasRoles;
    use HasApiTokens, HasFactory, Notifiable;

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

  


