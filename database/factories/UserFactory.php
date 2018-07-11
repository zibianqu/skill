<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\User::class, function (Faker $faker) {
    $dateTimeThisMonth=$faker->dateTimeThisMonth();//返回的是DateTime类
    $dateTime=$dateTimeThisMonth->format("Y-m-d H:i:s");//$dateTimeThisMonth->format("Y-m-d H:i:s")将时间格式（DateTime）转化为字符串
    $time=strtotime($dateTime);
    return [
        //
        'email'=>$faker->safeEmail,
        'name'=>$faker->name,
        'type'=>function(){
                    $rand=rand(1,10);
                    return $rand>8?2:1;//1为普通用户，2为商户
                },
        'record_time'=>$time,
        'update_time'=>$time,
    ];
});
