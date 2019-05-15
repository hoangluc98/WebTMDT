@extends('admin::layouts.master')

@section('content')
	<div class="page-header">
		<ol class="breadcrumb">
			<li><a href="">Trang chủ</a></li>
			<li><a href="">Đơn hàng</a></li>
			<li class="active">Danh sách</li>
		</ol>
	</div>
	<div class="table-responsive">
		<h1 class="page-header">Quản lý đơn hàng <a href="" class="pull-right"><i class="fas fa-plus-circle"></i></a></h1>
	    <table class="table table-striped">
	        <thead>
	            <tr>
	                <th>#</th>
	                <th>Tên khách hàng</th>
	                <th>Địa chỉ</th>
	                <th>Số điện thoại</th>
	                <th>Tổng tiền</th>
	                <th>Trạng thái</th>
	                <th>Thời gian</th>
	                <th>Thao tác</th>
	            </tr>
	        </thead>
	        <tbody>
	        	@foreach($transactions as $transaction)
	        	<tr>
	        		<td>{{ $transaction->id }}</td>
	        		<td>{{ isset($transaction->user->name) ? $transaction->user->name : '[N\A]' }}</td>
	        		<td>{{ $transaction->tr_address }}</td>
	        		<td>{{ $transaction->tr_phone }}</td>
	        		<td>{{ number_format($transaction->tr_total,0,',','.') }} VND</td>
	        		<td>
	        			@if($transaction->tr_status == 1)
	        				<a href="#" class="label label-success">Đã xử lý</a>
	        			@else
	        				<a href="{{ route('admin.get.active.transaction',$transaction->id) }}" class="label label-default">Chờ xử lý</a>
	        			@endif
	        		</td>
	        		<td>{{ $transaction->created_at->format('d-m-Y') }}</td>
	        		<td>
	                	<a style="padding: 5px 10px;border: 1px solid #999;font-size: 12px;border-radius: 5px;" href=""><i class="fas fa-trash-alt" style="font-size: 11px;"></i>Xóa</a>
	                	<a style="padding: 5px 10px;border: 1px solid #999;font-size: 12px;border-radius: 5px;" class="js_order_item" data-id="{{ $transaction->id }}" href="{{ route('admin.get.view.order',$transaction->id) }}"><i class="fas fa-eye" style="font-size: 11px;"></i>Chi tiết</a>
	                </td>
	            </tr>
	        	@endforeach
	        </tbody>
	    </table>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="myModalOrder" role="dialog">
		<div class="modal-dialog modal-lg">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Chi tiết mã đơn hàng #<b class="transaction_id"></b></h4>
				</div>
				<div class="modal-body" id="md_content">

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
				</div>
			</div>

		</div>
	</div>
@stop

@section('script')
	<script>
		$(function(){
			$(".js_order_item").click(function(event){
				event.preventDefault();
				let $this = $(this);
				let url = $this.attr('href');
				$(".transaction_id").text('').text($this.attr('data-id'));

				$("#myModalOrder").modal("show");

				$.ajax({
					url: url,
				}).done(function(result){
					console.log(result);
					if(result){
						$("#md_content").html('').append(result);
					}
				})
			});
		})
	</script>
@stop