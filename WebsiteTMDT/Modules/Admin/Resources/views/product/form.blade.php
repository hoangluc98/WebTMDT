<form action="" method="POST" enctype="multipart/form-data">
@csrf
	<div class="row">
		<div class="col-sm-8">
			<div class="form-group">
				<label for="pro_name">Tên sản phẩm:</label>
				<input type="text" class="form-control" placeholder="Tên sản phẩm" value="{{ old('pro_name',isset($product->pro_name) ? $product->pro_name : '')}}" name="pro_name">
				@if($errors->has('pro_name'))
			        <span class="error-text">
			            {{$errors->first('pro_name')}}
			        </span>
			    @endif
			</div>
			<div class="form-group">
				<label for="pro_description">Mô tả:</label>
				<textarea name="pro_description" class="form-control" id="" cols="30" rows="3" placeholder="Mô tả ngắn sản phẩm" value="">{{isset($product->pro_description) ? $product->pro_description : ''}}</textarea>
				@if($errors->has('pro_description'))
			        <span class="error-text">
			            {{$errors->first('pro_description')}}
			        </span>
			    @endif
			</div>
			<div class="form-group">
				<label for="name">Nội dung:</label>
				<textarea name="pro_content" class="form-control" id="pro_content" cols="30" rows="3" placeholder="Nội dung" value="">{{isset($product->pro_content) ? $product->pro_content : ''}}</textarea>
				@if($errors->has('pro_content'))
			        <span class="error-text">
			            {{$errors->first('pro_content')}}
			        </span>
			    @endif
			</div>
			<div class="form-group">
				<label for="name">Meta Title:</label>
				<input type="text" class="form-control" placeholder="Meta Title" value="{{ old('pro_title_seo',isset($product->pro_title_seo) ? $product->pro_title_seo : '') }}" name="pro_title_seo">
			</div>
			<div class="form-group">
				<label for="name">Meta Description:</label>
				<input type="text" class="form-control" placeholder="Meta Description" value="{{ old('pro_description_seo',isset($product->pro_description_seo) ? $product->pro_description_seo : '') }}" name="pro_description_seo">
			</div>
		</div>
		<div class="col-sm-4">
			<div class="form-group">
				<label for="name">Loại sản phẩm:</label>
				<select name="pro_category_id" id="" class="form-control">
					<option value="{{isset($product->category->id) ? $product->category->id : ''}}">{{ isset($product->category->c_name) ? $product->category->c_name : '--Chọn loại sản phẩm--'}}</option>
					@if(isset($categories))
						@foreach($categories as $category)
							<option value="{{ $category->id }}">{{ $category->c_name }}</option>
						@endforeach
					@endif
				</select>
				@if($errors->has('pro_category_id'))
			        <span class="error-text">
			            {{$errors->first('pro_category_id')}}
			        </span>
			    @endif
			</div>
			<div class="form-group">
				<label for="pro_price">Giá sản phẩm:</label>
				<input type="number" placeholder="Giá sản phẩm" class="form-control" name="pro_price" value="{{ old('pro_price',isset($product->pro_price) ? $product->pro_price : '') }}">
				@if($errors->has('pro_price'))
			        <span class="error-text">
			            {{$errors->first('pro_price')}}
			        </span>
			    @endif
			</div>
			<div class="form-group">
				<label for="pro_sale">% khuyến mãi:</label>
				<input type="number" placeholder="% giảm giá" class="form-control" name="pro_sale" value="{{ old('pro_sale',isset($product->pro_sale) ? $product->pro_sale : '') }}">
			</div>
			<div class="form-group">
				<label for="pro_number">Số lượng sản phẩm:</label>
				<input type="number" placeholder="0" class="form-control" name="pro_number" value="{{ old('pro_number',isset($product->pro_number) ? $product->pro_number : '') }}">
			</div>
			<div class="form-group">
				<img id="out_img" src="{{ isset($product->pro_avatar) ? asset(pare_url_file($product->pro_avatar)) : asset('images/imagedefault.png')}}" style="height: 300px;width: 100%">
			</div>
			<div class="form-group">
				<label for="avatar">Avatar:</label>
				<input type="file" id="input_img" name="avatar" class="form-control">
			</div>
			<div class="form-group">
				<div class="checkbox">
				    <label><input type="checkbox" name="hot"> Nổi bật</label>
				</div>
			</div>
		</div>
	</div>
	<button type="submit" class="btn btn-success">Lưu thông tin</button>
</form>

@section('script')
	<script src="{{ asset('ckeditor/ckeditor.js')}}"></script>
	<script>
		CKEDITOR.replace('pro_content');
	</script>
@stop