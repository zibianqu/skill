<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 14 Jul 2018 09:07:53 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class SkilActive
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
class SkilActive extends Eloquent
{
	protected $table = 'skil_active';
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
