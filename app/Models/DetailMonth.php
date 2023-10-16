<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DetailMonth
 * 
 * @property int $id
 * @property int $id_master_month
 * @property int $id_employee
 * @property int $salary_per_day
 * @property int $work_duration
 * @property int $total_honor_per_week
 * @property int $honor_day
 * @property int $total_piket_day
 * @property int $total_honor_picket
 * @property int $extra
 * @property int $total_honor_received
 * @property int $tunjangan
 * @property int $total
 *
 * @package App\Models
 */
class DetailMonth extends Model
{
	protected $table = 'detail_month';
	public $timestamps = false;

	protected $casts = [
		'id_master_month' => 'int',
		'id_employee' => 'int',
		'salary_per_day' => 'int',
		'work_duration' => 'int',
		'total_honor_per_week' => 'int',
		'honor_day' => 'int',
		'total_piket_day' => 'int',
		'total_honor_picket' => 'int',
		'extra' => 'int',
		'total_honor_received' => 'int',
		'tunjangan' => 'int',
		'total' => 'int'
	];

	protected $fillable = [
		'id_master_month',
		'id_employee',
		'salary_per_day',
		'work_duration',
		'total_honor_per_week',
		'honor_day',
		'total_piket_day',
		'total_honor_picket',
		'extra',
		'total_honor_received',
		'tunjangan',
		'total'
	];
}
