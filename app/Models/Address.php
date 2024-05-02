<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    static $rules = [
        'addres_add' => 'required',
    ];
    use HasFactory;
    protected $fillable = ['addres_add', 'id_user_add'];
    
  
}
