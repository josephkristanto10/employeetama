<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DetailBonusPanen
 * 
 * @property int $id
 * @property int $id_master_bonus_panen
 * @property int $id_employee
 * @property int $bonus
 *
 * @package App\Models
 */
class DetailBonusPanen extends Model
{
	protected $table = 'detail_bonus_panen';
	public $timestamps = false;

	protected $casts = [
		'id_master_bonus_panen' => 'int',
		'id_employee' => 'int',
		'bonus' => 'int'
	];

	protected $fillable = [
		'id_master_bonus_panen',
		'id_employee',
		'bonus'
	];
}
