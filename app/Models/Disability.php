<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Disability
 *
 * @property $id
 * @property $description
 * @property $status
 * @property $punishment_date
 * @property $end_date
 * @property $service_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Service $service
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Disability extends Model
{
    
    static $rules = [
		'description' => 'required',
		'end_date' => 'required',
		'service_id' => 'required',
    ];

    protected $perPage = 20;

    protected $fillable = ['description', 'punishment_date','end_date','service_id'];


    public function service()
    {
        return $this->hasOne('App\Models\Service', 'id', 'service_id');
    }
    

}
