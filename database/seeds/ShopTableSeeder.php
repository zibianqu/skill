<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class ShopTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        die('请注释我');
        Redis::del('user_ids');//预先删除
        $result=DB::table('user')->where('type',2)->get(['id']);
        foreach ($result as $key=>$val)
        {
            Redis::rpush('user_ids',$val->id);
        }
        echo "\n 商户数量：".Redis::llen('user_ids')."个 \n";
        factory(App\Models\Shop::class, Redis::llen('user_ids'))->create();
    }
}
