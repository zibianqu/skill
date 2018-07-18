<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;

class ClassifyTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $classify=DB::table('Classify')->get();
        $arr=array();
        foreach ($classify as $key=>$val)
        {
            $arr['id']=$val->id;
            $arr['name']=$val->name;
            $arr['pid']=$val->pid;
            $arr['order']=$val->order;
        }
        var_dump($arr);
//         $data=$this->treeSort($arr, 0);
//         var_export($data);
        $this->assertTrue(true);
    }
    
    function treeSort($data,$pid)
    {   $tree=array();
        foreach ($data as $key=>$val)
        {
            if($val['pid']==$pid)
            {
                $val['classify']=$this->treeSort($data, $val['id']);
                $tree[$pid][]=$val;
            }
        }
        return $tree;
    }
}
