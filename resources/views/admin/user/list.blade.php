@extends('admin.master')
@section('controller','User')
@section('action','List')
@section('content')

                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Username</th>
                                <th>Level</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $count = 0;?>
                        @foreach($data as $item)
                            <?php $count += 1;?>
                            <tr class="odd gradeX" align="center">
                                <td>{!! $count !!}</td>
                                <td>{!! $item['username'] !!}</td>
                                <td>
                                    @if($item['level'] == 2)
                                        {!! "Super Admin" !!}
                                    @elseif($item['level'] == 1)
                                        {!! "Admin" !!}
                                    @else {!! "Member" !!}
                                    @endif
                                </td>
                                <td>{!! $item['email'] !!}</td>
                                <td>Hiện</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{!! URL::route('admin.user.getDelete',$item['id'])!!}" onclick="return xacnhanxoa('Bạn muốn xoá thành viên này?')"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! URL::route('admin.user.getEdit',$item['id'])!!}">Edit</a></td>
                            </tr>
                        @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
@endsection
   