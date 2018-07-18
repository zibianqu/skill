@extends('layout')
@section('content')
	@include('header')
        <div class="login">
          	<div class="wrap">
				<div class="col_1_of_login span_1_of_login">
					<h4 class="title">New Customers</h4>
					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan</p>
					<div class="button1">
					   <a href="register.html"><input type="submit" name="Submit" value="Create an Account"></a>
					 </div>
					 <div class="clear"></div>
				</div>
				<div class="col_1_of_login span_1_of_login">
				<div class="login-title">
	           		<h4 class="title">Registered Customers</h4>
					<div id="loginbox" class="loginbox">
						<form action="{{url('login')}}" method="post" name="login" id="login-form">
						  {{csrf_field()}}
						  <fieldset class="input">
						    <p id="login-form-username">
						      <label for="modlgn_username">Email</label>
						      <input id="modlgn_username" type="text" name="email" value="noelia.glover@ward.com" class="inputbox" size="18" autocomplete="off">
						    </p>
						    <p id="login-form-password">
						      <label for="modlgn_passwd">Password</label>
						      <input id="modlgn_passwd" type="password" name="password" value="123456" class="inputbox" size="18" autocomplete="off">
						    </p>
						    
						    <p id="login-form-error">
						      <label for="modlgn_error">
    						      <span class="login_form_error">
    						      	@if(count($errors)>0)
    						      		@if(is_object($errors))
    						      			@foreach($errors->all() as $error)
    						      				{{$error}}
    						      			@endforeach
    						      		@else
    						      			{{$errors}}
    						      		@endif
    						      	@endif
    						      	@if(session('msg'))
    						      		{{session('msg')}}
    						      	@endif
    						      </span>
						      </label>
						    </p>
						    <div class="remember">
							    <p id="login-form-remember">
							      <label for="modlgn_remember"><a href="#">Forget Your Password ? </a></label>
							   </p>
							    <input type="submit" name="Submit" class="button" value="Login"><div class="clear"></div>
							 </div>
						  </fieldset>
						 </form>
					</div>
			    </div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
     @include('footer')
<div style="display:none"></div>
@endsection