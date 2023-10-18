<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MasterBonusPanenPekerjaan
 * 
 * @property int $id
 * @property int $week
 * @property int $month
 * @property int $year
 * @property string $periode
 * @property string $keterangan
 * @property int $jumlah_pekerja
 * @property int $total_bonus
 * @property string $checked_status
 * @property string $detail
 *
 * @package App\Models
 */
class MasterBonusPanenPekerjaan extends Model
{
	protected $table = 'master_bonus_panen_pekerjaan';
	public $timestamps = false;

	protected $casts = [
		'week' => 'int',
		'month' => 'int',
		'year' => 'int',
		'jumlah_pekerja' => 'int',
		'total_bonus' => 'int'
	];

	protected $fillable = [
		'week',
		'month',
		'year',
		'periode',
		'keterangan',
		'jumlah_pekerja',
		'total_bonus',
		'checked_status',
		'detail'
	];
}
