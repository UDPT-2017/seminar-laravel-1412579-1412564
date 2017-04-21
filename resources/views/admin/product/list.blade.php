@extends('admin.index')
@section('controller','Product')
@section('action','List')
@section('content')

            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Date</th>
                        <th>Category</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $count = 0;?>
                    @foreach($data as $item)
                        <?php $count += 1;?>
                    <tr class="odd gradeX" align="center">
                        <td><?php echo $count;?></td>
                        <td>{!! $item->name !!}</td>
                        <td>{!! number_format($item->price,0,",",".")!!} {!! 'VNĐ' !!}</td>
                        <td>{!! $item->created_at!!}</td>
                        <td>
                             <?php
                                $parent = DB::table('cates')->where('id',$item->cate_id)->first();
                                if(!empty($parent->name))
                                    echo $parent->name;
                            ?>
                        </td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{!!URL::route('admin.product.getDelete',$item->id)!!}" onclick="return xacnhanxoa('Bạn có chắc muốn xoá sản phẩm?')"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!!URL::route('admin.product.getEdit',$item->id)!!}">Edit</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

 @endsection()