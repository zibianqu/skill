<?php

use Faker\Generator as Faker;
use Illuminate\Support\Facades\Redis;

$factory->define(\App\Models\User::class, function (Faker $faker) {
    $dateTimeThisMonth=$faker->dateTimeThisMonth();//返回的是DateTime类(是类)
    $dateTime=$dateTimeThisMonth->format("Y-m-d H:i:s");//$dateTimeThisMonth->format("Y-m-d H:i:s")将时间格式（DateTime）转化为字符串
    $time=strtotime($dateTime);
    $email='';
    if(Redis::sAdd('email',$email))//将email放入redis中避免重复
    {
        $email=$faker->email;
        echo "\n";
        echo "old  ".$email;
    }
    else
    {//这里为了避免数据库重复特意加了前缀
        $flag=false;
        while(!$flag)
        {
            $str='abcdefghijklmnopqrstuvwxwz0123456789';
            $prfix="";
            for($i=0;$i<5;$i++)
            {
                $prfix.=$str[rand(0,strlen($str)-1)];
            }
            $email=$prfix.$faker->email;
            Redis::sAdd('email',$email)&&$flag=true;
        }
        echo "\n";
        echo "new  ".$email;
    }
    
    
    return [
        //
        'email'=>$email,
        'name'=>$faker->name,
        'type'=>function(){
                    $rand=rand(1,10);
                    return $rand>9?2:1;//1为普通用户，2为商户
                },
        'record_time'=>$time,
        'update_time'=>$time,
        ];
});
