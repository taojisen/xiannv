@extends('layout.admins')

@section('title',$title)

@section('content')
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>{{$title}}</span>
    </div>
    <div class="mws-panel-body no-padding">
            @if (count($errors) > 0)
                <div class="mws-form-message error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li style='font-size:16px;list-style:none'>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        <form action="/admins/goods" method='post' class="mws-form" enctype='multipart/form-data'>
            <input type="hidden" name="goods_no" value="{{$goods_no}}">
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <div class="mws-form-col-2-6">
                        <label class="mws-form-label">选择类别</label>
                        <select name='cate_id'>
                            @foreach($arr as $k=>$v)
                            {{ $n=substr_count($v->path,',') }}
                            <option value = "{{$v->cate_id}}">{{str_repeat('&nbsp;',$n*5)}}|-- {{ $v->cate_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mws-form-row ">
                    <label class="mws-form-label">商品名称</label>
                    <div class="mws-form-col-2-8">
                        <input type="text" class="small" name='goods_name'>
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">商品关键字</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name='keywords'>
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">商品描述</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name='desc'>
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">商品价格</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name='price'>
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">商品图片</label>
                    <div class="mws-form-item">
                        <!-- <input type="file" class="small" name='profile'> -->

                        <input type="file" name='thumb' class="fileinput-preview" style="width: 100%; padding-right: 84px;" readonly="readonly" placeholder="No file selected...">
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">商品总数</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name='count'>
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">商品销售总数</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name='sum'>
                    </div>
                </div>

                <!-- <div class="mws-form-row">
                    <label class="mws-form-label">上传商品图片1</label>
                    <div class="mws-form-item">
                        <input type="password" class="small" name='img1'>
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">上传商品图片2</label>
                    <div class="mws-form-item">
                        <input type="password" class="small" name='img2'>
                    </div>
                </div> -->
            </div>
            <div class="mws-button-row">
                {{csrf_field()}}
                <input type="submit" class="btn btn-success" value="提交">
            </div>
        </form>
    </div>      
</div>


@endsection

@section('js')
<script type="text/javascript">
    
    /*setTimeout(function(){

        $('.mws-form-message').remove();

    },3000)*/

    $('.mws-form-message').fadeOut(5000);

</script>
@endsection