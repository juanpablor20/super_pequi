<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    
    static $rules = [
		'date_ser' => 'required',
		'state_ser' => 'required',
		'user_id' => 'required',
    ];
       
    // $equipment_id = $equipment->id; 
//     if (!$usuario) {

//         return "El usuario no existe";
//     


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

  
    protected $fillable = ['return_date','date_ser','state_ser','user_id', 'equipment_id'];


    public function Users()
  {
    return $this->belongsTo(Users::class, 'user_id');
  }

  public function equipment()
  {
    return $this->belongsTo(Equipment::class, 'equipment_id');
  }
    

}
