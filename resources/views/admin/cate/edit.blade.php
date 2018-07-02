@extends('layout.admins')
@section('title',$title)
@section('content')
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span><i class="icon-ok"></i> 修改类名</span>
    </div>
    <div class="mws-panel-body no-padding">
        <form id="mws-validate" class="mws-form" action="/admins/cate/{{$cate->cate_id}}" method="post" novalidate="novalidate">
            {{ csrf_field() }}
            <div id="mws-validate-error" class="mws-form-message error" style="display:none;"></div>
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">修改名字
                    </label>
                    <div class="mws-form-item">
                        <input type="text" name="cate_name" value="{{$cate->cate_name}}" class="required email large">
                    </div>
                </div>
            </div>
            <div class="mws-button-row">
                <input type="submit" class="btn btn-danger">
            </div>
            {{method_field('PUT')}}
        </form>
    </div>      
</div>
@endsection