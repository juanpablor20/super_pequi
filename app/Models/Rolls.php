<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rolls extends Model
{
    use HasFactory;

    public function Users()
    {
        return $this->hasMany(Users::class);
    }
}
