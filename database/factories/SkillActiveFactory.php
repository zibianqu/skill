<?php

use Faker\Generator as Faker;

$factory->define(App\Models\SkillActive::class, function (Faker $faker) {
    return [
		'title'=>'限时秒杀活动',
		'descript'=>'赶快来呀限时秒杀呀',
		'start_time'=>strtotime('2018-08-31 18:00:00'),
		'end_time'=>strtotime('2018-09-02 20:00:00'),
		'record_time'=>time(),
		'update_time'=>time()
	];
});
