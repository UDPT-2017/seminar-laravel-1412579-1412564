@extends('admin.index')
@section('controller','Product')
@section('action','List')
@section('content')

            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Ảnh thumbnail</th>
                        <th>Headline</th>
                        <th>Content</th>
                        <th>Category</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                    <tr class="odd gradeX" align="center">
                        <td>{{ $item->id }}</td>
                        <td><img src="{!! asset('public/images/'.$item->image) !!}" width="100px" height="auto" class="img-responsive"></td>
                        <td>{{ $item->headline }}</td>
                        <td>{{ $item->content }}</td>
                        <td><?php $cate = DB::table('cates')->where('id',$item->cate_id)->first(); 
                                echo $cate->name;
                        ?></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!!URL::route('admin.homepage.getEdit',$item->id)!!}">Edit</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    <div class="row" style="text-align: center;">
        <h2>Thông tin thumbnail trang chủ</h2>
        <img style="display: block;margin: 0 auto;" src="{{ asset('public/images/guide.png') }}" class="img-responsive" alt="">        
        
    </div>
    
</div>
<!-- /#page-wrapper -->

 @endsection()