<?php

use Faker\Generator as Faker;
use Illuminate\Support\Facades\Redis;
$factory->define(App\Models\Classify::class, function (Faker $faker) {
//     return [
// 		'name'=>$faker->name,
// 		'pid'=>0,
// 		'order'=>0,
// 		'status'=>1,
// 		'record_time'=>time(),
// 		'update_time'=>time()
// 	];
    
    return [
        'name'=>$faker->name,
        'pid'=>Redis::sRandMember('seeder_classify'),
        'order'=>0,
        'status'=>1,
        'record_time'=>time(),
        'update_time'=>time()
    ];
});
