@extends('layouts.app')
@section('content')
<!-- breadcrumbs area start -->
<div class="breadcrumbs">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="container-inner">
					<ul>
						<li class="home">
							<a href="index.html">Home</a>
							<span><i class="fa fa-angle-right"></i></span>
						</li>
						<li class="category3"><span>Liên hệ</span></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- breadcrumbs area end -->
<!-- contact-details start -->
<div class="main-contact-area">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="contact-us-area">
					<!-- google-map-area start -->
					<!-- <div class="google-map-area">
						<div id="contacts" class="map-area">
							<div id="map" class="map" data-lat="43.6532" data-lng="-79.3832"></div>
						</div>
					</div> -->
					<!-- google-map-area end -->
					<!-- contact us form start -->
					<div class="contact-us-form">
						<div class="contact-form">
							<h4 style="color: #333">Vui lòng điền thông tin liên hệ</h2>
							<form action="" method="post">
								@csrf
								<div class="form-top">
									<div class="form-group col-sm-10">
										<label>Họ tên <sup>*</sup></label>
										<input type="text" name="c_name" class="form-control" required>
									</div>
									<div class="form-group col-sm-6 col-md-6 col-lg-5">
										<label>Email <sup>*</sup></label>
										<input type="email" class="form-control" name="c_email" required>
									</div>
									<div class="form-group col-sm-6 col-md-6 col-lg-5">
										<label>Tiêu đề <sup>*</sup></label>
										<input type="text" class="form-control" name="c_title" required>
									</div>											
									<div class="form-group col-sm-12 col-md-12 col-lg-10">
										<label>Nội dung <sup>*</sup></label>
										<textarea class="yourmessage" name="c_content" required></textarea>
									</div>												
								</div>
								<div class="submit-form form-group submit-review">
									<button href="#" class="add-tag-btn" style="width: 200px;color: #fff;background-color: #288ad6;border-radius: 5px;padding: 5px;">Gửi thông tin</button>
								</div>
							</form>
						</div>
					</div>
					<!-- contact us form end -->
				</div>					
			</div>
		</div>
	</div>	
</div>
<!-- contact-details end -->
@stop