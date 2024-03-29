<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
class User extends Authenticatable
{
    use HasRoles;
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = ['names', 'last_name', 'type_identification', 'number_identification', 'sex_user', 'gender_sex', 'password'];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'password' => 'hashed',
    ];


    public function contacts()
    {
        return $this->hasOne(contacts::class, 'id_user_con', 'id');
    }
   
    public function Address()
    {
        return $this->hasOne(Address::class, 'id_user_add', 'id');
        
    }
}