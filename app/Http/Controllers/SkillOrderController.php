<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Alipay;
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
            $this->isLogin();
            
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
            $this->isLogin();
            
            $order_id=isset($_POST['order_id'])?$_POST['order_id']:"";    
            $title="选择支付方式";
            return view('order_step2',compact('title','order_id'));
        }catch (\Exception $e){
            $title="404";
            return view('404',compact('title'));
        }
    }
    
    //支付接口调用
    public function orderStep3(Request $request)
    {
        try{
            $this->isLogin();
            //开启sql日志查询
            DB::connection()->enableQueryLog();
            $order_id=$request->input('order_id','');
            $pay_way=$request->input('pay_way',1);
            $orderinfo=DB::table('order')
                ->select('order_id','goods_id','goods_name','user_id','count','price','all_money')
                ->where('order_id','=',$order_id)
                ->where('is_finished','=',0)
                ->first();
            $queries = DB::getQueryLog();
//             dd($orderinfo);
            if(!$orderinfo)
                throw new \Exception("订单不存在");
            switch ($pay_way)
            {
                case 1://支付报支付方式
                    
                    //更新订单支付方式
                    $status=DB::table('order')
                            ->where('order_id','=',$order_id)
                            ->where('is_finished','=',0)
                            ->update(['pay_way'=>$pay_way]);
                    
                    $this->alipay($orderinfo);
                    
                    
                case 2://微信支付方式
                    break;
                default:
            }
            
                
                
        }catch (\Exception $e){
            dd($e);
            $title="404";
            return view('404',compact('title'));
        }
    }
    
    /**
     * 支付宝支付
     * @param unknown $orderinfo
     */
    private function alipay($orderinfo)
    {         
        //构造参数
        $alipay=new Alipay();
        $aop = $alipay->aopClient;
        $aop->gatewayUrl = 'https://openapi.alipaydev.com/gateway.do';
        $aop->appId = '2016091800539461';
        $aop->rsaPrivateKey = 'MIIEowIBAAKCAQEAuFOvTGM6H1K3CD4Nc3VuBu6CPsPpkNT7o6agFAAcE3lpv0pHnl8sn0w/3pTcoIahTJWJ3f7Yby2fcVMh3NQ98V04SnPu5utc5n/Y78rp56qN0ejSJWNLFEAG1P8JVXSIQl4fgd+OyARN4Gj/7kNfWjgx3XVt18EVjMfDEyFuzXsnNnxHlwXnCMwKQJ6DcoXIAQq502Mys8T2B0QmlmHSskD1xAeoAp8nM/EOU+na0eAlkl4LaDzghIwF1Knsr0tzuqwUkEV1aXC+1S1I40tM8TM2pu34am7HI3tsZxaANyf2trAPmZqcygJ4e6hGaiM57zzsBDtTzxOZp3TRoaEv/wIDAQABAoIBABj3lN4G7r+BZ7NhHFdQR6f+tHul88QfZTpkfnhXD3Z/0pgLiqnkAFpPbLNMfJntwnlqI/OC6nQcvOUPup17ziwcUVycWXbD2KCMHqlUVdyAWJdfLt/LlEbY6VP+e5gsoaxDrYbc7i0fkCDeeBQg4hCJXg++MTOxPqcEA+NaevSwB7Ef1klpmTG9Kt4ONTSUWAxYdYnZA83T7Mua1kpt6VghtOFoBbx083nzbID8LnKgkausNKhxSS3Ld2NGauym6CddM6dO1H7RAGclg3swRg7o7VtXZlmXp6UNK7HsTBZTEUF5WGpoWo4ktm8G9nQGZLuyDx6gTH/kinPeb6tzC8ECgYEA7CQhjZZqcA7REAOZItkN04laYRnqoxJZX23ArLxtl40OyzgGuMjXnYNL7XQ1HFP7RD4DbPvo0u6lRMDybkvWu0j7OBrpHW6v48AJyNidjqW/sPavJTkmWd6HHm9ovc48HL+Ic92kG7QODYuxoXl3dBDNkWQU/H0cmPtZkqBkOKECgYEAx9QMPrXVCbKJbCxSQOIY2yf+RZEcHVkLE5Ic1681nVbiI4kuJjUAUqs57B3GlSvvMiDSsXAbmRqvNLLEYPidKGM7hDn/Osa216zjv7JwkdIDMDQED5SpFj42HxokHNRl7+zBaFncWUYxp3oeHEZErpf1objEDjzaljA/ewzPhJ8CgYABlPBgmWxXGdJOsCd7c0bDbv0a/2hx9TKCECMlRRHa3QgHVnW9ESNYm8OLcKbWbL2XJG8zcLCLkSusPTqigIGMuZ1tL8j1+ILXHLc0EDdl+DhDgDOGJU7bdUEkdAyYkOQYMTRBym9J/DfH4XKsKTsinOYznh8B3fiuEaj08XwaYQKBgBs/7l+K2j9VSmom7RyN+IfCP2lrLWNPJjSIA0jiSrRnCbWA2ns5VQ7w7JgnQ1JKSHcUhMbPm+PYALZ1/lOe84dzaMVSR1zThlGI8RHOGo24Dtk+7qLVSe2PlD/Ph8cqq6/5IDLDtkmySckl3P9MEcehT0y7bnjmkYRTlgSIra/PAoGBAIto8q5sSKRJzz6H42QYiMEhbwcvojJpjSYV0cAle0naVhlYCcECsFt40qVKuFcORSDzmPZ0MmomS5jdE2fpHw0FfwOCtGYuxR4bX6L2kfqsBhLdRwcKPdLMxMtUhhgJYIBsDlKTYrgIlmIoiNgbl2AiJMmvicvRiyzhAxg+PTIq';
        $aop->apiVersion = '1.0';
        $aop->signType = 'RSA2';
        $aop->postCharset= 'utf-8';
        $aop->format='json';
        $request = $alipay->alipayTradePagePayRequest;
        $request->setReturnUrl('http://xyu3010420001.my3w.com?r=1');
        $request->setNotifyUrl('http://xyu3010420001.my3w.com?r=1');
        //                 $request->setBizContent('{"product_code":"FAST_INSTANT_TRADE_PAY","out_trade_no":"20150320010101002","subject":"Iphone6 16G","total_amount":"88.88","body":"Iphone6 16G"}');
        
        $arr['product_code']='FAST_INSTANT_TRADE_PAY';
        $arr['out_trade_no']=$orderinfo->order_id;
        $arr['subject']=$orderinfo->goods_name;
        $arr['total_amount']=$orderinfo->all_money;
        $arr['body']="";
        $request->setBizContent(json_encode($arr,true));
        $result = $aop->pageExecute ($request);
        //输出
        echo $result;
    }
    
    /**
     * 修改订单
     * 订单回掉
     */
    public function notify(Request $request){
        try {
            
            $order_id=$request->get('order_id','');
            $is_pay=0;
            if(1==1)
            {//校验回掉参数
            
                $is_pay=1;
            }
            if(!$is_pay)
                throw new \Exception("参数不正确");
            $status=DB::table('order')
                ->where('order_id','=',$order_id)
                ->where('is_finished','=',0)
                ->update(['is_pay'=>$is_pay,'is_finished'=>1]);
            if($status)
                echo  "订单完成";
            else 
                echo "订单处理失败";
        }catch (\Exception $e){
            dd($e);
        }
        
        
        
    }
    
    /**
     * 判断是否登陆
     */
    public function isLogin($url="/login"){
        if(!session('user'))//判断是否登陆
            return redirect($url);
    }
    
    
    /**
     * 订单管理,这里要去更新失效的订单状态
     */
    public function orderManager()
    {
        //    
    }
    
}
