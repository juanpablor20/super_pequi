<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class IndexCard extends Model
{

    use HasFactory;


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

}
