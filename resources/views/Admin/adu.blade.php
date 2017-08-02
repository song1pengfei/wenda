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
            <li><a href="#">广告信息</a></li>
            <li class="active">列表</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-th"></i> 广告信息管理</h3>
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
                  <table class="table table-bordered">
                    <tr>
                      <th style="width:60px">通告ID</th>
                      <th>广告标题</th>
                      <th>广告图片</th>
                      <th style="width: 100px">操作</th>
                    </tr>
                    @foreach($list as $v)
                    <tr>
                      <td>{{$v->id}}</td>
                      <td>{{$v->adu_title}}</td>
                      <!--<td><a href="{{URL('admin/adu/BigImage')}}/{{$v->id}}"><img src="{{asset('AduUpload')}}/s_{{$v->adu_img}}"/></a></td>-->
                      <td><img src="{{env('QINIU_URL')}}/iwanli/image_{{$v->adu_img}}?imageView2/1/w/60/h/60"/></td>
					  <td><button onclick="doDel({{$v->id}})" class="btn btn-xs btn-danger">删除</button> 
                      <button class="btn btn-xs btn-primary" onclick="window.location='{{URL('admin/adu')}}/{{$v->id}}/edit'">编辑</button> </td>
                    </tr>
                    @endforeach
                  </table>
                </div><!-- /.box-body -->
				<script>
						 function doDel(id){
							document.myform.action = "/admin/AduDel/"+id;
							document.myform.submit();
						}
                  </script>
				  <form style="display:none;" action="" name="myform" method="post">
						<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <input type="hidden" name="_method" value="DELETE">
				 </form>
                <div class="box-footer clearfix">
                 
                </div>
              </div><!-- /.box -->

              
              
            </div><!-- /.col -->
            
          </div><!-- /.row -->
         
        </section><!-- /.content -->
        @endsection