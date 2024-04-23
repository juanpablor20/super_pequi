<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Program extends Model
{
    
    static $rules = [
		'names_pro' => 'required',
		'code_pro' => 'required',
		'version' => 'required',
		'states' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['names_pro','code_pro','version','states'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function indexCards()
    {
        return $this->hasMany('App\Models\IndexCard', 'program_id', 'id');
    }
    

}
