<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 13 Jul 2018 10:21:33 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Good
 * 
 * @property int $id
 * @property string $goods_name
 * @property string $shop_id
 * @property string $goods_no
 * @property int $goods_type
 * @property int $goods_num
 * @property float $goods_price
 * @property bool $status
 * @property int $record_time
 * @property int $update_time
 *
 * @package App\Models
 */
class Good extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'goods_type' => 'int',
		'goods_num' => 'int',
		'goods_price' => 'float',
		'status' => 'bool',
		'record_time' => 'int',
		'update_time' => 'int'
	];

	protected $fillable = [
		'goods_name',
		'shop_id',
		'goods_no',
		'goods_type',
		'goods_num',
		'goods_price',
		'status',
		'record_time',
		'update_time'
	];
}
