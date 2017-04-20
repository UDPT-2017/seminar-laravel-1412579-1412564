@extends('admin.index')
@section('content')

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Quản lý bài viết</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Danh sách đề thi
                        </div>
                        <div class="col-lg-12">
                            @if(Session::has('flash_massage'))
                                <div  class="alert alert-{{Session::get('flash_level')}}">
                                    {{
                                        Session::get('flash_massage')
                                        }}
                                </div>
                            @endif
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-1">
                                <thead>
                                    <tr style="">
                                        <th>ID</th>   
                                        <th>Tiêu đề</th>
                                        <th>Người đăng</th>
                                        <th>Thời gian đăng</th>
                                        <th>Thumbnail</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
@endsection