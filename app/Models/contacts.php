<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string $email_con
 * @property string $telephone_con
 * @property int $id_user_con
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Contacts newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contacts newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contacts query()
 * @method static \Illuminate\Database\Eloquent\Builder|Contacts whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contacts whereEmailCon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contacts whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contacts whereIdUserCon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contacts whereTelephoneCon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contacts whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Contacts extends Model
{
    use HasFactory;

    static $rules = [
		'email_con' => 'required',
		'telephone_con' => 'required',
		'id_user_con' => 'required',
    ];

    protected $perPage = 20;

    protected $fillable = ['email_con','telephone_con','id_user_con'];

  
}


