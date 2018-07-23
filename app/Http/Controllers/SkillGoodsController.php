<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class SkillGoodsController extends Controller
{
    
//     public function __construct()
//     {
//         $action = \Route::current()->getActionName();
//         list($class, $method) = explode('@', $action);//获取控制器名称和方法
//         $class = substr(strrchr($class,'\\'),1);
//         $return_url=serialize(url()->full());//获取当前url地址
    
//     }
    //
    /**
     * 秒杀商品
     * @param unknown $id
     * @throws \Exception
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    function skill($id){
        try{
            if(!session('user'))
                return redirect("/login/skill/{$id}");
            DB::connection()->enableQueryLog();
            $goods=DB::table('Goods')
            ->select('goods.id','goods.goods_name','goods.goods_price','goods.goods_num','goods.shop_id','shop.name','sa.start_time','sa.end_time','sa.title')
            ->join('shop','goods.shop_id','=','shop.id')
            ->join('skill_goods as sg','sg.goods_id','=','goods.id')
            ->join('skill_active as sa','sa.id','=','sg.active_id')
            ->where('sg.id','=',intval($id))
            ->where('goods.status','=',1)
            ->first();
            $queries = DB::getQueryLog();
            if(!$goods)
                throw new \Exception('很遗憾，该商品不存在');
                $title=$goods->goods_name."-秒杀商品";
                $time=time();//当前时间
                $remtime=0;//剩余时间,单位秒
                $start=$goods->start_time;//活动开始时间
                $end=$goods->end_time;//活动结束时间
                $status=0;//购买状态
                if($start>$time)
                {
                    $status=0;
                    $remtime=$start-$time;
                }
                elseif($time>=$start && $end>=$time)
                {
                    $status=1;
                    $remtime=$end-$time;
                }
                elseif($time>$end){
                    $status=2;
                }
                $setime=$end-$start;
                if(!Redis::get('goods_stock_'.$goods->id))//判断是否还有库存
                    $status=0;
                return view('skill',compact('title','goods','status','remtime','setime'));
        }catch (\Exception $e){
//                         dd($e);
            $title = '404';
            return view('404',compact('title'));
        }
    
    }
}
