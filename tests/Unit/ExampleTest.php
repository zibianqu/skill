<?php
/*
 |-------------------------------------------------------------------------------------
 |单元测试，
 |-------------------------------------------------------------------------------------
 |单元测试专注于小的、相互隔离的代码，实际上，大部分单元测试可能都是聚焦于单个方法
 |
 */
//+++++++++++++++++++++++++++++++++++++++++++++
//单元测试，
//单元测试专注于小的、相互隔离的代码，实际上，大部分单元测试可能都是聚焦于单个方法
//++++++++++++++++++++++++++++++++++++++++++++
namespace Tests\Unit;

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
        $this->assertTrue(true);
    }
}
