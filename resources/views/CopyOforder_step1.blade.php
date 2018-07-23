@extends('layout')
@section('content')
@include('header')

<div class="mens">    
  <div class="main">
     <div class="wrap">
     <div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading h4">确认订单信息</div>
  <div class="panel-body">
    <p  class="h6">    
   
   
    </p>
  </div>

 <!-- Table -->
 <table class="table table-bordered" style="text-align:center;">
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
      <td><img class="a" id="img1" src="{{URL::asset('images/s1.jpg')}}" alt="" rel="{{URL::asset('images/s-img.jpg')}}" />DR.</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td style="text-align:right;">41.86</td>
    </tr>
    <tr>
      <td><img class="a" id="img1" src="{{URL::asset('images/s1.jpg')}}" alt="" rel="{{URL::asset('images/s-img.jpg')}}" />DR.</td>
      <td>Thornton</td>
      <td>@fat</td>
      <td style="text-align:right;">41.86</td>
    </tr>
    <tr>
      <td colspan="4" style="text-align:right;">¥ 41.86</td>
      
    </tr>
  </tbody>
</table>

  <div class="row">
    <div class="col">
     
    </div>
    <div class="col">
       <div class="card text-right" style="min-width:30rem;float:right">
          <div class="card-body">
            <h5 class="card-title">实付款：¥ 41.86</h5>
            <p class="card-text">寄送至：四川 成都 双流 华阳镇 长江东二横街56号输气小苑二期三单元3楼4号</p>
            <p class="card-text">收货人：金元宝</p>
            <br/>
            <a href="#" class="btn btn-primary">提交订单</a>
          </div>
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