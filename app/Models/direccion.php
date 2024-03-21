<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class direccion extends Model
{
    use HasFactory;
    protected $fillable = ['ciudad','usuario_id'];
    
    public function direciones()
    {
      return $this->hasMany(direccion::class, 'usuario_id', 'id');
    }
}
