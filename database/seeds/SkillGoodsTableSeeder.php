<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\DB;

class SkillGoodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
//         die("请注释我");
        Redis::del('goods_ids');//预先删除
        $actives=DB::table('skill_active')->where('start_time','>',time())->get(['id']);
        foreach ($actives as $key=>$val)
        {
                Redis::sadd('active_ids',$val->id);
        }
        $goods=DB::table('goods')->where('status','=',1)->get(['id']);
        foreach ($goods as $key=>$val)
        {
            Redis::sadd('goods_ids',$val->id);
        }
        for($i=0;$i<30;$i++)
        {
            $isrepeat=1;
            while($isrepeat)
            {
                $goods_id=Redis::sRandMember('goods_ids');
                if(Redis::sadd('test_goods',$goods_id))//这里是避免商品重复 
                {
                    Redis::rpush('rand_goods_ids',$goods_id);
                    $isrepeat=0;
                }
            }
           
        }
        factory(App\Models\SkillGood::class, Redis::llen('rand_goods_ids'))->create();
    }
}
