<?php

use Faker\Generator as Faker;
use Illuminate\Support\Facades\Redis;

$factory->define(App\Models\SkillGood::class, function (Faker $faker) {
    return [
		'active_id'=>Redis::sRandMember('active_ids'),
		'goods_id'=>Redis::lpop('goods_ids'),
		'type'=>1,
		'record_time'=>time(),
		'update_time'=>time()
	];
});
