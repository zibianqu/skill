<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 13 Jul 2018 10:21:34 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class SkillGood
 * 
 * @property int $id
 * @property int $active_id
 * @property int $goods_id
 * @property bool $type
 * @property int $record_time
 * @property int $update_time
 *
 * @package App\Models
 */
class SkillGood extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'active_id' => 'int',
		'goods_id' => 'int',
		'type' => 'bool',
		'record_time' => 'int',
		'update_time' => 'int'
	];

	protected $fillable = [
		'active_id',
		'goods_id',
		'type',
		'record_time',
		'update_time'
	];
}
