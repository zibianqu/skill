<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 14 Jul 2018 09:07:53 +0000.
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
