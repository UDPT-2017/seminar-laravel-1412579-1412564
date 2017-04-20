@extends('admin.master')
@section('controller','User')
@section('action','Edit')
@section('content')
       
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="" method="POST">
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
                                <label>Username</label>
                                <input class="form-control" name="txtUser" value="{!! old('txtUser',isset($data) ? $data['username'] : null) !!}"  disabled />
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="txtPass" placeholder="Please Enter Password" />
                            </div>
                            <div class="form-group">
                                <label>RePassword</label>
                                <input type="password" class="form-control" name="txtRePass" placeholder="Please Enter RePassword" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" value="{!! old('txtEmail',isset($data) ? $data['email'] : null) !!}" name="txtEmail" placeholder="Please Enter Email" />
                            </div>
                            <div class="form-group">
                            @if($data['level']==2)
                              
                            @elseif($data['level']==1)
                                <label class="radio-inline">
                                    <input name="rdoLevel" value="1" checked="checked" type="radio">Admin
                                </label>
                                <label class="radio-inline">
                                    <input name="rdoLevel" value="0" type="radio">Member
                                </label>
                            @elseif($data['level']==0 && $user_current_login==2)
                                <label class="radio-inline">
                                    <input name="rdoLevel" value="1" checked="checked" type="radio">Admin
                                </label>
                                <label class="radio-inline">
                                    <input name="rdoLevel" value="0" type="radio">Member
                                </label>
                            @endif
                            </div>
                            <button type="submit" class="btn btn-default">User Edit</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            
@endsection