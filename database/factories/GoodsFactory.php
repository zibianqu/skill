<?php

use Faker\Generator as Faker;
use Illuminate\Support\Facades\Redis;

$factory->define(App\Models\Good::class, function (Faker $faker) {
    $dateTimeThisMonth=$faker->dateTimeThisMonth();//返回的是DateTime类(是类)
    $dateTime=$dateTimeThisMonth->format("Y-m-d H:i:s");//$dateTimeThisMonth->format("Y-m-d H:i:s")将时间格式（DateTime）转化为字符串
    $time=strtotime($dateTime);
    return [
		'goods_name'=>$faker->title,
		'shop_id'=>Redis::sRandMember('shop_ids'),
		'goods_no'=>function(){
                		$str='abcdefghijklmnopqrstuvwxwz0123456789';
                		$prfix="";
                		for($i=0;$i<9;$i++)
                		{
                		    $prfix.=$str[rand(0,strlen($str)-1)];
                		}
                		return $prfix;
		              },
		'goods_type'=>rand(20,50),
		'goods_num'=>rand(50,100),
		'goods_price'=>rand(20,200),
		'status'=>function(){
                    		$rand=rand(1,10);
                    		return $rand>9?0:1;//0为下架，1为上架
		              },
		'record_time'=>$time,
		'update_time'=>$time
	];
});
