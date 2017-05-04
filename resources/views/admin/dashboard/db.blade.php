@extends('admin.index')
@section('content')


            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <p>Trang quản trị website, nếu có thắc mắc hoặc xảy ra tình trạng gì xin liên hệ Facebook mình</p>
                            <a class="btn btn-social-icon btn-facebook" target="_blank" href="https://www.facebook.com/itvmtri"><i class="fa fa-facebook"></i></a>
                        </div>
                    </div>
                    <button class="btn btn-danger btn-circle btn-xl" id="btnTroll" onclick="troll('{{ asset('public/images/traitim.jpg') }}')">
                    	<i class="fa fa-heart"></i>
                    </button>
                </div>
            </div>
        </div>
        <script type="text/javascript">
        	function troll($link){
			    swal({
			      title: "Sweet!",
			      text: "Bạn vừa click vào trái tim!!!",
			      imageUrl: $link,
				  confirmButtonColor: "#DD6B55",
				  confirmButtonText: "Ahihi! Đồ ngốc",
				  closeOnConfirm: false,
			    });
			}
        </script>
        <!-- /#page-wrapper -->
@endsection