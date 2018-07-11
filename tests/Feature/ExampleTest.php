<?php

/*
 |----------------------------------------------------------------------------
 |功能测试
 |----------------------------------------------------------------------------
 |功能测试可用于测试较大区块的代码，包括若干组件之前的交互，甚至一个完整的HTTP请求 
 |
 */

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
