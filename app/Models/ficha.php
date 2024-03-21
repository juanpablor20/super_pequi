<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ficha extends Model
{
    use HasFactory;
    protected $fillable = ['num_ficha'];

    public function programas()
{
    return $this->belongsToMany(Programa::class, 'programa_id', 'id');
}

}
