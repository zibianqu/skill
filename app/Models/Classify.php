<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 18 Jul 2018 14:17:08 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Classify
 * 
 * @property int $id
 * @property string $name
 * @property int $pid
 * @property int $order
 * @property bool $status
 * @property int $record_time
 * @property int $update_time
 *
 * @package App\Models
 */
class Classify extends Eloquent
{
	protected $table = 'classify';
	public $timestamps = false;

	protected $casts = [
		'pid' => 'int',
		'order' => 'int',
		'status' => 'bool',
		'record_time' => 'int',
		'update_time' => 'int'
	];

	protected $fillable = [
		'name',
		'pid',
		'order',
		'status',
		'record_time',
		'update_time'
	];
}
