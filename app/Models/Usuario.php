<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Usuario extends Model
{
    
    static $rules = [
		'nombres' => 'required',
		'apellidos' => 'required',
		'tipo_doc' => 'required',
		'num_doc' => 'required',
    ];

    protected $perPage = 20;

    protected $fillable = ['nombres','apellidos','tipo_doc','num_doc','estados'];

    public function contactos()
    {
        return $this->hasMany(contacto::class, 'user_id', 'id');
    }
   
    public function direcciones()
    {
        return $this->hasMany(direccion::class, 'usuario_id', 'id');
    }
    
  
  public function uniones()
  {
    return $this->belongsToMany(Roles::class, 'roles', 'usuarios_id', 'roles_id');
  }

  public function fichas()
  {
      return $this->belongsToMany(Ficha::class, 'relacions', 'user_rel_id', 'programa_id', 'ficha_id');
  }
  public function datos()
  {
      return $this->belongsToMany(uniones::class, 'relacions', 'user_rel_id', 'programa_id', 'ficha_id', 'id');
  }

 

}
