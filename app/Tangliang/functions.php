<?php 
	function stripUnicode($str){
		if(!$str) 
			return false;
		$unicode = array(
			'a'=>'á|à|ả|ã|ạ|ă|ắ|ằ|ẵ|ẳ|ặ|â|ấ|ầ|ẫ|ẩ|ậ',
			'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Ấ|Ầ|Ẩ|Ẫ|Ậ|Â',
			'd'=>'đ',
			'D'=>'Đ',
			'e'=>'é|è|ẻ|ẹ|ẽ|ê|ế|ề|ể|ễ|ệ',
			'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
			'i'=>'í|ì|ị|ỉ|ĩ',
			'I'=>'Í|Ì|Ị|Ĩ|Ỉ',
			'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|õ|ợ',
			'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
			'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
			'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
			'y'=>'ý|ỳ|ỷ|ỵ|ỹ',
			'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
			'-'=>'/|<|>'
			);
		foreach ($unicode as $khongdau=>$codau) {
			$arr=explode("|", $codau);
			$str=str_replace($arr, $khongdau, $str);
		}
		return $str;
	}
	

	function changeTitle($str){
		$str=trim($str);
		if($str==="") return "";
		$str = str_replace('"','',$str);
		$str = str_replace("'",'',$str);
		$str = stripUnicode($str);
		$str = mb_convert_case($str,MB_CASE_LOWER,'utf-8');
		
		//mb case upper/title/lower
		$str = str_replace(' ','-',$str);
		return $str;
	}

	function cate_parent($variable,$parent = 0,$str="--",$select=0){
		foreach ($variable as $value) {
			# code...
			$id=$value->id;
			$name=$value->name;

			if($value->parent_id==$parent){
				if($select!=0 && $id==$select){
					echo "<option value='$id' selected='selected'>$str $name</option>";
				}
				else{
					echo "<option value='$id'>$str $name</option>";
				}
				cate_parent($variable,$id,$str."--",$select);
			}
		}
	}
	function DieuKienDelete(){
		echo "<script type='text/javascript'> 
			alert('Bạn không thể xoá Category này! Nó có thể có chứa Category khác!!!');
			window.location= '";
			echo route('admin.cate.getList');
		echo "'
		</script>";
	}
	function Alert()
	{
	    if (Session::has('Alert'))
	    {
	       echo '<script type="text/javascript">swal({
                        title: "Thành công!",
                        text: "Đã thêm vào giỏ hàng thành công!",
                        type: "success",
                        confirmButtonColor: "#05bc05",
                        confirmButtonText: "Trở về",
                        closeOnConfirm: true,
                      });</script>';
	    }

	}
 ?>

 