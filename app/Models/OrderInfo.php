<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 11 Jul 2018 03:52:19 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class OrderInfo
 * 
 * @property int $id
 * @property string $order_id
 * @property string $order_info
 * @property int $record_time
 * @property int $update_time
 *
 * @package App\Models
 */
class OrderInfo extends Eloquent
{
	protected $table = 'order_info';
	public $timestamps = false;

	protected $casts = [
		'record_time' => 'int',
		'update_time' => 'int'
	];

	protected $fillable = [
		'order_id',
		'order_info',
		'record_time',
		'update_time'
	];
}
