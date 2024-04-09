<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Service
 *
 * @property $id
 * @property $return_date
 * @property $date_ser
 * @property $state_ser
 * @property $user_id
 * @property $created_at
 * @property $updated_at
 *
 * @property ServicesUnione[] $servicesUniones
 * @property TransferPlace[] $transferPlaces
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Service extends Model
{
    
    static $rules = [
		'date_ser' => 'required',
		'state_ser' => 'required',
		'user_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['return_date','date_ser','state_ser','user_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function servicesUniones()
    {
        return $this->hasMany('App\Models\ServicesUnione', 'services_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transferPlaces()
    {
        return $this->hasMany('App\Models\TransferPlace', 'places_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    

}
