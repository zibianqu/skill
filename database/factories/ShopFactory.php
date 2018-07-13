<?php

use Faker\Generator as Faker;
use Illuminate\Support\Facades\Redis;

$factory->define(App\Models\Shop::class, function (Faker $faker) {
    $dateTimeThisMonth=$faker->dateTimeThisMonth();//返回的是DateTime类(是类)
    $dateTime=$dateTimeThisMonth->format("Y-m-d H:i:s");//$dateTimeThisMonth->format("Y-m-d H:i:s")将时间格式（DateTime）转化为字符串
    $time=strtotime($dateTime);
    return [
		'user_id'=>Redis::lpop('user_ids'),
		'name'=>$faker->company,
		'record_time'=>$time,
		'update_time'=>$time
	];
});
