<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;


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
                ->select('goods.id','goods.goods_name','goods.goods_num','goods.shop_id','goods.goods_price',DB::raw('skill_goods.id as sg_id'))
                ->whereIn('skill_goods.active_id',$activeIds)
                ->limit(9)
                ->get();
            
            // 获取查询日志
            $queries = DB::getQueryLog();
            // 即可查看执行的sql，传入的参数等等
            //dd($queries);
            $this->setSkillGoodsInitRedis($skillGoods);
            return view('index',compact('title','skillGoods'));
        }catch (\Exception $e){
            dd($e);
            $title = '404';
            return view('404',compact('title'));
        }
        
    }
    
    /**
     * 商品库存初始化
     * @param unknown $goods
     */
    function setSkillGoodsInitRedis($goods)
    {
        foreach ($goods as $val)
        {
            if(!Redis::exists('goods_stock_'.$val->id)){
                Redis::set('goods_stock_'.$val->id,$val->goods_num);//设置商品库存
            }
        }
    }
    
   /**
    * 算出两个时间的差
    */
    function makeTime()
    {
//         $start=strtotime('2018-07-19 16:52:30');
//         $end=strtotime('2018-07-17 10:30:50');;
//         $diff=$start-$end;
//         echo $date=floor($diff/86400);echo "\n";
//         echo $hour=floor($diff%86400/3600);echo "\n";
//         echo $minute=floor($diff%3600/60);echo "\n";
//         echo $minute=floor($diff%86400%60);echo "\n";
        
        $startdate="2011-3-15 11:50:00";
        
        $enddate="2012-12-12 12:12:12";
        
        $date=floor((strtotime($enddate)-strtotime($startdate))/86400);
        echo "相差天数：".$date."天<br/><br/>";
        
        $hour=floor((strtotime($enddate)-strtotime($startdate))%86400/3600);
        echo "相差小时数：".$hour."小时<br/><br/>";
        
        $minute=floor((strtotime($enddate)-strtotime($startdate))%3600/60);
        echo "相差分钟数：".$minute."分钟<br/><br/>";
        
        $second=floor((strtotime($enddate)-strtotime($startdate))%86400%60);
        echo "相差秒数：".$second."秒";
    }
    
    //分类
    function sort()
    {
        $classify=DB::table('Classify')->get();
        $data=array();
        foreach ($classify as $key=>$val)
        {
            $data[$key]['id']=$val->id;
            $data[$key]['name']=$val->name;
            $data[$key]['pid']=$val->pid;
            $data[$key]['order']=$val->order;
        }
        $data =$this->recursionSort($data,0);
//         $data= $this->foreachSort($data);
//         $data= $this->foreachSort1($data);
        return $data;
    }
    
    /**
     * 递归排序 无限极分类
     * @param unknown $data 分类数组
     * @param unknown $pid  父级id
     * @return unknown[][]
     */
    function recursionSort($data,$pid)
    {
        $tree=array();
        foreach ($data as $val)
        {
            if($pid==$val['pid'])
            {
                $val['classify']=$this->recursionSort($data, $val['id']);//这里是知识点
                $tree[]=$val;
                
            }
        }
        return $tree;
    }
    /**
     * copy的网上的，真的很厉害这个分类
     * 循环无限极分类， 指针指向
     * @param unknown $data
     * @return unknown[] 
     */
    function foreachSort($data)
    {
        $foramt=array();
        foreach ($data as $key=>$val)
        {
            $foramt[$val['id']]=&$data[$key];
        }
        $tree=array();
        foreach ($data as $key=>$val)
        {
            if($val['pid']==0)
            {
                $tree[]=&$foramt[$val['id']];
            }else{
                $foramt[$val['pid']]['classify'][]=&$data[$key];
            }
        }
        return $tree;
    }
    
    /**
     * copy的网上的，真的很厉害这个分类
     * 循环无限极分类
     * @param unknown $data
     * @return unknown[]
     */
    function foreachSort1($data)
    {
        $format=array();
        $tree=array();
        foreach($data as $key=>$val)
        {
            $format[$val['id']]=&$data[$key];//这里我刚开始用的&$val,不能这样用，
                                             //因为$val 是复制出来的值所以你指向她没有用
        }
        foreach($data as $key=>$val)
        {
            if($val['pid']==0)
            {
                $tree[]=&$data[$key];
                $tree[]=&$foramt[$val['id']];
            }else{
                $format[$val['pid']]['classify'][]=&$data[$key];
            }
        }
        return $tree;
    }
    
//     function treeSort($data,$pid)
//     {   $tree=array();
//         foreach ($data as $key=>$val)
//         {
//             if($val['pid']==$pid)
//             {
//                 $val['classify']=$this->treeSort($data, $val['id']);
//                 $tree[$pid][]=$val;
//             }
//         }
//         return $tree;
//     }
    
//     function treeSort1($data)
//     {
//         $data1=$this->format($data);
//         $tree=array();
//         $refer=array();
//         foreach ($data as $key=>$value){
//             $refer[$value['id']]=&$data[$key];
//         }
//         foreach ($data as $key=>$value)
//         {
//             if($value['pid']==0)
//             {
//                $tree[]= &$data[$key];
//             }else{
//                 $refer[$value['pid']]['classify'][] = &$data[$key];
//             }
            
        
//         }
//         return $tree;
//     }
    
//     function format($data){
//         $arr=array();
//         foreach ($data as $key=>$val)
//         {
//             $arr[$val['id']]=$val;
//         }
//         return $arr;
//     }
}