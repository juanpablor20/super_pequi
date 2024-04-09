<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Servicio extends Model
{
    
    static $rules = [
		'estados' => 'required',
		'user_id' => 'required',
    ];

    protected $perPage = 20;

    
    protected $fillable = ['fecha_prestamo','fecha_devolucion','estados','user_id'];


    public function user() {
      return $this->belongsTo(Users::class, 'id', 'user_id');
  }

  public function equipos() {
      return $this->belongsToMany(Equipment::class, 'services_uniones', 'services_id', 'equipment_id');
  }
    // public function traslado(){
    //   return $this->
    // }
 

}
