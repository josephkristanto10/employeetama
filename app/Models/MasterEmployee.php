<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MasterEmployee
 * 
 * @property int $id
 * @property string $name
 * @property Carbon $join_date
 * @property Carbon $birth_date
 * @property string $address
 * @property string $city
 * @property string $phone
 * @property string $devisi
 * @property string $status
 *
 * @package App\Models
 */
class MasterEmployee extends Model
{
	protected $table = 'master_employee';
	public $timestamps = false;

	protected $casts = [
		'join_date' => 'datetime',
		'birth_date' => 'datetime'
	];

	protected $fillable = [
		'name',
		'join_date',
		'birth_date',
		'address',
		'city',
		'phone',
		'devisi',
		'status'
	];
}
