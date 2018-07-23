@extends('layout')
@section('content')
	@include('header')
<div class="mens">    
  <div class="main">
     <div class="wrap">
     	<ul class="breadcrumb breadcrumb__t"><a class="home" href="#">Home</a> / <a href="#">Dolor sit amet</a> / Lorem ipsum dolor sit amet</ul>
		<div class="cont span_2_of_3">
		  	<div class="grid images_3_of_2">
						<div id="container">
							<div id="products_example">
								<div id="products">
									<div class="slides_container">
									        <a href="#"><img class="a" id="img1" src="{{URL::asset('images/s-img.jpg')}}" alt="" rel="{{URL::asset('images/s-img.jpg')}}" /></a>
											<a href="#"><img class="a" id="img2" src="{{URL::asset('images/s-img1.jpg')}}" alt="" rel="{{URL::asset('images/s-img1.jpg')}}" /></a>
											<a href="#"><img class="a" id="img3" src="{{URL::asset('images/s-img2.jpg')}}" alt="" rel="{{URL::asset('images/s-img2.jpg')}}" /></a>
											<a href="#"><img class="a" id="img4" src="{{URL::asset('images/s-img3.jpg')}}" alt="" rel="{{URL::asset('images/s-img3.jpg')}}" /></a>
									</div>
									<ul class="pagination">
										<li><a href="#"><img src="{{URL::asset('images/s1.jpg')}}" width="s-img" alt="1144953 3 2x"></a></li>
										<li><a href="#"><img src="{{URL::asset('images/s2.jpg')}}" width="s-img1" alt="1144953 3 2x"></a></li>
										<li><a href="#"><img src="{{URL::asset('images/s3.jpg')}}" width="s-img2" alt="1144953 3 2x"></a></li>
										<li><a href="#"><img src="{{URL::asset('images/s4.jpg')}}" width="s-img3" alt="1144953 1 2x"></a></li><div class="clear"></div>
									</ul>
								</div>
							</div>
						</div>
	            </div>
		         <div class="desc1 span_3_of_2">
		        	<h3 class="m_3">{{$goods->title}}</h3>
		         	<h3 class="m_3">
		         		<span id="active_text">
    		         		@if($status==0)
        		         		距离活动开始还有
        		         	@elseif($status==1)
        		         		距离活动结束还有
        		         	@elseif($status==2)
        		         		活动已结束
        		         	@endif
    		         	</span>
    		         	<strong id="RemainD">1</strong>天<strong id="RemainH">12</strong>时<strong id="RemainM">12</strong>分<strong id="RemainS">12</strong>秒
		         	</h3>
		         	<h3 class="m_3">{{$goods->goods_name}}</h3>
		            <p class="m_5">¥{{$goods->goods_price}}</p>
		         	 <div class="btn_form_skill">
						<form action="{{url('/skill_confirm_order')}}" method="post">
						 	{{csrf_field()}}
							<input type="hidden" name="goods_id" value="{{$goods->id}}">
							<input type="hidden" name="count" value="1">
							<input type="submit" value="购买" disabled="disabled" title="">
						</form>
					 </div>
					<span class="m_link"><a href="#">login to save in wishlist</a> </span>
				     <p class="m_text2">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit </p>
			     </div>
			   <div class="clear"></div>	
	    <div class="clients">
	    <h3 class="m_3">10 Other Products in the same category</h3>
		 <ul id="flexiselDemo3">
			<li><img src="{{URL::asset('images/s5.jpg')}}" /><a href="#">Category</a><p>Rs 600</p></li>
			<li><img src="{{URL::asset('images/s6.jpg')}}" /><a href="#">Category</a><p>Rs 850</p></li>
			<li><img src="{{URL::asset('images/s7.jpg')}}" /><a href="#">Category</a><p>Rs 900</p></li>
			<li><img src="{{URL::asset('images/s8.jpg')}}" /><a href="#">Category</a><p>Rs 550</p></li>
			<li><img src="{{URL::asset('images/s9.jpg')}}" /><a href="#">Category</a><p>Rs 750</p></li>
		 </ul>
	<script type="text/javascript">
		$(window).load(function() {
			$("#flexiselDemo1").flexisel();
			$("#flexiselDemo2").flexisel({
				enableResponsiveBreakpoints: true,
		    	responsiveBreakpoints: { 
		    		portrait: { 
		    			changePoint:480,
		    			visibleItems: 1
		    		}, 
		    		landscape: { 
		    			changePoint:640,
		    			visibleItems: 2
		    		},
		    		tablet: { 
		    			changePoint:768,
		    			visibleItems: 3
		    		}
		    	}
		    });
		
			$("#flexiselDemo3").flexisel({
				visibleItems: 5,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,    		
				pauseOnHover: true,
				enableResponsiveBreakpoints: true,
		    	responsiveBreakpoints: { 
		    		portrait: { 
		    			changePoint:480,
		    			visibleItems: 1
		    		}, 
		    		landscape: { 
		    			changePoint:640,
		    			visibleItems: 2
		    		},
		    		tablet: { 
		    			changePoint:768,
		    			visibleItems: 3
		    		}
		    	}
		    });

		    $('.slides_container').show();
		    //倒计时
			GetRTime();
			var status="{{$status}}"
			if(status=="1"){
				setSkillButton(1);
			}else{
				setSkillButton(0);
			}
		});
		var remtime="{{$remtime}}";
		var status="{{$status}}";
		var runtimes = 0;
		//计算倒计时
		function GetRTime(){
		    var nMS = remtime*1000-runtimes*1000;
		    if (nMS>=0){
		        var nD=Math.floor(nMS/(1000*60*60*24))%24;
		        var nH=Math.floor(nMS/(1000*60*60))%24;
		        var nM=Math.floor(nMS/(1000*60)) % 60;
		        var nS=Math.floor(nMS/1000) % 60;
		        document.getElementById("RemainD").innerHTML=nD;
		        document.getElementById("RemainH").innerHTML=nH;
		        document.getElementById("RemainM").innerHTML=nM;
		        document.getElementById("RemainS").innerHTML=nS;
//		         if(nMS==5*60*1000)
//		         {
//		         	alert("还有最后五分钟！");
//		         }
		        if(nMS==0){
		        	if(status=="0"){
						setSkillButton(1);
						document.getElementById("active_text").innerHTML="距离活动结束还有";
						remtime="{{$setime}}";
						GetRTime();
					}else{
						setSkillButton(0);
					}
		        	return ;
		        }
		        runtimes++;
		        setTimeout("GetRTime()",1000);
		    }
		}
		//$flag=0 表示未开始或则结束，$flag=1表示正在进行中
		function setSkillButton($flag){
			if($flag){
				$('.btn_form_skill input[type="submit"]').css('background','#4CB1CA');
				$('.btn_form_skill input[type="submit"]').removeAttr('disabled');
			}else{
				$('.btn_form_skill input[type="submit"]').css('background','');
				$('.btn_form_skill input[type="submit"]').attr('disabled','disabled');
			}
		}
		
	</script>
	<script type="text/javascript" src="{{URL::asset('js/jquery.flexisel.js')}}"></script>
     </div>
     <div class="toogle">
     	<h3 class="m_3">Product Details</h3>
     	<p class="m_text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum.</p>
     </div>
     <div class="toogle">
     	<h3 class="m_3">More Information</h3>
     	<p class="m_text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum.</p>
     </div>
      </div>
			<div class="rsingle span_1_of_single">
				<h5 class="m_1">Categories</h5>
					<select class="dropdown" tabindex="8" data-settings='{"wrapperClass":"metro"}'>
						<option value="1">Mens</option>
						<option value="2">Sub Category1</option>
						<option value="3">Sub Category2</option>
						<option value="4">Sub Category3</option>
					</select>
					<select class="dropdown" tabindex="8" data-settings='{"wrapperClass":"metro"}'>
						<option value="1">Womens</option>
						<option value="2">Sub Category1</option>
						<option value="3">Sub Category2</option>
						<option value="4">Sub Category3</option>
					</select>
					<ul class="kids">
						<li><a href="#">Kids</a></li>
						<li class="last"><a href="#">Glasses Shop</a></li>
					</ul>
                   <section  class="sky-form">
					<h4>Price</h4>
						<div class="row row1 scroll-pane">
							<div class="col col-4">
								<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>Rs 500 - Rs 700</label>
							</div>
							<div class="col col-4">
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Rs 700 - Rs 1000</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Rs 1000 - Rs 1500</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Rs 1500 - Rs 2000</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Rs 2000 - Rs 2500</label>
								<label class="checkbox"><input type="checkbox" name="checkbox" ><i></i>Rs 2500 - Rs 3000</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Rs 3500 - Rs 4000</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Rs 4000 - Rs 4500</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Rs 4500 - Rs 5000</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Rs 5000 - Rs 5500</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Rs 5500 - Rs 6000</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Rs 6000 - Rs 6500</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Rs 6500 - Rs 7000</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Rs 7000 - Rs 7500</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Rs 7500 - Rs 8000</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Rs 8000 - Rs 8500</label>	
							</div>
						</div>
		        </section>
		       <section  class="sky-form">
					<h4>Brand Name</h4>
						<div class="row row1 scroll-pane">
							<div class="col col-4">
								<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>John Jacobs</label>
							</div>
							<div class="col col-4">
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Tag Heuer</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Lee Cooper</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Mikli</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>S Oliver</label>
								<label class="checkbox"><input type="checkbox" name="checkbox" ><i></i>Hackett</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Killer</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>IDEE</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Vogue</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Gunnar</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Accu Reader</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>CAT</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Excellent</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Feelgood</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Odysey</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Animal</label>	
							</div>
						</div>
		       </section>
		       <section  class="sky-form">
					<h4>Frame Shape</h4>
						<div class="row row1 scroll-pane">
							<div class="col col-4">
								<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>Pilot</label>
							</div>
							<div class="col col-4">
							    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Rectangle</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Square</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Round</label>
								<label class="checkbox"><input type="checkbox" name="checkbox" ><i></i>Others</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Cat Eyes</label>
								<label class="checkbox"><input type="checkbox" name="checkbox" ><i></i>Wrap Around</label>
						    </div>
						</div>
		       </section>
		       <section  class="sky-form">
					<h4>Frame Size</h4>
						<div class="row row1 scroll-pane">
							<div class="col col-4">
								<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>Small</label>
							</div>
							<div class="col col-4">
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Medium</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Large</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Medium</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Large</label>
							</div>
						</div>
		       </section>
		       <section  class="sky-form">
					<h4>Frame Type</h4>
						<div class="row row1 scroll-pane">
							<div class="col col-4">
								<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>Full Rim</label>
							</div>
							<div class="col col-4">
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Rim Less</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Half Rim</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Rim Less</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Half Rim</label>
							</div>
						</div>
		       </section>
		       <section  class="sky-form">
					<h4>Colors</h4>
						<ul class="color-list">
							<li><a href="#"> <span class="color1"> </span><p class="red">Red</p></a></li>
							<li><a href="#"> <span class="color2"> </span><p class="red">Green</p></a></li>
							<li><a href="#"> <span class="color3"> </span><p class="red">Blue</p></a></li>
							<li><a href="#"> <span class="color4"> </span><p class="red">Yellow</p></a></li>
							<li><a href="#"> <span class="color5"> </span><p class="red">Violet</p></a></li>
							<li><a href="#"> <span class="color6"> </span><p class="red">Orange</p></a></li>
							<li><a href="#"> <span class="color7"> </span><p class="red">Gray</p></a></li>
					   </ul>
		       </section>
		       <script src="{{URL::asset('js/jquery.easydropdown.js')}}"></script>
		      </div
		      <div class="clear"></div>
			</div>
			 <div class="clear"></div>
		   </div>
		</div>
	@include('footer')
<div style="display:none"></div>
@endsection