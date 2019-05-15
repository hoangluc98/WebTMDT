@extends('layouts.app')
@section('content')

<style>
	.product-tab-content{
		overflow: hidden;
	}

	.product-tab-content h2{
		font-size: 24px !important;
	}
	.product-tab-content h3{
		font-size: 20px !important;
	}
	.product-tab-content h4{
		font-size: 18px !important;
	}
	.product-tab-content img{

	}
	.list_start i:hover{
		cursor: pointer;
	} 
	.list_text {
		display: inline-block;
		margin-left: 10px;
		position: relative;
		background: #52b858;
		color: #fff;
		padding: 2px 8px;
		box-sizing: border-box;
		font-size: 12px;
		border-radius: 2px;
		display: none;
	}
	.list_text:after{
		right: 100%;
		top: 50%;
		border: solid transparent;
		content: " ";
		height: 0;
		width: 0;
		position: absolute;
		pointer-events: none;
		border-color: rgba(82,104,80,0);
		border-right-color: #52b858;
		border-width: 6px;
		margin-top: -6px;
	}

	.list_start .rating_active, .pro-rating .active {
		color: #ff9705;
	}
</style>
<!-- breadcrumbs area start -->
<div class="breadcrumbs">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="container-inner">
					<ul>
						<li class="home">
							<a href="index.html">Trang chủ</a>
							<span><i class="fa fa-angle-right"></i></span>
						</li>
						<li class="home">
							<a href="">Shop List</a>
							<span><i class="fa fa-angle-right"></i></span>
						</li>
						<li class="category3"><span>{{ $cateProduct->c_name }}</span></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- breadcrumbs area end -->
<!-- product-details Area Start -->
<div class="product-details-area" id="content_product" data-id="{{ $product->id }}">
	<div class="container">
		<div class="row">
			<div class="col-md-5 col-sm-5 col-xs-12">
				<div class="zoomWrapper">
					<div id="img-1" class="zoomWrapper single-zoom">
						<a href="#">
							<img id="zoom1" src="{{ asset(pare_url_file($product->pro_avatar)) }}" alt="big-1">
						</a>
					</div>
				</div>
			</div>
			<div class="col-md-7 col-sm-7 col-xs-12">
				<div class="product-list-wrapper">
					<div class="single-product">
						<div class="product-content">
							<h2 class="product-name"><a href="#">{{ $product->pro_name }}</a></h2>
							<div class="rating-price">
								<?php 
				        			$ageDetail = 0;
				        			if($product->pro_total_rating){
				        				$ageDetail = round($product->pro_total_number / $product->pro_total_rating,2);
				        			}
				        		 ?>
								<div class="pro-rating">
									@for($i = 1 ; $i <= 5 ; $i++)
	                					<i class="fa fa-star {{ $i <= $ageDetail ? 'active' : ''}}" ></i>
	                				@endfor
	                				<span>{{ $ageDetail }}</span>
								</div>
								<div class="price-boxes">
									<span class="new-price">{{ number_format($product->pro_price,0,',','.') }} đ</span>
								</div>
							</div>
							<div class="product-desc">
								<p>{{ $product->pro_description }}</p>
							</div>
							<p class="availability in-stock">Availability: <span>In stock</span></p>
							<div class="actions-e">
								<div class="action-buttons-single">
									<div class="inputx-content">
										<label for="qty">Quantity:</label>
										<input type="text" name="qty" id="qty" maxlength="12" value="1" title="Qty" class="input-text qty">
									</div>
									<div class="add-to-cart">
										<a href="#">Add to cart</a>
									</div>
									<div class="add-to-links">
										<div class="add-to-wishlist">
											<a href="#" data-toggle="tooltip" title="" data-original-title="Add to Wishlist"><i class="fa fa-heart"></i></a>
										</div>
										<div class="compare-button">
											<a href="#" data-toggle="tooltip" title="" data-original-title="Compare"><i class="fa fa-refresh"></i></a>
										</div>									
									</div>
								</div>
							</div>
							<div class="singl-share">
                                <a href="#"><img src="{{ asset('img/single-share.png')}}" alt=""></a>
                            </div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="single-product-tab">
				  <!-- Nav tabs -->
				<ul class="details-tab">
					<li class="active"><a href="#home" data-toggle="tab">Chi tiết sản phẩm</a></li>
					<li class=""><a href="#messages" data-toggle="tab"> Đánh giá</a></li>
				</ul>
				  <!-- Tab panes -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="home">
						<div class="product-tab-content">
							<p>{!! $product->pro_content !!}</p>
						</div>
					</div>
					<div class="component_rating" style="margin-bottom: 20px;">
						<h3>Đánh giá sản phẩm</h3>
						<div class="component_rating_content" style="display: flex;align-items: center;border: 1px solid #dedede;border-radius: 5px;">
							<div class="rating_item" style="width: 20%;position: relative;">
								<span class="fa fa-star" style="font-size: 100px;display: block;color: #ff9705;margin: 0 auto;text-align: center;"></span><b style="top: 50%;left: 50%;transform: translateX(-50%) translateY(-50%);color: white;font-size: 20px;position: absolute;">2.5</b>
							</div>
							<div class="list_rating" style="width: 60%;padding: 20px;">
								@foreach($arrayRatings as $key => $arrayRating)
									<?php 
										$itemRating = round(($arrayRating['sum'] / $product->pro_total_number) * 100,0);
									 ?>
									<div class="item_rating" style="display: flex;align-items: center;">
										<div style="width: 10%">
											{{ $key }}<span class="fa fa-star"></span>
										</div>
										<div style="width: 70%;margin: 0 20px;">
											<span style="width: 100%;height: 8px;display: block;border: 1px solid #dedede;border-radius: 5px;">
												<b style="height: 100%;border-radius: 5px;width: {{$itemRating}}%;display: block;background-color: #f25800"></b>
											</span>
										</div>
										<div style="width: 20%">
											<a href=""> {{$arrayRating['total']}} đánh giá ({{$itemRating}} %)</a>
										</div>
									</div>
								@endforeach
							</div>
							<div style="width: 20%;">
								<a href="" class="js_rating_action" style="border: 1px solid #dedede;padding: 10px;border-radius: 5px;background-color: #288ad6;color: #fff;width: 200px;">Gửi đánh giá của bạn</a>
							</div>
						</div>
						<?php 
							$listRatingText = [
								1 => 'Không thích',
								2 => 'Tạm được',
								3 => 'Bình thường',
								4 => 'Rất tốt',
								5 => 'Tuyệt vời quá',
							];
						 ?>
						 <div class="form_rating hide">
						 	<div style="display: flex;margin-top: 15px;font-size: 15px;">
								<p style="margin-bottom: 0;">Chọn đánh giá của bạn</p>
								<span style="margin: 0 15px" class="list_start">
									@for($i = 1 ; $i <= 5 ; $i ++)
										<i class="fa fa-star" data-key="{{ $i }}"></i>
									@endfor
								</span>
								<span class="list_text"></span>
								<input type="hidden" class="number_rating" name="">
							</div>
							<div style="margin-top: 15px;">
								<textarea name="" class="form-control" id="ra_content" cols="30" rows="3"></textarea>
							</div>
							<div style="margin-top: 15px;">
								<a href="{{ route('post.rating.product',$product->id) }}" class="js_rating_product" style="border: 1px solid #dedede;padding: 10px;border-radius: 5px;background-color: #288ad6;color: #fff;width: 200px;">Gửi đánh giá</a>
							</div>
						 </div>
					</div>
					<div class="conponent_list_rating">
						@if( isset($ratings) )
							@foreach($ratings as $rating)
								<div class="rating_item" style="margin: 10px;">
									<div>
										<span style="font-weight: bold;text-transform: capitalize;color: #333">{{ $rating->user->name ? $rating->user->name : '[N\A]'}}</span>
										<a href="" style="cursor: pointer;color: #2ba832;font-size: 13px;"><i class="fa fa-check-circle-o">   </i>Đã mua hàng tại website</a>
									</div>
									<p style="margin-bottom: 0;">
										<span class="pro-rating">
											@for($i = 1 ; $i <= 5 ; $i ++)
												<i class="fa fa-star {{ $i <= $rating->ra_number ? 'active' : ''}}"></i>
											@endfor
										</span>
										<span>{{ $rating->ra_content }}</span>
									</p>
									<div>
										<span>
											<i class="fa fa-clock-o"> {{ $rating->created_at }}</i>
										</span>
									</div>
								</div>
							@endforeach
						@endif
					</div>
				</div>					
			</div>
		</div>
	</div>
</div>
<!-- product-details Area end -->
@stop

@section('script')
	<script>
		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});

		$(function(){
			let listStart = $(".list_start .fa");

			listRatingText = {
				1 : 'Không thích',
				2 : 'Tạm được',
				3 : 'Bình thường',
				4 : 'Rất tốt',
				5 : 'Tuyệt vời quá',
			}

			listStart.mouseover(function(){
				let $this = $(this);
				let number = $this.attr('data-key');

				listStart.removeClass('rating_active')
				$(".number_rating").val(number);
				$.each(listStart, function(key,value){
					if(key + 1 <= number){
						$(this).addClass('rating_active')
					}
				});

				$(".list_text").text('').text(listRatingText[number]).show();
			});

			$(".js_rating_action").click(function(event){
				event.preventDefault();
				if( $(".form_rating").hasClass('hide')){
					$(".form_rating").addClass('active').removeClass('hide')
				}
				else{
					$(".form_rating").addClass('hide').removeClass('active')
				}
			});

			$(".js_rating_product").click(function(event){
				event.preventDefault();
				let content = $("#ra_content").val();
				let number = $(".number_rating").val();
				let url = $(this).attr('href');

				if(content && number){
					$.ajax({
						url: url,
						type: 'POST',
						data : {
							number : number,
							r_content : content
						}
					}).done(function(result){
						if (result.code == 1){
							alert("Gửi đánh giá thành công");
							location.reload();
						}
					});
				}
			});

			//Luu id san pham vao storage
			let idProduct = $("#content_product").attr('data-id');

			//Lay gia tri storage
			let products = localStorage.getItem('products');

			if(products == null){
				arrayProduct = new Array();
				arrayProduct.push(idProduct);

				localStorage.setItem('products',JSON.stringify(arrayProduct))
			}
			else{
				//Chuyen ve mang
				products = $.parseJSON(products)

				if(products.indexOf(idProduct) == -1){
					products.push(idProduct);
					localStorage.setItem('products',JSON.stringify(products))
				}
			}
		});
	</script>
@stop