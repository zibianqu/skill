<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 14 Jul 2018 09:07:53 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Shop
 * 
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property int $record_time
 * @property int $update_time
 *
 * @package App\Models
 */
class Shop extends Eloquent
{
	protected $table = 'shop';
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int',
		'record_time' => 'int',
		'update_time' => 'int'
	];

	protected $fillable = [
		'user_id',
		'name',
		'record_time',
		'update_time'
	];
}
