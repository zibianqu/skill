@extends('layout')
@section('content')
@include('header')

<div class="mens">    
  <div class="main">
     <div class="wrap">
     <div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading h4">请选择支付方式</div>
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
      <td><img class="a" id="img1" src="{{URL::asset('images/s1.jpg')}}" alt="" rel="{{URL::asset('images/s-img.jpg')}}" />444</td>
      <td>111</td>
      <td>222</td>
      <td style="text-align:right;">333</td>
    </tr>
  </tbody>
</table>

  <div class="row">
    <div class="col">
     
    </div>
    <div class="col">
       <div class="card text-right" style="min-width:30rem;float:right">
          <div class="card-body">
            <form action="">
            	<a href="javascript:;" class="btn btn-primary">下一步</a>
            </form>
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