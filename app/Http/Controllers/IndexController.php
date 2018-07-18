<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index()
    {
        
        $classify=DB::table('Classify')->get();
        $arr=array();
        foreach ($classify as $key=>$val)
        {
            $arr[$key]['id']=$val->id;
            $arr[$key]['name']=$val->name;
            $arr[$key]['pid']=$val->pid;
            $arr[$key]['order']=$val->order;
        }
//         var_dump($arr);
                $data=$this->treeSort1($arr, 0);
                var_export($data);
        
        
        
        try {
            $title = '首页';
            DB::connection()->enableQueryLog();
            //获取秒杀活动
            $actives=DB::table('skill_active')
                ->select('id')
                ->where('end_time','>',time())
                ->get();
            $activeIds=array();
            //将秒杀活动的id放入数组
            foreach ($actives as $val){
                $activeIds[]=$val->id;
            }
            $skillGoods=DB::table('skill_goods')
                ->join('goods', 'skill_goods.goods_id','=','goods.id')
                ->select('goods.id','goods.goods_name','goods.shop_id','goods.goods_price',DB::raw('skill_goods.id as sg_id'))
                ->whereIn('skill_goods.active_id',$activeIds)
                ->limit(9)
                ->get();
            
            // 获取查询日志
            $queries = DB::getQueryLog();
            // 即可查看执行的sql，传入的参数等等
            //dd($queries);
            return view('index',compact('title','skillGoods'));
        }catch (\Exception $e){
            dd($e);
            $title = '404';
            return view('404',compact('title'));
        }
        
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
    
    function treeSort1($data)
    {
        $data1=$this->format($data);
        $tree=array();
        $refer=array();
        foreach ($data as $key=>$value){
            $refer[$value['id']]=&$data[$key];
        }
        foreach ($data as $key=>$value)
        {
            if($value['pid']==0)
            {
               $tree[]= &$data[$key];
            }else{
                $refer[$value['pid']]['classify'][] = &$data[$key];
            }
            
        
        }
        return $tree;
    }
    
    function format($data){
        $arr=array();
        foreach ($data as $key=>$val)
        {
            $arr[$val['id']]=$val;
        }
        return $arr;
    }
}