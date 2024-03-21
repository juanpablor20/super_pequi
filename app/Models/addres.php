<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addres extends Model
{
    use HasFactory;

    static $rules = [
		'addres_add' => 'required',
		'id_user_add' => 'required',
    ];
    protected $perPage = 20;
    protected $fillable = ['addres_add', 'id_user_add'];

    public function direciones()
    {
      return $this->hasMany(Addres::class, 'id_user_add', 'id');
    }
    
}
