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
						<li class="category3"><span>Bài viết</span></li>
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
			<div class="col-sm-8">
				@if(isset($articles))
					@foreach($articles as $article)
						<div class="article" style="display: flex;padding-bottom: 10px;margin: 10px 0px;border-bottom: 1px solid #fefefe">
							<div class="article_avatar" style="width: 350px;">
								<img src="{{ asset(pare_url_file($article->a_avatar)) }}" style="width: 200px;height: 120px;">
							</div>
							<div class="article_info" style="margin-left: 20px;position: absolute;left: 220px;">
								<h2 style="font-size: 15px;"><a href="">{{ $article->a_name }}</a></h2>
								<p>{{ $article->a_description }}</p>
								<p>Admin <span>{{ $article->created_at }}</span></p>
							</div>
						</div>
					@endforeach
				@endif
			</div>
			<div class="col-sm-4">
				
			</div>
		</div>
	</div>	
</div>
<!-- contact-details end -->
@stop