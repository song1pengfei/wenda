@extends('admin.base')

        @section('content')
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            信息输出表
            <small>preview of simple tables</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
            <li><a href="#">提问信息</a></li>
            <li class="active">列表</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-th"></i> 提问信息管理</h3>
                  
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered">
                    <tr>
                      <th style="width:60px">问题ID</th>
                      <th>用户</th>
                      <th>标题</th>
                      <th>详情</th>
                      <th>图片</th>
                      <th>状态</th>
                      <th>备注</th>
                      <th>提问时间</th>
                      <th>ip地址</th>
                      <th>悬赏积分</th>
                      <th>栏目id</th>
                      <th style="width: 100px">操作</th>
                    </tr>
                    @foreach($list as $v)
                    <tr>
                        <td>{{ $v->ques_id }}</td>
                        <td>{{ $v->user_id }}</td>
                        <td>{{ str_limit($v->ques_title,12) }}</td>
                        <td>{{ str_limit($v->ques_details,26) }}</td>
                        <td><img src="{{asset('upload')}}/{{ $v->ques_img }}" height="30"/></td>
                        <td>{{ $v->ques_state=='1'?'已通过':'未通过' }}</td>
                        <td>{{ $v->ques_note}}</td>
                        <td>{{ $v->updated_at}}</td>
                        <td>{{ $v->ques_ip}}</td>
                        <td>{{ $v->ques_inte }}</td>
                        <td>{{ $v->lanmu_id }}</td>
                      <td>
                      <a href="/admin/question/{{$v->id}}/edit"><button class="btn btn-xs btn-primary">编辑</button> </a></td>
                    </tr>
                    @endforeach
                  
                   
                  </table>
                 <div align="center"> {{ $list->render() }} </div>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                 
                </div>
              </div><!-- /.box -->

              
              
            </div><!-- /.col -->
            
          </div><!-- /.row -->
         
        </section><!-- /.content -->
       
        @endsection
