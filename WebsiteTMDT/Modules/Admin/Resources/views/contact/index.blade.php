@extends('admin::layouts.master')

@section('content')
	<div class="page-header">
		<ol class="breadcrumb">
			<li><a href="">Trang chủ</a></li>
			<li><a href="">Liên hệ</a></li>
			<li class="active">Danh sách</li>
		</ol>
	</div>
	<div class="table-responsive">
		<h1 class="page-header">Quản lý liên hệ <a href="" class="pull-right"><i class="fas fa-plus-circle"></i></a></h1>
	    <table class="table table-striped">
	        <thead>
	            <tr>
	                <th>#</th>
	                <th>Tiêu đề</th>
	                <th>Họ tên</th>
	                <th>Email</th>
	                <th>Nội dung</th>
	                <th>Trạng thái</th>
	                <th>Thao tác</th>
	            </tr>
	        </thead>
	        <tbody>
	        	@if(isset($contacts))
	        		@foreach($contacts as $contact)
	        			<tr>
			                <td>{{$contact->id}}</td>
			                <td>{{$contact->c_title}}</td>
			                <td>{{ isset($contact->user->name) ? $contact->user->name : '[N\A]'}}</td>
			                <td>{{ isset($contact->user->email) ? $contact->user->email : '[N\A]'}}</td>
			                <td>{{$contact->c_content}}</td>
			                <td>
			                	<a href="{{ route('admin.get.action.contact',['active',$contact->id]) }}" class="label {{ $contact->getStatus($contact->c_status)['class']}}">{{$contact->getStatus($contact->c_status)['name']}}</a>
			                </td>
			                <td>
			                	<a style="padding: 5px 10px;border: 1px solid #999;font-size: 12px;border-radius: 5px;" href=""><i class="fas fa-pen" style="font-size: 11px;"></i>Cập nhật</a>
			                </td>
			            </tr>
	        		@endforeach
	        	@endif
	        </tbody>
	    </table>
	</div>
@stop