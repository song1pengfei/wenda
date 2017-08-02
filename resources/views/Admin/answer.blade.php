@extends('admin.base')
@section('content')
    <section class="content-header">
        <h1>
            信息输出表
            <small>preview of simple tables</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
            <li><a href="#">答案信息</a></li>
            <li class="active">列表</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-th"></i> 答案信息管理</h3>

                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <form>
                            搜索：<input type="text" name="keyword">
                        </form>
                        <table class="table table-bordered">
                            <tr>

                                <th>问题id</th>
                                <th>用户id</th>
                                <th>回答内容</th>
                                <th>状态</th>
                                <th>回答id</th>
                                <th>图片</th>
                                <th>点赞次数</th>
                                <th>回答时间</th>
                                <th>回答ip</th>
                                <th>评论数</th>
                                <th>浏览次数</th>
                                <th>采纳次数</th>
                                <th style="width: 135px">操作</th>
                            </tr>
                            @foreach($list as $v)
                                <tr>
                                    <td>{{ $v->ques_id }}</td>
                                    <td>{{ $v->user_id }}</td>
                                    <td>{{ $v->answer_content }}</td>
                                    <td> @if($v->answer_state==1)通过@else未通过@endif </td>
                                    <td>{{ $v->answer_id }}</td>
                                    <td><img src="{{asset('AnswerUpload')}}/{{$v->answer_img}}" height="50"/></td>
                                    <td>{{ $v->answer_inte }}</td>
                                    <td>{{ $v->answer_time }}</td>
                                    <td>{{ $v->answer_ip }}</td>
                                    <td>{{ $v->answer_comments }}</td>
                                    <td>{{ $v->answer_browse }}</td>
                                    <td>{{ $v->answer_adopt }}</td>

                                    <td><button onclick="doDel({{$v->id}})" class="btn btn-xs btn-danger">删除</button>
                                        <a href="{{URL('admin/answer')}}/{{ $v->id }}/edit" class="btn btn-xs btn-primary">编辑</a>
                                        <a href="answer/create" class="btn btn-xs btn-primary">添加</a>

                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div><!-- /.box-body -->
                    <div class="box-footer clearfix">
                    </div>
                </div><!-- /.box -->
            </div><!-- /.col -->

        </div><!-- /.row -->
        <form action="" style="display:none;" id="mydeleteform" method="post">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <input type="hidden" name="_method" value="DELETE">
        </form>
    </section><!-- /.content -->
    <script type="text/javascript">
        function doDel(id){
            if(confirm('确定要删除吗？')){
                $("#mydeleteform").attr("action","{{url('admin/answer')}}/"+id).submit();
            }
        }
    </script>
    {!! $list->render() !!}
@endsection