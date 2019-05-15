<form action="" method="POST" enctype="multipart/form-data">
@csrf
	<div class="row">
		<div class="col-sm-8">
			<div class="form-group">
				<label for="a_name">Tên bài viết:</label>
				<input type="text" class="form-control" placeholder="Tên bài biết" value="{{ old('a_name',isset($article->a_name) ? $article->a_name : '')}}" name="a_name">
				@if($errors->has('a_name'))
			        <span class="error-text">
			            {{$errors->first('a_name')}}
			        </span>
			    @endif
			</div>
			<div class="form-group">
				<label for="a_description">Mô tả:</label>
				<textarea name="a_description" class="form-control" id="" cols="30" rows="3" placeholder="Mô tả ngắn bài viết"></textarea>
				@if($errors->has('a_description'))
			        <span class="error-text">
			            {{$errors->first('a_description')}}
			        </span>
			    @endif
			</div>
			<div class="form-group">
				<label for="a_content">Nội dung:</label>
				<textarea name="a_content" class="form-control" id="" cols="30" rows="3" placeholder="Nội dung"></textarea>
				@if($errors->has('a_content'))
			        <span class="error-text">
			            {{$errors->first('a_content')}}
			        </span>
			    @endif
			</div>
			<div class="form-group">
				<label for="a_title_seo">Meta Title:</label>
				<input type="text" class="form-control" placeholder="Meta Title" value="{{ old('a_title_seo',isset($article->a_title_seo) ? $article->a_title_seo : '') }}" name="a_title_seo">
			</div>
			<div class="form-group">
				<label for="a_description_seo">Meta Description:</label>
				<input type="text" class="form-control" placeholder="Meta Description" value="{{ old('a_description_seo',isset($article->a_description_seo) ? $article->a_description_seo : '') }}" name="a_description_seo">
			</div>
			<div class="form-group">
				<label for="avatar">Avatar:</label>
				<input type="file" name="avatar" class="form-control">
			</div>
		</div>
	</div>
	<button type="submit" class="btn btn-success">Lưu thông tin</button>
</form>