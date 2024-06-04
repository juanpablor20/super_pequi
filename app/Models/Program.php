<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * 
 *
 * @property int $id
 * @property string $names_pro
 * @property string $code_pro
 * @property string $version
 * @property string $states
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\IndexCard> $indexCards
 * @property-read int|null $index_cards_count
 * @method static \Database\Factories\ProgramFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Program newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Program newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Program query()
 * @method static \Illuminate\Database\Eloquent\Builder|Program whereCodePro($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Program whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Program whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Program whereNamesPro($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Program whereStates($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Program whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Program whereVersion($value)
 * @mixin \Eloquent
 */
class Program extends Model
{
    use HasFactory;

    static $rules = [
		'names_pro' => 'required',
		'code_pro' => 'required',
		'version' => 'required',

    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['names_pro','code_pro','version'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function indexCards()
    {
        return $this->hasMany(IndexCard::class, 'program_id', 'id');
    }


}
