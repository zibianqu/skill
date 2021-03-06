<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 20 Jul 2018 07:29:06 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Order
 * 
 * @property int $id
 * @property string $order_id
 * @property int $user_id
 * @property int $goods_id
 * @property string $goods_name
 * @property int $count
 * @property float $price
 * @property float $all_money
 * @property int $pay_way
 * @property bool $is_pay
 * @property bool $send_goods
 * @property bool $is_finished
 * @property int $record_time
 * @property int $update_time
 *
 * @package App\Models
 */
class Order extends Eloquent
{
	protected $table = 'order';
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int',
		'goods_id' => 'int',
		'count' => 'int',
		'price' => 'float',
		'all_money' => 'float',
		'pay_way' => 'int',
		'is_pay' => 'bool',
		'send_goods' => 'bool',
		'is_finished' => 'bool',
		'record_time' => 'int',
		'update_time' => 'int'
	];

	protected $fillable = [
		'order_id',
		'user_id',
		'goods_id',
		'goods_name',
		'count',
		'price',
		'all_money',
		'pay_way',
		'is_pay',
		'send_goods',
		'is_finished',
		'record_time',
		'update_time'
	];
}
