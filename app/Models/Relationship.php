<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int $index_card_id
 * @property int $user_rel_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Relationship newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Relationship newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Relationship query()
 * @method static \Illuminate\Database\Eloquent\Builder|Relationship whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Relationship whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Relationship whereIndexCardId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Relationship whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Relationship whereUserRelId($value)
 * @mixin \Eloquent
 */
class Relationship extends Model
{
    use HasFactory;
    protected $fillable = ['index_card_id', 'user_rel_id'];
}
