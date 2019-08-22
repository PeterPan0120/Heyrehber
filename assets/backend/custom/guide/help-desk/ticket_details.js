$(document).ready(function(){
	$('.btn-add-message').click(function(){
		console.log($('.add-reply-message > .add-reply-message-body'));
		if($('.add-reply-message > .add-reply-message-body').hasClass('active')){
			console.log("deactive");
			$('.btn-add-message').html("<i class='fa fa-plus'></i>");
			$('.add-reply-message > .add-reply-message-body').removeClass('active');
			$('.add-reply-message > .add-reply-message-body').addClass('hide');
		}
		else{
			console.log('active');
			$('.btn-add-message').html("<i class='fa fa-minus'></i>");
			$('.add-reply-message > .add-reply-message-body').addClass('active');
			$('.add-reply-message > .add-reply-message-body').removeClass('hide');
		}
	});
	$('.form-message-reply').submit(function(e){
		e.preventDefault();
		$.ajax({
			url: '/guide/add_reply_message',
			type: 'post',
			data: $(this).serialize(),
			success: function(res){
				if(res['status']=="success"){
					swal(
                        "Success!",
                        res['msg'],
                        "success").then(function(){
                            window.location.reload();
                        });
				}else{
					swal(
                        "Error!",
                        res['msg'],
                        "error");
				}
			}
		});
	})
});