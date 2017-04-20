@extends('admin.master')
@section('controller','Category')
@section('action','List')
@section('content')

<script type="text/javascript">
    f($("form-control").val()){
        alert("ahihi");
    }
</script>
<!-- /.col-lg-12 -->
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

    <form action="{!! route('admin.cate.getAdd') !!}" method="POST">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        <div class="form-group">
            <label>Category Parent</label>
            <select class="form-control" name="sltParent">
                <option value="0">Please Choose Category</option>
                <?php 
                    cate_parent($parent);
                    ?>
                <!--
                @foreach($parent as $cat)
                <option value="">{!! $cat["name"] !!}</option>
                @endforeach-->
            </select>
        </div>
        <div class="form-group">
            <label>Category Name</label>
            <input class="form-control"  name="txtCateName" placeholder="Please Enter Category Name" onchange="myFunction(this.value)" value="{!! old('txtCateName') !!} " />
        </div>
        <div class="form-group">
            <label>Category Order</label>
            <input class="form-control" name="txtOrder" placeholder="Please Enter Category Order" onchange="myFunction(this.value)" value="{!! old('txtOrder') !!} "  />
        </div>
        <div class="form-group">
            <label>Category Keywords</label>
            <input class="form-control" name="txtKeywords" placeholder="Please Enter Category Keywords" value="{!! old('txtKeywords') !!}" />
        </div>
        <div class="form-group">
            <label>Category Description</label>
            <textarea class="form-control" rows="3" onchange="myFunction(this.value)" name="txtDescription">{!! old('txtDescription') !!} </textarea>
        </div>
        <div class="form-group">
            <label>Category Status</label>
            <label class="radio-inline">
                <input name="rdoStatus" value="1" checked="" type="radio">Visible
            </label>
            <label class="radio-inline">
                <input name="rdoStatus" value="2" type="radio">Invisible
            </label>
        </div>
        <button type="submit" onclick="return xacnhan('Lưu sản phẩm?')" class="btn btn-default">Category Add</button>
        <button type="reset" class="btn btn-default">Reset</button>
    <form>
</div>


@endsection()