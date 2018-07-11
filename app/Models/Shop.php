<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 11 Jul 2018 03:52:19 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Shop
 * 
 * @property int $id
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
		'record_time' => 'int',
		'update_time' => 'int'
	];

	protected $fillable = [
		'name',
		'record_time',
		'update_time'
	];
}
