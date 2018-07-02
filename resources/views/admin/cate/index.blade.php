    @extends('layout.admins')
    @section('title',$title)
    @section('content')
    <div class="mws-panel grid_8">
        @if(session('info'))
        <div class="mws-form-message success">
            {{session('info')}}
        </div>
        @endif
        <script>

        </script>

        <div class="mws-panel-header">
            <span><i class="icon-table"></i> 类别浏览</span>
        </div>
        <div class="mws-panel-body no-padding">
            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid">
                <div id="DataTables_Table_0_length" class="dataTables_length">
                    <label>显示
                        <select size="1" name="DataTables_Table_0_length" aria-controls="DataTables_Table_0">
                            <option value="10" selected="selected">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select> 
                    </label>
                </div>
                <div class="dataTables_filter" id="DataTables_Table_0_filter">
                <form action="/admins/cate/" method="get" style="display: inline; ">
                    <label>查询分类: <input type="text" aria-controls="DataTables_Table_0" name="cate_name"></label>
                    <button class="btn btn-primary btn-small" >查询</button>
                </form>
                <label><a href="/admins/cate/create" class="btn btn-primary btn-small">添加分类</a></label>
            </div><table class="mws-datatable mws-table dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
                <thead>
                    <tr role="row">
                        <th style="width: 50px;text-align: center;">分类id</th>
                        <th style="width: 120px;text-align: center;">分类名称</th>
                        <th style="width: 120px;text-align: center;">父ID</th>
                        <th style="width: 120px;text-align: center;">父路径</th>
                        <th style="width: 260px;text-align: center;">操作</th>
                    </tr>
                </thead>
                
            <tbody role="alert" aria-live="polite" aria-relevant="all">

                @foreach($cate as $k=>$v)
                <tr  class="@if($k % 2 == 1)  odd   @else even  @endif">
                    {{ $n=substr_count($v->path,',') }}
                    <td style="width: 50px;text-align: center;">{{ $v->cate_id}}</td>
                    <td style="width: 50px;">{{str_repeat('&nbsp;',$n*5)}}|-- {{ $v->cate_name}}</td>
                    <td style="width: 50px;text-align: center;">{{ $v->pid}}</td>
                    <td style="width: 50px;text-align: center;">{{ $v->path}}</td>
                    <td style="width: 50px;text-align: center;">
                        <a href="/admins/cate/{{$v->cate_id}}/create/" class="btn btn-primary btn-small">添加</a>
                        &nbsp;&nbsp;
                        <a href="/admins/cate/{{$v->cate_id}}/edit/" class="btn btn-success btn-small">修改</a>
                        &nbsp;&nbsp;
                        <form action="/admins/cate/{{$v->cate_id}} " style="display: inline" method="post">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-small">删除</button>
                            {{ method_field('DELETE') }}
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
            <div class="dataTables_info" id="DataTables_Table_0_info"></div>
            <div class="dataTables_paginate paging_two_button" id="DataTables_Table_0_paginate">
                <a class="paginate_enabled_previous" tabindex="0" role="button" id="DataTables_Table_0_previous" >1231</a>
                <a class="paginate_enabled_next" tabindex="0" role="button" id="DataTables_Table_0_next" aria-controls="DataTables_Table_0">Next</a>

            </div>
        </div>
        </div>
    </div>
    @endsection