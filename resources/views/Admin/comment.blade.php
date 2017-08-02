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
            <li><a href="#">评论信息</a></li>
            <li class="active">列表</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-th"></i> 评论信息管理</h3>
                  <div class="box-tools">
                    <form action="{{url('admin/comment')}}" method="get">
                    <div class="input-group" style="width: 150px;">
                      <input type="text" name="comment_ip" class="form-control input-sm pull-right" placeholder="评论ip"/>
                      <div class="input-group-btn">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                    </form>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered">
                    <tr>
                      <th style="width:60px">ID</th>
                      <th>用户表ID</th>
                      <th>问题表ID</th>
                      <th>回答表ID</th>
					  <th>评论ID</th>
					  <th>评论IP</th>
                      <th>评论内容</th>
                      <th>评论时间</th>
                      
                      <th>评论状态</th>
                      <th style="width: 100px">操作</th>
                    </tr>
                    @foreach($list as $v)
                    <tr>
                      <td>{{$v->id}}</td>
                      <td>{{$v->user_id}}</td>
                      <td>{{$v->answer_id}}</td>
                      <td>{{$v->ques_id}}</td>
					  <td>{{$v->comment_id}}</td>
					  <td>{{$v->comment_ip}}</td>
                      <td>{{$v->comment_content}}</td>
                      <td>{{$v->comment_time}}</td>	
                      <td>{{$v->comment_state}}</td>
					  <td><a href="/admin/comment/del/{{$v->id}}" class="btn btn-xs btn-primary btn-danger">删除</a> 
                      <button class="btn btn-xs btn-primary" onclick="window.location='{{URL('admin/comment')}}/{{$v->id}}/edit'">编辑</button> </td>
                    </tr>
                    @endforeach
                  
                   
                  </table>
                </div><!-- /.box-body -->
	            <div class="box-footer clearfix">
                 {{ $list->appends($where)->links() }}
                </div>
              

              
              
            </div><!-- /.col -->
            
         
         
        </section><!-- /.content -->
        
        @endsection