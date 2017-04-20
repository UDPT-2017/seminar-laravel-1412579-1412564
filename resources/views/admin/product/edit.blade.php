@extends('admin.master')
@section('controller','Product')
@section('action','Edit')
@section('content')
<style>
    .hinhanh{height:150px; width:auto;}
    .details{height:140px; width:auto; margin-bottom: 20px;}
    .icon_del {position: relative; top:-60px; left: -40px;}
</style>
<!-- /.col-lg-12 -->
<form action="" method="POST" name="frmEditProduct" enctype="multipart/form-data">
<div class="col-lg-7" style="padding-bottom:120px">
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
    
    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        <div class="form-group">
            <label>Category Parent</label>
            <select class="form-control" name="sltParent">
                <option value="0">Please Choose Category</option>
                <?php 
                    cate_parent($cate,0,'--',$product['cate_id']);
                ?>
            </select>
        </div>
    <form action="" method="POST">
        <div class="form-group">
            <label>Image Current</label>
            <br>
            <img src="{!! asset('resources/upload/images/'.$product['image']) !!}" class="hinhanh" >
            <input type="hidden" name="img_crr" value="{!! $product['image'] !!}">
        </div>
        <div class="form-group">
            <label>Sửa ảnh đại diện</label>
            <input type="file" name="fImages" onchange="myFunction(this.value)" value="{!! old('fImages') !!}">
        </div>
        <div class="form-group">
            <label>Name</label>
            <input class="form-control" name="txtName" onchange="myFunction(this.value)" value="{!! old('txtName',isset($product) ? $product['name'] : null) !!}" placeholder="Please Enter Name" />
        </div>
        <div class="form-group">
            <label>Price</label>
            <input class="form-control" name="txtPrice" onchange="myFunction(this.value)" value="{!! old('txtPrice',isset($product) ? $product['price'] : null) !!}" placeholder="Please Enter Price" />
        </div>
        <div class="form-group">
            <label>Intro</label>
            <textarea class="form-control" rows="3" onchange="myFunction(this.value)" name="txtIntro">{!! old('txtIntro',isset($product) ? $product['intro'] : null) !!}</textarea>
            <script type="text/javascript">ckeditor("txtIntro")</script>
        </div>
        <div class="form-group">
            <label>Content</label>
            <textarea class="form-control" rows="3" onchange="myFunction(this.value)" name="txtContent">{!! old('txtContent',isset($product) ? $product['content'] : null) !!}</textarea>
            <script type="text/javascript">ckeditor("txtContent")</script>
        </div>
        <div class="form-group">
            <label>Product Keywords</label>
            <input class="form-control" name="txtKeywords" onchange="myFunction(this.value)" value="{!! old('txtKeywords',isset($product) ? $product['keywords'] : null) !!}" placeholder="Please Enter Keywords" />
        </div>
        <div class="form-group">
            <label>Product Description</label>
            <textarea class="form-control" rows="3" onchange="myFunction(this.value)" name="txtDescription"> {!! old('txtDescription',isset($product) ? $product['description'] : null) !!} </textarea>
            <script type="text/javascript">ckeditor("txtDescription")</script>
        </div>
        <div class="form-group">
            <label>Product Status</label>
            <label class="radio-inline">
                <input name="rdoStatus" value="1" checked="" type="radio">Visible
            </label>
            <label class="radio-inline">
                <input name="rdoStatus" value="2" type="radio">Invisible
            </label>
        </div>
        <button type="submit" onclick="return xacnhan('Bạn muốn lưu thông tin thay đổi?')" class="btn btn-default">Product Edit</button>
        <button type="reset" class="btn btn-default">Reset</button>
    
</div>
<div class="col-md-1"></div>
<div class="col-md-4">
    @foreach($product_img as $key => $item)
    
    <div class="form-group" id="{!! $key !!}" >
        <img src="{!! asset('resources/upload/details/'.$item['image']) !!}" class="details"  id="{!! $key !!}" idHinh="{!! $item['id'] !!}">
        <a href="javascript:void(0)" type="button" onclick="return xacnhanxoa('Bạn có chắc chắn muốn xoá hình này?')" id="del_img" class="btn btn-danger btn-circle icon_del" href=""><i class="fa fa-times"></i></a>
    </div>

    @endforeach
    
    <div id="insert"></div>
    <button type="button" class="btn btn-primary" id="addImages">Add more image</button>
</div>
<form>
           
@endsection()