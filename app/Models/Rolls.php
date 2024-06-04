<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Users> $Users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Rolls newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rolls newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rolls query()
 * @mixin \Eloquent
 */
class Rolls extends Model
{
    use HasFactory;

    public function Users()
    {
        return $this->hasMany(Users::class);
    }
}
