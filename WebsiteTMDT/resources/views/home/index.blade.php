@extends('layouts.app')
@section('content')
<!-- start home slider -->
    @include('components.slide')
<!-- end home slider -->


<!-- banner-area start -->
<!-- @include('components.banner') -->
<!-- banner-area end -->
<style>
    .active {
        color: #ff9705;
    }
</style>
<!-- product section start -->
@if(isset($productHot))
<div class="our-product-area new-product">
    <div class="container">
        <div class="area-title">
            <h2>Sản phẩm nổi bật</h2>
        </div>
        <!-- our-product area start -->
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="features-curosel">
                        <!-- single-product start -->
                        @foreach($productHot as $prHot)
                            <div class="col-lg-12 col-md-12">
                                <div class="single-product first-sale">
                                    <div class="product-img">
                                        @if( $prHot->pro_number == 0)
                                            <span style="background: #f28902;position: absolute;color: white;padding: 5px 10px;border-radius: 5px;">Tạm hết hàng</span>
                                        @endif
                                        @if( $prHot->pro_sale > 0)
                                            <span style="position: absolute;background-image: linear-gradient(-90deg,#ec1f1f 0%,#ff9c00 100%);border-radius: 10px;padding: 1px 7px;padding-right: 10px;color: white;right: 0px;">Giảm giá: {{ $prHot->pro_sale }}%</span>
                                        @endif
                                        <a href="{{ route('get.detail.product',[$prHot->pro_slug,$prHot->id]) }}">
                                            <img class="primary-image" src="{{ asset(pare_url_file($prHot->pro_avatar)) }}" alt="" style="height: 400px;width: 100%;" />
                                            <img class="secondary-image" src="{{ asset(pare_url_file($prHot->pro_avatar)) }}" alt="" style="height: 400px;width: 100%;" />
                                        </a>
                                        <div class="action-zoom">
                                            <div class="add-to-cart">
                                                <a href="{{ route('get.detail.product',[$prHot->pro_slug,$prHot->id]) }}" title="Quick View"><i class="fa fa-search-plus"></i></a>
                                            </div>
                                        </div>
                                        <div class="actions">
                                            <div class="action-buttons">
                                                <div class="add-to-links">
                                                    <div class="add-to-wishlist">
                                                        <a href="{{ route('get.detail.product',[$prHot->pro_slug,$prHot->id]) }}" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                    </div>
                                                    <div class="compare-button">
                                                        <a href="{{ route('add.shopping.cart',$prHot->id) }}" title="Thêm vào giỏ hàng"><i class="icon-bag"></i></a>
                                                    </div>                                  
                                                </div>
                                                <div class="quickviewbtn">
                                                    <a href="#" title="Add to Compare"><i class="fa fa-retweet"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-box">
                                            <span class="new-price">{{ number_format($prHot->pro_price,0,',','.') }} Đ</span>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h2 class="product-name" style="text-overflow: ellipsis;white-space: nowrap;overflow: hidden;"><a href="#">{{ $prHot->pro_name}}</a></h2>
                                        <p>{{ $prHot->pro_description}}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!-- single-product end -->
                    </div>
                </div>  
            </div>
        </div>
        <!-- our-product area end -->   
    </div>
</div>
@endif
<!-- product section end -->
 
<div id="product_view"></div>

<!-- latestpost area start -->
@if(isset($articleNews))
<div class="latest-post-area">
    <div class="container">
        <div class="area-title">
            <h2>Bài viết mới</h2>
        </div>
        <div class="row">
            <div class="all-singlepost">
                <!-- single latestpost start -->
                @foreach($articleNews as $arNew)
                <div class="col-md-4 col-sm-4 col-xs-12" style="margin-bottom: 40px">
                    <div class="single-post">
                        <div class="post-thumb">
                            <a href="#">
                                <img src="{{ asset(pare_url_file($arNew->a_avatar)) }}" alt="" style="height: 280px;width: 370px;" />
                            </a>
                        </div>
                        <div class="post-thumb-info">
                            <div class="postexcerpt">
                                <p style="height: 40px;">{{ $arNew->a_name }}</p>
                                <a href="#" class="read-more">Xem thêm</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- single latestpost end -->
            </div>
        </div>
    </div>
</div>
@endif
<!-- latestpost area end -->
<!-- block category area start -->
<div class="block-category">
    <div class="container">
        <div class="row">
            @if(isset($categoriesHomes))
                <!-- featured block start -->
                @foreach($categoriesHomes as $categoriesHome)
                    <div class="col-md-4">
                        <!-- block title start -->
                        <div class="block-title">
                            <h2>{{ $categoriesHome->c_name }}</h2>
                        </div>
                        <!-- block title end -->
                        <!-- block carousel start -->
                        @if($categoriesHome->products)
                        <div class="block-carousel">
                            @foreach($categoriesHome->products as $product)
                            <?php 
                                $ageDetail = 0;
                                if($product->pro_total_rating){
                                    $ageDetail = round($product->pro_total_number / $product->pro_total_rating,2);
                                }
                             ?>
                            <div class="block-content">
                                <!-- single block start -->
                                <div class="single-block">
                                    <div class="block-image pull-left">
                                        <a href="{{ route('get.detail.product',[$product->pro_slug,$product->id]) }}"><img src="{{ asset(pare_url_file($product->pro_avatar)) }}" style="width: 170px;height: 208px;" alt="" /></a>
                                    </div>
                                    <div class="category-info">
                                        <h3><a href="{{ route('get.detail.product',[$product->pro_slug,$product->id]) }}">{{ $product->pro_name }}</a></h3>
                                        <p>{{ $product->pro_description }}</p>
                                        <div class="cat-price">{{ number_format($product->pro_price,0,',','.') }} Đ <span class="old-price">{{ number_format($product->pro_price,0,',','.') }} Đ</span></div>
                                        <div class="cat-rating">
                                            @for($i = 1 ; $i <= 5 ; $i++)
                                                <i class="fa fa-star {{ $i <= $ageDetail ? 'active' : ''}}" ></i>
                                            @endfor
                                        </div>                              
                                    </div>
                                </div>
                                <!-- single block end -->
                            </div>
                            @endforeach
                        </div>
                        @endif
                        <!-- block carousel end -->
                    </div>
                @endforeach
                <!-- featured block end -->
            @endif
        </div>
    </div>
</div>
<!-- block category area end -->
<!-- Brand Logo Area Start -->
<div class="brand-area">
    <div class="container">
        <div class="row">
            <div class="brand-carousel">
                <div class="brand-item"><a href="#"><img src="{{ asset('img/brand/bg1-brand.jpg') }}" alt="" /></a></div>
                <div class="brand-item"><a href="#"><img src="{{ asset('img/brand/bg2-brand.jpg') }}" alt="" /></a></div>
                <div class="brand-item"><a href="#"><img src="{{ asset('img/brand/bg3-brand.jpg') }}" alt="" /></a></div>
                <div class="brand-item"><a href="#"><img src="{{ asset('img/brand/bg4-brand.jpg') }}" alt="" /></a></div>
                <div class="brand-item"><a href="#"><img src="{{ asset('img/brand/bg5-brand.jpg') }}" alt="" /></a></div>
                <div class="brand-item"><a href="#"><img src="{{ asset('img/brand/bg2-brand.jpg') }}" alt="" /></a></div>
                <div class="brand-item"><a href="#"><img src="{{ asset('img/brand/bg3-brand.jpg') }}" alt="" /></a></div>
                <div class="brand-item"><a href="#"><img src="{{ asset('img/brand/bg4-brand.jpg') }}" alt="" /></a></div>
            </div>
        </div>
    </div>
</div>
@stop

@section('script')
    <script>
        $(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            let routeRenderProduct = '{{ route('post.product.view') }}';

            checkRenderProduct = false;
            $(document).on('scroll', function(){
                if($(window).scrollTop() > 400 && checkRenderProduct == false){
                    checkRenderProduct = true;

                    let products = localStorage.getItem('products');
                    products = $.parseJSON(products)

                    if(products.length > 0){
                        $.ajax({
                            url : routeRenderProduct,
                            method : "POST",
                            data : { id : products},
                            success : function(result){
                                $("#product_view").html('').append(result.data);
                            }
                        });
                    }
                }
            })
        })
    </script>
@stop