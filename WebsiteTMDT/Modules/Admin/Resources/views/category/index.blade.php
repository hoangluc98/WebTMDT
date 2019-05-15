@extends('admin::layouts.master')

@section('content')
	<div class="page-header">
		<ol class="breadcrumb">
			<li><a href="{{ route('admin.home') }}">Trang chủ</a></li>
			<li><a href="{{ route('admin.get.list.category') }}">Danh mục</a></li>
			<li class="active">Danh sách</li>
		</ol>
	</div>
	<div class="table-responsive">
		<h1 class="page-header">Quản lý danh mục <a href="{{ route('admin.get.create.category') }}" class="pull-right"><i class="fas fa-plus-circle"></i></a></h1>
	    <table class="table table-striped">
	        <thead>
	            <tr>
	                <th>#</th>
	                <th>Tên danh mục</th>
	                <th>Title seo</th>
	                <th>Trang chủ</th>
	                <th>Trạng thái</th>
	                <th>Thao tác</th>
	            </tr>
	        </thead>
	        <tbody>
	        	@if (isset($categories))
	        		@foreach($categories as $category)
			            <tr>
			                <td>{{$category->id}}</td>
			                <td>{{$category->c_name}}</td>
			                <td>{{$category->c_title_seo}}</td>
			                <td>
			                	<a href="{{ route('admin.get.action.category',['home',$category->id]) }}" class="label {{ $category->getHome($category->c_home)['class']}}">{{$category->getHome($category->c_home)['name']}}</a>
			                </td>
			                <td>
			                	<a href="{{ route('admin.get.action.category',['active',$category->id]) }}" class="label {{ $category->getStatus($category->c_active)['class']}}">{{$category->getStatus($category->c_active)['name']}}</a>
			                </td>
			                <td>
			                	<a style="padding: 5px 10px;border: 1px solid #999;font-size: 12px;border-radius: 5px;" href="{{ route('admin.get.edit.category',$category->id) }}"><i class="fas fa-pen" style="font-size: 11px;"></i>Cập nhật</a>
			                	<a style="padding: 5px 10px;border: 1px solid #999;font-size: 12px;border-radius: 5px;" href="{{ route('admin.get.action.category',['delete',$category->id]) }}"><i class="fas fa-trash-alt" style="font-size: 11px;"></i>Xóa</a>
			                </td>
			            </tr>
		            @endforeach
	            @endif
	        </tbody>
	    </table>
	</div>
@stop