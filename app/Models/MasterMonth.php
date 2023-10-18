<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MasterMonth
 * 
 * @property int $id
 * @property int $week
 * @property int $month
 * @property int $year
 * @property int $total_salary
 * @property string|null $period
 * @property int|null $beginning_balance
 * @property int|null $incoming_cash
 * @property Carbon|null $incoming_cash_date
 * @property int|null $cash_total
 * @property int|null $remaining_balance
 * @property string $checked_status
 * @property string|null $detail
 *
 * @package App\Models
 */
class MasterMonth extends Model
{
	protected $table = 'master_month';
	public $timestamps = false;

	protected $casts = [
		'week' => 'int',
		'month' => 'int',
		'year' => 'int',
		'total_salary' => 'int',
		'beginning_balance' => 'int',
		'incoming_cash' => 'int',
		'incoming_cash_date' => 'datetime',
		'cash_total' => 'int',
		'remaining_balance' => 'int'
	];

	protected $fillable = [
		'week',
		'month',
		'year',
		'total_salary',
		'period',
		'beginning_balance',
		'incoming_cash',
		'incoming_cash_date',
		'cash_total',
		'remaining_balance',
		'checked_status',
		'detail'
	];
}
