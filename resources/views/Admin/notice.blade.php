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
                    <form action="{{url('admin/notice')}}" method="get">
                    <div class="input-group" style="width: 150px;">
                      <input type="text" name="notice_title" class="form-control input-sm pull-right" placeholder="通告标题"/>
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
                      <th style="width:60px">通告ID</th>
                      <th>通告标题</th>
                      <th>通告详情</th>
                      <th>通告时间</th>
                      <th style="width: 100px">操作</th>
                    </tr>
                    @foreach($list as $v)
                    <tr>
                      <td>{{$v->id}}</td>
                      <td>{{$v->notice_title}}</td>
                      <td>{{$v->notice_content}}</td>
                      <td>{{$v->notice_time}}</td>
					  <td><button onclick="doDel({{$v->id}})" class="btn btn-xs btn-danger">删除</button> 
                      <button class="btn btn-xs btn-primary" onclick="window.location='{{URL('admin/notice')}}/{{$v->id}}/edit'">编辑</button> </td>
                    </tr>
                    @endforeach
                  
                   
                  </table>
				  <script>
						 function doDel(id){
							document.myform.action = "/admin/NoticeDel/"+id;
							document.myform.submit();
						}
                  </script>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                 {{ $list->appends($where)->links() }}
                </div>
              </div><!-- /.box -->

              
              
            </div><!-- /.col -->
            
          </div><!-- /.row -->
         
        </section><!-- /.content -->
        <form style="display:none;" name="myform" method="post">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <input type="hidden" name="_method" value="DELETE">
        </form>
        @endsection