<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 11 Jul 2018 03:52:19 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class User
 * 
 * @property int $id
 * @property string $email
 * @property string $name
 * @property bool $type
 * @property int $record_time
 * @property int $update_time
 *
 * @package App\Models
 */
class User extends Eloquent
{
	protected $table = 'user';
	public $timestamps = false;

	protected $casts = [
		'type' => 'bool',
		'record_time' => 'int',
		'update_time' => 'int'
	];

	protected $fillable = [
		'email',
		'name',
		'type',
		'record_time',
		'update_time'
	];
}
