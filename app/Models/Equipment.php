<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string $type_equi
 * @property string $characteristics
 * @property string $serie_equi
 * @property string $states
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Equipment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Equipment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Equipment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Equipment whereCharacteristics($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Equipment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Equipment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Equipment whereSerieEqui($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Equipment whereStates($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Equipment whereTypeEqui($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Equipment whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Equipment extends Model
{
    use HasFactory;
    static $rules = [
        'type_equi' => 'required',
        'serie_equi' => 'required',
    ];

    protected $perPage = 20;
    protected $fillable = ['type_equi', 'serie_equi', 'characteristics', 'states'];
}
