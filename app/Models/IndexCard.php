<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class IndexCard extends Model
{

    static $rules = [
        'number' => 'required',
        'states' => 'required',
        'program_id' => 'required',
    ];

    protected $perPage = 20;

    protected $fillable = ['number', 'states', 'program_id'];



    public function programs()
    {
        return $this->belongsTo(programs::class, 'program_id', 'id');
    }

    public function relationships()
    {
        return $this->hasMany('App\Models\Relationship', 'index_card_id', 'id');
    }
}
