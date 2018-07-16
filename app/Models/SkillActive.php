<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 16 Jul 2018 07:01:49 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class SkillActive
 * 
 * @property int $id
 * @property string $title
 * @property string $descript
 * @property int $start_time
 * @property int $end_time
 * @property int $record_time
 * @property int $update_time
 *
 * @package App\Models
 */
class SkillActive extends Eloquent
{
	protected $table = 'skill_active';
	public $timestamps = false;

	protected $casts = [
		'start_time' => 'int',
		'end_time' => 'int',
		'record_time' => 'int',
		'update_time' => 'int'
	];

	protected $fillable = [
		'title',
		'descript',
		'start_time',
		'end_time',
		'record_time',
		'update_time'
	];
}
