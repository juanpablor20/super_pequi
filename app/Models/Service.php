<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    
    static $rules = [
		'date_ser' => 'required',
		'state_ser' => 'required',
		'user_id' => 'required',
    ];
 

  public function validateEquipment($equipmentId) {

    // Validation logic
    $equipment = Equipment::find($equipmentId);

    if(!$equipment) {
      return ("Equipment not found"); 
    }

    // Additional validation

    return $equipment;

  }


    protected $perPage = 20;

  
    protected $fillable = ['return_date','date_ser','state_ser','user_id'];


    public function Users()
  {
    return $this->belongsTo(Users::class, 'user_id');
  }

  public function equipoUnion()
  {
    return $this->belongsToMany(Equipment::class, 'services_uniones', 'services_id', 'equipment_id');
  }
    

}
