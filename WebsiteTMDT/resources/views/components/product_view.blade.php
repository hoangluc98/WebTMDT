@if(isset($productView))
<div class="">
    <div class="container">
        <div class="area-title">
            <h2>Sản phẩm vừa xem</h2>
        </div>
        <!-- our-product area start -->
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <!-- single-product start -->
                    @foreach($productView as $product)
                        <div class="col-lg-3 col-md-3">
                            <div class="single-product first-sale">
                                <div class="product-img">
                                    @if( $product->pro_number == 0)
                                        <span style="background: #f28902;position: absolute;color: white;padding: 5px 10px;border-radius: 5px;">Tạm hết hàng</span>
                                    @endif
                                    @if( $product->pro_sale > 0)
                                        <span style="position: absolute;background-image: linear-gradient(-90deg,#ec1f1f 0%,#ff9c00 100%);border-radius: 10px;padding: 1px 7px;padding-right: 10px;color: white;right: 0px;">Giảm giá: {{ $product->pro_sale }}%</span>
                                    @endif
                                    <a href="{{ route('get.detail.product',[$product->pro_slug,$product->id]) }}">
                                        <img class="primary-image" src="{{ asset(pare_url_file($product->pro_avatar)) }}" alt="" style="height: 400px;width: 100%;" />
                                        <img class="secondary-image" src="{{ asset(pare_url_file($product->pro_avatar)) }}" alt="" style="height: 400px;width: 100%;" />
                                    </a>
                                    <div class="action-zoom">
                                        <div class="add-to-cart">
                                            <a href="{{ route('get.detail.product',[$product->pro_slug,$product->id]) }}" title="Quick View"><i class="fa fa-search-plus"></i></a>
                                        </div>
                                    </div>
                                    <div class="actions">
                                        <div class="action-buttons">
                                            <div class="add-to-links">
                                                <div class="add-to-wishlist">
                                                    <a href="{{ route('get.detail.product',[$product->pro_slug,$product->id]) }}" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                </div>
                                                <div class="compare-button">
                                                    <a href="{{ route('add.shopping.cart',$product->id) }}" title="Thêm vào giỏ hàng"><i class="icon-bag"></i></a>
                                                </div>                                  
                                            </div>
                                            <div class="quickviewbtn">
                                                <a href="#" title="Add to Compare"><i class="fa fa-retweet"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="price-box">
                                        <span class="new-price">{{ number_format($product->pro_price,0,',','.') }} Đ</span>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h2 class="product-name" style="text-overflow: ellipsis;white-space: nowrap;overflow: hidden;"><a href="#">{{ $product->pro_name}}</a></h2>
                                    <p>{{ $product->pro_description}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- single-product end -->
                </div>  
            </div>
        </div>
        <!-- our-product area end -->   
    </div>
</div>
@endif