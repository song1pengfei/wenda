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
            <li><a href="#">通告信息</a></li>
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
                    <form action="{{url('admin/stu')}}" method="get">
                    <div class="input-group" style="width: 150px;">
                      <input type="text" name="name" class="form-control input-sm pull-right" placeholder="通告搜索"/>
                      <div class="input-group-btn">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                    </form>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
				  <form method="post" action="{{URL('admin/editcomment')}}/{{$list->id}}">
				  <table class="table table-bordered">
				        <input type="hidden" name="_token" value="{{ csrf_token() }}">
				        <tr><td style="width:100px">ID：</td><td><input type="text" name="id"  readonly value="{{$list->id}}"/></td></tr>
				        <tr><td style="width:100px">用户表ID：</td><td><input type="text" readonly name="user_id" value="{{$list->user_id}}"/></td></tr>
				        <tr><td style="width:100px">问题表ID：</td><td><input type="text" readonly name="ques_id" value="{{$list->ques_id}}"/></td></tr>
				        <tr><td style="width:100px">回答表ID：</td><td><input type="text" readonly name="answer_id" value="{{$list->answer_id}}"/></td></tr>
						<tr><td style="width:100px">评论ID：</td><td><input type="text" readonly name="comment_id" value="{{$list->comment_id}}"/></td></tr>
						<tr><td style="width:100px">评论IP：</td><td><input type="text" readonly name="comment_ip" value="{{$list->comment_ip}}"/></td></tr>
				        <tr><td style="width:100px">评论内容：</td><td><textarea cols="80" readonly rows="10" name="comment_content">{{$list->comment_content}}</textarea></td></tr>
				        <tr><td style="width:100px">评论时间：</td><td><input type="text" readonly name="comment_time" value="{{$list->comment_time}}"/></td></tr>
				        <tr><td style="width:100px">评论状态：</td>
						 <td>
						 <input type="radio" name="comment_state" value="1" @if($list->comment_state=='1') checked @endif />已通过
                         <input type="radio" name="comment_state" value="0" @if($list->comment_state=='0') checked @endif />未通过
						</td>
						</tr>
                        <tr><td colspan="2"><input type="submit" value="保存"/></td></tr>
				  </table>
                  </form>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                 
                </div>
              </div><!-- /.box -->

              
              
            </div><!-- /.col -->
            
          </div><!-- /.row -->
         
        </section><!-- /.content -->
        <form action="" style="display:none;" id="mydeleteform" method="post">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <input type="hidden" name="_method" value="DELETE">
        </form>
        @endsection