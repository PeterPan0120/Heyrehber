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
			url: '/admin/add_reply_message',
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
	});
	$('.close-ticket').click(function(e){
		e.preventDefault();
		var ticket_id = $(this).attr('class').split(' ')[0].split('-')[2];
		swal({
            title:"Are you sure?",
            text:"You won't be able to revert this!",
            type:"warning",
            showCancelButton:!0,
            confirmButtonText:"Yes",
            cancelButtonText:"No",
            reverseButtons:!0
        }).then(function(e){
            $.ajax({
        		url: "/admin/tickets_close_ticket",
        		data: {'term': ticket_id},
        		type: 'post',
        		success: function(res){
        			console.log(res);
        			if(res['status']=="success"){
        				swal(
	                        "Closed!",
	                        res['msg'],
	                        "success").then(function(){
	                            window.location.reload();
	                    });
        			}
        			else swal( "Error!", res['msg'], "error");
        		}
        	});
        });
	});
	$('.open-ticket').click(function(e){
		e.preventDefault();
		var ticket_id = $(this).attr('class').split(' ')[0].split('-')[2];
		swal({
            title:"Are you sure?",
            text:"You won't be able to revert this!",
            type:"warning",
            showCancelButton:!0,
            confirmButtonText:"Yes",
            cancelButtonText:"No",
            reverseButtons:!0
        }).then(function(e){
            $.ajax({
        		url: "/admin/tickets_open_ticket",
        		data: {'term': ticket_id},
        		type: 'post',
        		success: function(res){
        			console.log(res);
        			if(res['status']=="success"){
        				swal(
	                        "Opend!",
	                        res['msg'],
	                        "success").then(function(){
	                            window.location.reload();
	                    });
        			}
        			else swal( "Error!", res['msg'], "error");
        		}
        	});
        });
	})
});