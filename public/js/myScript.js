$.ajaxSetup({
     headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});


$(document).ready(function(){
  $("#addImages").click(function(){
    $("#insert").append("<div class='form-group'><input type='file' name='fEditDetail[]'></div>");
  });
});

$(document).ready(function(){
  $("a#del_img").on('click',function(){
    var url = '../delimg/';
    var _token = $("form[name='frmEditProduct']").find("input[name='_token']").val();
    var idHinh = $(this).parent().find("img").attr('idHinh');   
    var img = $(this).parent().find("img").attr('src');
    var rid = $(this).parent().find("img").attr('id');
    //alert(img);
    $.ajax({
      url: url + idHinh,
      type: 'GET',
      cache: false,
      data:{"_token":_token,"idHinh":idHinh,"urlHinh":img},
      success: function (data){
        if(data == 1){
          $("#"+rid).remove();
        }else{
          alert("Không thể xoá hình ảnh !!!");
        }
      }
    });
    //window.confirm('Có chắc chắn muốn xoá hình ảnh không?')
  })
});




function xacnhanxoa(msg){
    if(window.confirm(msg)){
        return true;
    }
    return false;
}


