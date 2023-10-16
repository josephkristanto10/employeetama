<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MasterBonusPanen
 * 
 * @property int $id
 * @property int $id_master_month
 * @property Carbon $panen_date
 * @property string $buyer
 * @property string $panen_location
 * @property string $panen_petak
 * @property int $weight
 * @property int $total_weight
 * @property int $total_bonus
 * @property string $detail
 *
 * @package App\Models
 */
class MasterBonusPanen extends Model
{
	protected $table = 'master_bonus_panen';
	public $timestamps = false;

	protected $casts = [
		'id_master_month' => 'int',
		'panen_date' => 'datetime',
		'weight' => 'int',
		'total_weight' => 'int',
		'total_bonus' => 'int'
	];

	protected $fillable = [
		'id_master_month',
		'panen_date',
		'buyer',
		'panen_location',
		'panen_petak',
		'weight',
		'total_weight',
		'total_bonus',
		'detail'
	];
}
