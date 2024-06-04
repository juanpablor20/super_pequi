<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string $names
 * @property string $states
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\EnvironmentFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Environment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Environment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Environment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Environment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Environment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Environment whereNames($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Environment whereStates($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Environment whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Environment extends Model
{
  use  HasFactory;
    
    static $rules = [
		'names' => 'required',
		
    ];

    protected $perPage = 20;
    protected $fillable = ['names','states'];



}
