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
                  <h3 class="box-title"><i class="fa fa-th"></i> 通告信息管理</h3>
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
				  <form method="post" action="{{URL('admin/notice')}}/{{$list->id}}/update">
				  <table class="table table-bordered">
				        <input type="hidden" name="_token" value="{{ csrf_token() }}">
				        
				        <tr><td style="width:60px">通告标题</td><td><input type="text" name="notice_title" value="{{$list->notice_title}}"/></td></tr>
						<tr><td style="width:60px">通告详情</td><td><textarea cols="100" rows="10" name="notice_content">{{$list->notice_content}}</textarea></td></tr>
						<tr><td style="width:60px">通告时间</td><td><input type="text" name="notice_time" value="{{$list->notice_time}}"/></td></tr>
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