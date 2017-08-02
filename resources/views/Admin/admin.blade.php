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
            <li><a href="#">管理信息</a></li>
            <li class="active">列表</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-th"></i> 后台用户管理</h3>
                </div><!-- /.box-header -->
                <button class="btn btn-primary" onclick="window.location='{{URL('admin/admin')}}/create'">添加用户</button>
                <div class="box-body">
                  <table class="table table-bordered">
                    <tr>
                      <th style="width:60px">id号</th>
                      <th>用户名</th>
                      <th>密码</th>
                      <th>头像</th>
                      <th>邮箱</th>
                      <th>电话</th>
                      <th>权限</th>
                      <th>注册时间</th>
                      <th style="width: 170px">操作</th>
                    </tr>
                    @foreach($list as $vo)
                        <tr>
                            <td>{{ $vo->id }}</td>
                            <td>{{ $vo->admin_name }}</td>
                            <td>{{ $vo->admin_password}}</td>
                            <td><img src="{{env('QINIU_MODA')}}{{$vo->admin_img}}" height="50"/></td>
                            <td>{{ $vo->admin_email}}</td>
                            <td>{{ $vo->admin_phone}}</td>
                            <td>{{ $vo->admin_power}}</td>
                            <td>{{ $vo->admin_first_time}}</td>
                            <td> 
                                <button class="btn btn-xs btn-primary" onclick="window.location='{{URL('admin/admin')}}/{{ $vo->id }}/edit'">编辑</button> 
                                </tr>
                    @endforeach
                    
                  </table>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                 {!! $list->render() !!}
                </div>
              </div><!-- /.box -->

            </div><!-- /.col --> 
          </div><!-- /.row -->
        </section><!-- /.content -->
        
    @endsection
    
    @section('myscript')
    <form action="/role/" method="post" name="myform" style="display:none;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            <input type="hidden" name="_method" value="delete"/>
           
    </form>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">New message</h4>
          </div>
          <div class="modal-body">
           <!-- 此处填充 -->
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
            <button type="button" onclick="saveNode()" class="btn btn-primary">保存</button>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript">
        function doDel(id){
            Modal.confirm({msg: "是否删除信息？"}).on(function(e){
                if(e){
                   var form = document.myform;
                    form.action = "{{URL('/admin/role')}}/"+id;
                    form.submit(); 
                }
              });
        }
        
        function loadNode(rid,name){
            $("#exampleModalLabel").html(name+"的操作节点管理");
            $("#exampleModal").modal("show");
            $.ajax({
                url:"{{URL('admin/role/loadNode')}}/"+rid,
                type:"get",
                dataType:"html",
                async:true,
                success:function(data){
                  $("#exampleModal .modal-body").html(data);   
                },
             });
        }
        
        //保存节点信息
        function saveNode(){
            $.ajax({
                url:"{{URL('admin/role/saveNode')}}",
                type:"post",
                dataType:"html",
                data:$("#nodelistform").serialize() ,
                async:true,
                success:function(data){
                    $('#exampleModal').modal('hide');
                    Modal.alert({msg:data,title: ' 信息提示',btnok: '确定',btncl:'取消'});
                },
             });
             
        }
        
    </script>
    @endsection