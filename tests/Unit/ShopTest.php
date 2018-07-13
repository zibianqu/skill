<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class ShopTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {

        $result=DB::table('user')->where('type',2)->get(['id']);
//         var_export($result);
        //$result 返回的是一个stdClass集合
        foreach ($result as $key=>$val)
        {
            //echo $val->id;
            Redis::rpush('user_ids',$val->id);
        }
    
        echo Redis::llen('user_ids');
        Redis::del('user_ids');
        $this->assertTrue(true);
    }
}
