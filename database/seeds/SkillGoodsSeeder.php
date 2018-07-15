<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\DB;

class SkillGoodsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Redis::del('goods_ids');//预先删除
        $actives=DB::table('skill_active')->where('start_time','>',time())->get(['id']);
        foreach ($actives as $key=>$val)
        {
                Redis::sadd('active_ids',$val->id);
        }
        $actives=DB::table('skill_goods')->where('status','=',1)->get(['id']);
        foreach ($actives as $key=>$val)
        {
            Redis::sadd('goods_ids',$val->id);
        }
        Redis::rpush('goods_ids');
        factory(App\Models\SkillGood::class, Redis::llen('goods_ids'))->create();
    }
}
