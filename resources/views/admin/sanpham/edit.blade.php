@extends('admin.index')
@section('content')

        <div id="page-wrapper">
        <!-- Báo lỗi khi nhập sai -->
       
            <div class="col-lg-12">
                    <h1 class="page-header">Sửa bài viết</h1>
            </div>
            <div class="col-lg-8">
                <form role="form"  action=""  method="POST"  enctype="multipart/form-data">
                    <input type="hidden"  name="_token" value="{!! csrf_token() !!}">
                    <input type="hidden" name="idBV" value="{!! $baiviet->idBV !!}">
                    <div class="form-group">
                        <label>Tiêu đề bài viết</label>
                        <textarea class="form-control" placeholder="Tiêu đề bài viết" rows="1" name="title"></textarea>
                    </div>
                    <div class="form-group">
                       
                    </div>
                    <div class="form-group">
                        <label>Mô tả ngắn</label>
                        <textarea class="form-control" placeholder="Nội dung đầu bài" rows="3" name="headline"></textarea>
                        <script type="text/javascript">
                            ckeditor('headline');
                        </script>
                    </div>
                    <div class="form-group">
                        <label>Nội dung chính</label>
                        <textarea class="form-control" placeholder="Nội dung chính" rows="3" name="content"></textarea>
                        <script type="text/javascript">
                            ckeditor('content');
                        </script>



                    </div>
                     <input type="submit" style="margin-bottom: 20px" class="btn btn-success" id="" value="Sửa bài viết" >
                </form>

            </div>
            <div class="col-lg-4">
                    <div class="row" style="margin-top: 15px">
                        @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{!! $error !!}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    </div>
                 </div>
            
        </div>
        <!-- /#page-wrapper -->
@endsection