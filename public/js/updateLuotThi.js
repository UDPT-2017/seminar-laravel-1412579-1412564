$(document).ready(function(){
    $('.updateLT').click(function(){
        var qty = $('.qty').val();
        $.ajax({
				url: 'cap-nhat-luot/'+qty,
				type: 'GET',
				cache: false,
				data: {'qty': qty},
				success:function(data){
					if(data == 1){
						window.location='list';
					}
				}
			});
    });
});

