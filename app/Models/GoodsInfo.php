<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 13 Jul 2018 10:21:34 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class GoodsInfo
 * 
 * @property int $id
 * @property int $goods_id
 * @property string $goods_info
 * @property int $record_time
 * @property int $update_time
 *
 * @package App\Models
 */
class GoodsInfo extends Eloquent
{
	protected $table = 'goods_info';
	public $timestamps = false;

	protected $casts = [
		'goods_id' => 'int',
		'record_time' => 'int',
		'update_time' => 'int'
	];

	protected $fillable = [
		'goods_id',
		'goods_info',
		'record_time',
		'update_time'
	];
}
