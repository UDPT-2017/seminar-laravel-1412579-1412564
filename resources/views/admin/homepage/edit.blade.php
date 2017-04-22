@extends('admin.index')
@section('controller','Homepage')
@section('action','Edit')
@section('content')
<style>
    .hinhanh{height:150px; width:auto;}
    .details{height:140px; width:auto; margin-bottom: 20px;}
    .icon_del {position: relative; top:-60px; left: -40px;}
</style>
<!-- /.col-lg-12 -->
<form action="" method="POST" name="frmEditProduct" enctype="multipart/form-data">
<input type="hidden" name="_token" value="{!! csrf_token() !!}">
<div class="col-lg-4" style="padding-bottom:120px">
<h2>Thumbnail {{ $product->id }}</h2>
<!-- Báo lỗi khi nhập sai -->
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{!! $error !!}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="" method="POST">
         <div class="form-group">
            <label>Danh mục trỏ đến</label>
            <select class="form-control" name="sltParent">
                <?php 
                    cate_parent($cate,0,'--',$product->cate_id);
                ?>
            </select>
        </div>
        <div class="form-group">
            <label>Image Current</label>
            <br>
            <img src="{!! asset('public/images/'.$product->image) !!}" class="hinhanh">
            <input type="hidden" name="img_crr" value="{!! $product->image !!}">
        </div>
        <div class="form-group">
            <label>Sửa ảnh</label>
            <input type="file" name="fImages" value="{!! old('fImages') !!}">
        </div>
        <div class="form-group">
            <label>Headline</label>
            <input class="form-control" name="txtHeadline" value="{!! old('txtName',isset($product) ? $product->headline : null) !!}" placeholder="Please Enter Name" />
        </div>
        @if($product->id < 4)
        <div class="form-group">
            <label>Content</label>
            <input class="form-control" name="txtContent"  value="{!! old('txtPrice',isset($product) ? $product->content : null) !!}" placeholder="Please Enter Price" />
        </div>
        @endif
        <button type="submit" onclick="return xacnhan('Bạn muốn lưu thông tin thay đổi?')" class="btn btn-success">Edit</button>  
    </div>
<form>
           
@endsection()