@extends('layout')
@section('content')
@include('header')

<div class="mens">    
  <div class="main">
   <div class="wrap">
   <ul class="breadcrumb breadcrumb__t"><a class="home" href="#">Home</a> / <a href="#">Dolor sit amet</a> / Lorem ipsum dolor sit amet</ul>
     <div class="panel panel-default">
          <!-- Default panel contents -->
          <form action="{{url('pay')}}" method="post">
              <div class="pay-order">
                  <div class="panel-heading h4">请选择支付方式</div>
                  <br/>
               	  	
                  <div class="form-check">
                   	  	<div class="panel-heading h6">请选择平台支付</div>
                           <div class="form-check-inline">
                              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                              <label class="form-check-label" for="inlineRadio1">支付宝</label>
                            </div>
                            <div class="form-check-inline">
                              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                              <label class="form-check-label" for="inlineRadio2">易付宝</label>
                            </div>
                   		<br/><br/>
                		<div class="panel-heading h6">请选择银行卡支付</div>
                       <div class="form-check-inline">
                          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                          <label class="form-check-label" for="inlineRadio3">招商</label>
                        </div>
                        <div class="form-check-inline">
                          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio4" value="option4">
                          <label class="form-check-label" for="inlineRadio4">工商</label>
                        </div>
                        <div class="form-check-inline">
                          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio5" value="option5">
                          <label class="form-check-label" for="inlineRadio5">农业</label>
                        </div>
                         <div class="form-check-inline">
                          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio6" value="option6">
                          <label class="form-check-label" for="inlineRadio6">中国银行</label>
                        </div>
                         <br/>
                        
                       <div class="form-check-inline">
                          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio7" value="option7">
                          <label class="form-check-label" for="inlineRadio7">建设</label>
                        </div>
                        <div class="form-check-inline">
                          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio8" value="option8">
                          <label class="form-check-label" for="inlineRadio8">中信</label>
                        </div>
                        <div class="form-check-inline">
                          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio9" value="option9">
                          <label class="form-check-label" for="inlineRadio9">交通</label>
                        </div>
                         <div class="form-check-inline">
                          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio10" value="option10">
                          <label class="form-check-label" for="inlineRadio10">兴业</label>
                        </div>
                    </div>
              </div>
              <br/>
              <br/>
              <div class="row">
             
                <div class="col">
                   <div class="card text-right" style="width:100%;float:right">
                      <div class="card-body">
                        
                        	<input type="hidden" name="order_id" value="{{$order_id}}"/> 
                        	<a href="javascript:;" class="btn btn-primary">下一步</a>
                        
                      </div>
                    </div>
                </div>
              </div>
          </form>
               
        </div>
    
     </div>
  </div>
</div>
@include('footer')
<div style="display:none"></div>
@endsection