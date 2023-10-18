<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MasterAdmin
 * 
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $name
 * @property string $user_roles
 *
 * @package App\Models
 */
class MasterAdmin extends Model
{
	protected $table = 'master_admin';
	public $timestamps = false;

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'username',
		'password',
		'name',
		'user_roles'
	];
}
