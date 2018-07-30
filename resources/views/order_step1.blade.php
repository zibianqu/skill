@extends('layout')
@section('content')
@include('header')

<div class="mens">    
  <div class="main">
     <div class="wrap">
     <ul class="breadcrumb breadcrumb__t"><a class="home" href="#">Home</a> / <a href="#">Dolor sit amet</a> / Lorem ipsum dolor sit amet</ul>
     <div class="pay-order">
         <div class="panel panel-default">
              <!-- Default panel contents -->
              <div class="panel-heading h4">确认订单信息</div>
              <div class="panel-body">
                <p  class="h6">    
               
               
                </p>
              </div>
            
             <!-- Table -->
             <table class="table " style="text-align:center;">
              <thead>
                <tr>
                  <th scope="col">店铺宝贝</th>
                  <th scope="col">单价</th>
                  <th scope="col">数量</th>
                  <th scope="col">小计</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><img class="a" id="img1" src="{{URL::asset('images/s1.jpg')}}" alt="" rel="{{URL::asset('images/s-img.jpg')}}" />{{$order['goods_name']}}</td>
                  <td>{{$order['price']}}</td>
                  <td>{{$order['count']}}</td>
                  <td style="text-align:right;">{{$order['all_money']}}</td>
                </tr>
               
              </tbody>
            </table>
    	</div>
	</div>
	<br/>
	<br/>
  <div class="row">
  
    <div class="col">
       <div class="card text-right" style="width:100%;float:right">
          <div class="card-body">
            <h5 class="card-title">实付款：{{$order['all_money']}}</h5>
            <p class="card-text">寄送至：四川 成都 双流 华阳镇 长江东二横街56号输气小苑二期三单元3楼4号</p>
            <p class="card-text">收货人：金元宝</p>
            <br/>
            <form action="{{url('skill_payway')}}" id="pay_order" method="post">
            	{{csrf_field()}}
            	<input type="hidden" name="order_id" value="{{$order['order_id']}}"/>
            	<a href="javascript:;" class="btn btn-primary" onclick="$('#pay_order').submit()">提交订单</a>
            </form>
          </div>
        </div>
    </div>
  </div>
       
</div>
    
  </div>
</div>
@include('footer')
<div style="display:none"></div>
@endsection