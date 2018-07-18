<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index()
    {
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
}