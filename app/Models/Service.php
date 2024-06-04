<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 *
 * @property int $id
 * @property int $equipment_id
 * @property int $user_borrower_id
 * @property int|null $user_returner_id
 * @property int $librarian_borrower_id
 * @property int|null $librarian_returner_id
 * @property string $date_ser
 * @property string|null $return_ser
 * @property string $status
 * @property int $environment_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Users $Users
 * @property-read \App\Models\Environment $environment
 * @property-read \App\Models\Equipment $equipment
 * @method static \Illuminate\Database\Eloquent\Builder|Service newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Service newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Service query()
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereDateSer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereEnvironmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereEquipmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereLibrarianBorrowerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereLibrarianReturnerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereReturnSer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereUserBorrowerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereUserReturnerId($value)
 * @mixin \Eloquent
 */
class Service extends Model
{

    use HasFactory;

  static $rules = [
    'date_ser' => 'required',

    'user_id' => 'required',
    'serie_equi' => 'required',
  ];




  protected $perPage = 20;


  protected $fillable = ['date_ser', 'status', 'user_id', 'equipment_id', 'environmet_id'];


  public function Users()
  {
    return $this->belongsTo(Users::class, 'user_borrower_id');
  }

  public function equipment()
  {
    return $this->belongsTo(Equipment::class, 'equipment_id');
  }

  public function environment()
{
    return $this->belongsTo(Environment::class, 'environment_id');
}

}
