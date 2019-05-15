@extends('admin::layouts.master')

@section('content')
<h1 class="page-header">Tổng quan</h1>
<!-- <div class="row placeholders">
    <div class="col-xs-6 col-sm-3 placeholder" style="position: relative;">
        <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
        <h4 style="position: absolute;top: 50%;left: 50%;transform: translateX(-50%) translateY(-50%);color: white;margin: 0">Label</h4>
    </div>
    <div class="col-xs-6 col-sm-3 placeholder" style="position: relative;">
        <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
        <h4 style="position: absolute;top: 50%;left: 50%;transform: translateX(-50%) translateY(-50%);color: white;margin: 0">Label</h4>
    </div>
    <div class="col-xs-6 col-sm-3 placeholder" style="position: relative;">
        <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
        <h4 style="position: absolute;top: 50%;left: 50%;transform: translateX(-50%) translateY(-50%);color: white;margin: 0">Label</h4>
    </div>
    <div class="col-xs-6 col-sm-3 placeholder" style="position: relative;">
        <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
        <h4 style="position: absolute;top: 50%;left: 50%;transform: translateX(-50%) translateY(-50%);color: white;margin: 0">Label</h4>
    </div>
</div> -->
<div class="row">
    <div class="col-sm-6">
        <h2 class="sub-header">Danh sách liên hệ mới nhất</h2>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tiêu đề</th>
                        <th>Họ tên</th>
                        <th>Nội dung</th>
                        <th>Trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($contacts))
                        @foreach($contacts as $contact)
                            <tr>
                                <td>{{$contact->id}}</td>
                                <td>{{$contact->c_title}}</td>
                                <td>{{ isset($contact->user->name) ? $contact->user->name : '[N\A]'}}</td>
                                <td>{{$contact->c_content}}</td>
                                <td>
                                    <a href="{{ route('admin.get.action.contact',['active',$contact->id]) }}" class="label {{ $contact->getStatus($contact->c_status)['class']}}">{{$contact->getStatus($contact->c_status)['name']}}</a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-sm-6">
        <h2 class="sub-header">Danh sách đánh giá mới nhất</h2>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên thành viên</th>
                        <th>Sản phẩm</th>
                        <th>Rating</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($ratings))
                        @foreach($ratings as $rating)
                            <tr>
                                <td>{{$rating->id}}</td>
                                <td>{{ isset($rating->user->name) ? $rating->user->name : '[N\A]'}}</td>
                                <td>{{ isset($rating->product->pro_name) ? $rating->product->pro_name : '[N\A]'}}</td>
                                <td>{{$rating->ra_number}}</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop
