<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class IndexCard extends Model
{

    static $rules = [
        'number' => 'required',
        'program_id' => 'required',
    ];

    protected $perPage = 20;
    protected $fillable = ['number', 'program_id'];


    public function programs()
    {
        return $this->belongsTo(program::class, 'program_id', 'id');
    }
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(Users::class, 'relationships', 'index_card_id', 'user_id');
    }

}
