@extends('admin.base')


@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-calendar"></i>
            答案修改
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
            <li><a href="#">信息管理</a></li>
            <li class="active">修改信息</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- right column -->
            <div class="col-md-12">
                <!-- Horizontal Form -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-plus"></i> 修改答案信息</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->

                    <form class="form-horizontal" action="{{ URL('admin/answer') }}/{{ $v->id }}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="put">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">状态</label>
                                <div class="col-sm-6">
                                    <input type="radio" name="answer_state" value="1" <?php echo $v->answer_state=="1"?"checked":"";?>/>通过 　　　　　　　　
                                    <input type="radio" name="answer_state" value="0" <?php echo $v->answer_state=="0"?"checked":"";?>/>未通过
                                </div>
                            </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">图片</label>
                            <div class="col-sm-6">
                                <input type="file" name="answer_img" /> 　　　　　　　　
                            </div>
                        </div>

                        <div class="box-footer">
                            <div class="col-sm-offset-2 col-sm-1">
                                <button type="submit" class="btn btn-primary">修改</button>
                            </div>
                            <div class="col-sm-1">
                                <button type="submit" class="btn btn-primary">重置</button>
                            </div>
                        </div><!-- /.box-footer -->

                    </form>

                    <div class="row">
                        <div class="col-sm-12">&nbsp;</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                        </div>
                    </div>
                </div><!-- /.box -->

            </div><!--/.col (right) -->
        </div>   <!-- /.row -->
        <script>

        </script>
    </section><!-- /.content -->

@endsection