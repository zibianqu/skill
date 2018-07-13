<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class GoodsTableSeeder extends Seeder
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
        $shops=DB::table('shop')->get(['id']);
        foreach ($shops as $val){
            Redis::sAdd('shop_ids',$val->id);
        }
        factory(App\Models\Good::class,1000)->create();
    }
}
