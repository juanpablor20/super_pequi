<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{

  static $rules = [
    'date_ser' => 'required',
    
    'user_id' => 'required',
    'serie_equi' => 'required',
  ];




  protected $perPage = 20;


  protected $fillable = ['date_ser', 'status', 'user_borrower_id', 'equipment_id', 'environmet_id'];


  public function Users()
  {
    return $this->belongsTo(Users::class, 'user_borrower_id');
  }

  public function equipment()
  {
    return $this->belongsTo(Equipment::class, 'equipment_id');
  }
 
  public function environment()
{
    return $this->belongsTo(Environment::class, 'environment_id');
}

}
