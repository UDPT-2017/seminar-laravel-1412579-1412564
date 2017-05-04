@extends('admin.index')
@section('controller','Product')
@section('action','Add')
@section('content')
 
<form action="{!! url('/admin/product/add') !!}" method="POST" enctype="multipart/form-data">
<input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <!-- /.col-lg-12 -->
<div class="col-lg-7" style="padding-bottom:120px">

<!-- Báo lỗi khi nhập  -->
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{!! $error !!}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    
    <div class="form-group">
        <label>Category</label>
        <select class="form-control" name="sltParent">
            <option value="0">Please Choose Category</option>
            <?php 
                cate_parent($cate,$parent = 0,$str="--",old('sltParent'));
                ?>
          
            
        </select>
    </div>
        <div class="form-group">
            <label>Thumbnail</label>
            <input type="file" name="fImages"  value="{!! old('fImages') !!}">
        </div>
        <div class="form-group">
            <label>Name</label>
            <input class="form-control" name="txtName"  placeholder="Please Enter Username" value="{!! old('txtName') !!}" />
        </div>
        <div class="form-group">
            <label>Price</label>
            <input class="form-control" name="txtPrice"  placeholder="Please Enter Password" value="{!! old('txtPrice') !!}"/>
        </div>
        <div class="form-group">
            <label>Intro</label>
            <textarea class="form-control" rows="3"  name="txtIntro">{!! old('txtIntro') !!}</textarea>
            <script type="text/javascript">ckeditor("txtIntro")</script>
        </div>
        <div class="form-group">
            <label>Content</label>
            <textarea class="form-control" rows="3" name="txtContent">{!! old('txtContent') !!}</textarea>
            <script type="text/javascript">ckeditor("txtContent")</script>
        </div>        
        <div class="form-group">
            <label>Product Keywords</label>
            <input class="form-control" name="txtKeywords"  placeholder="Please Enter Category Keywords" value="{!! old('txtKeywords') !!}" />
        </div>
        <div class="form-group">
            <label>Product Description</label>
            <textarea class="form-control" rows="3"  name="txtDescription">{!! old('txtDescription') !!}</textarea>
            <script type="text/javascript">ckeditor("txtDescription")</script>
        </div>
        
        <button type="submit" onclick="return xacnhan('Lưu sản phẩm?')" class="btn btn-success">Product Add</button>
    
</div>

<div class="col-md-1"></div>
    <div class="col-md-4">
        <div class="form-group">
            @for($i=1;$i<=10;$i++)
                <br>
                <label>Image Product Detail {!! $i !!}</label>
                <input type="file" name="fProductDetail[]">
            @endfor
        </div>
</div>
<form>
@endsection()