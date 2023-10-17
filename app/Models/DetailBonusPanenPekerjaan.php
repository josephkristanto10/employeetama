<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DetailBonusPanenPekerjaan
 * 
 * @property int $id
 * @property int $id_master_bonus_panen_pekerjaan
 * @property int $id_employee
 * @property int $jumlah_hari
 * @property int $bonus_per_day
 * @property int $take_home_pay
 *
 * @package App\Models
 */
class DetailBonusPanenPekerjaan extends Model
{
	protected $table = 'detail_bonus_panen_pekerjaan';
	public $timestamps = false;

	protected $casts = [
		'id_master_bonus_panen_pekerjaan' => 'int',
		'id_employee' => 'int',
		'jumlah_hari' => 'int',
		'bonus_per_day' => 'int',
		'take_home_pay' => 'int'
	];

	protected $fillable = [
		'id_master_bonus_panen_pekerjaan',
		'id_employee',
		'jumlah_hari',
		'bonus_per_day',
		'take_home_pay'
	];
}
