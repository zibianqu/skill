<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Redis;

class UserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $str='abcdefghijklmnopqrstuvwxwz0123456789';
        for($i=0;$i<5;$i++)
        {
            Redis::set('test1',$str[rand(0,strlen($str)-1)]);
        }
        var_export(Redis::del('test1'));
        $this->assertTrue(true);
    }
}
