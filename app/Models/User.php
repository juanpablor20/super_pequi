<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'names',
        'last_name',
        'type_identification',
        'number_identification',
         'sex_user',
         'gender_sex',
        'password',
    ];

  
    protected $hidden = [
        'password',
        'remember_token',
    ];

    
    protected $casts = [
        'password' => 'hashed',
    ];
}
