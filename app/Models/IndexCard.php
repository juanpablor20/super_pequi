<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class IndexCard
 *
 * @property $id
 * @property $number
 * @property $states
 * @property $program_id
 * @property $created_at
 * @property $updated_at
 *
 * @property IndexCard[] $indexCards
 * @property IndexCard $indexCard
 * @property Relationship[] $relationships
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class IndexCard extends Model
{
    
    static $rules = [
		'number' => 'required',
		'states' => 'required',
		'program_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['number','states','program_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function indexCards()
    {
        return $this->hasMany('App\Models\IndexCard', 'program_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function indexCard()
    {
        return $this->hasOne('App\Models\IndexCard', 'id', 'program_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function relationships()
    {
        return $this->hasMany('App\Models\Relationship', 'index_card_id', 'id');
    }
    

}
