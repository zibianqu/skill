<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class SkillOrderController extends Controller
{
    //
    
    /**
     * 确认订单
     * @throws \Exception
     */
    public function orderStep1()
    {
       
        try{
            if(!session('user'))//判断是否登陆
                return redirect("/login");
            $order=array();
            $order['goods_id']=isset($_POST['goods_id'])?intval($_POST['goods_id']):0;
            if(!Redis::get('goods_stock_'.$order['goods_id']))//判断该商品是否有库存
            {
                $title="很抱歉，你所秒杀的商品已售罄。";
                return view("404",compact('title'));
            }
            $order['count']=isset($_POST['count'])?intval($_POST['count']):1;
            $goods=DB::table('goods')
                ->where('id','=',$order['goods_id'])
                ->where('status','=',1)
                ->first();
            $order['order_id']=$this->getOrderId();
            $order['user_id']=session('user')->id;
            $order['goods_name']=$goods->goods_name;
            $order['price']=$goods->goods_price;
            $order['all_money']=$goods->goods_price*$order['count'];
            $order['record_time']=time();
            $order['update_time']=time();
            if(!session('skill_goods_order_'.$order['goods_id']))//判断是否有该商品的未支付订单
            {
                Redis::decr('goods_stock_'.$order['goods_id']);//库存-1，这个要放在创建订单前面
                if(DB::table('order')->insert($order)){
                    //订单创建成功，放入session
                    session(['skill_goods_order_'.$order['goods_id']=>$order['order_id']]);//保存到sesssion
                
                }else{
                    //创建失败加库存
                    $redis->incr('goods_stock_'.$order['goods_id']);//库存+1
                    throw new \Exception('由于网络原因，秒杀失败');
                }
            }
           
            $title="确认订单";
            return view('order_step1',compact('title','order'));
        }catch (\Exception $e){
            dd($e);
            $title="404";
            return view('404',compact('title'));
        }
    }
    
    /**
     * 生成订单号
     * @return string
     */
    public function getOrderId()
    {
        return $danhao = date('Ymd').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);
    }
    
    /**
     * 选择支付方式
     */
    public function orderStep2()
    {
        try{
            if(!session('user'))//判断是否登陆
                return redirect("/login");
            $order_id=isset($_POST['order_id'])?$_POST['order_id']:"";    
            
            $title="选择支付方式";
            return view('order_step2',compact('title','order_id'));
        }catch (\Exception $e){
            $title="404";
            return view('404',compact('title'));
        }
    }
    
    //支付接口调用
    public function orderStep3()
    {
        try{
            if(!session('user'))//判断是否登陆
                return redirect("/login");
                $order_id=isset($_POST['order_id'])?$_POST['order_id']:"";
        
                $title="选择支付方式";
                return view('order_step2',compact('title','order_id'));
        }catch (\Exception $e){
            $title="404";
            return view('404',compact('title'));
        }
    }
    
    /**
     * 订单管理,这里要去更新失效的订单状态
     */
    public function orderManager()
    {
        //    
    }
    
}
