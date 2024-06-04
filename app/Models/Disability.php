<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Disability
 *
 * @property $id
 * @property $description
 * @property $status
 * @property $punishment_date
 * @property $end_date
 * @property $service_id
 * @property $created_at
 * @property $updated_at
 * @property Service $service
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 * @method static \Illuminate\Database\Eloquent\Builder|Disability newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Disability newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Disability query()
 * @method static \Illuminate\Database\Eloquent\Builder|Disability whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Disability whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Disability whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Disability whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Disability wherePunishmentDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Disability whereServiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Disability whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Disability whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Disability extends Model
{

    use HasFactory;

    static $rules = [
		'description' => 'required',
		'end_date' => 'required',
		'service_id' => 'required',
    ];

    protected $perPage = 20;

    protected $fillable = ['description', 'punishment_date','end_date','service_id'];


    public function service()
    {
        return $this->hasOne('App\Models\Service', 'id', 'service_id');
    }


}
