Dropzone.options.ticketDropzone = {
	maxThumbnailFilesize: 20,
	addRemoveLinks: true,
	removedfile: function(file) {
		$.ajax({
	        url: '/admin/delete_attachment',
	        data: { 'name': file.name},
	        type: 'post',
	        success: function(res){
	            console.log(res);
	            if(res=="success")
	                console.log("Successfully removed!");
	        }
	     });
		var _ref;
		return (_ref = file.previewElement) != null
			? _ref.parentNode.removeChild(file.previewElement)
			: void 0;
	}
};
$(document).ready(function(){
	$('.form-help-desk-add-ticket #select_ticket_category').select2({placeholder: "Select Category"});
	$('.form-help-desk-add-ticket #select_ticket_priority').select2({placeholder: "Select Priority"});
	Dropzone.autoDiscover = false;
	$('.form-help-desk-add-ticket').submit(function(e){
		e.preventDefault();
		console.log($(this).serialize());
		var filenames = [];
		$('#ticket_dropzone .dz-details .dz-filename span').each(function(){
			//console.log($(this));
			filenames.push($(this).html());
		});
		var data;
		if(filenames.length!=0)
			data = $(this).serialize()+"&attachment="+JSON.stringify(filenames);
		else data = $(this).serialize();
		console.log(filenames);
		$.ajax({
			url: '/guide/help_desk_save_ticket',
			data: data,
			type: 'post',
			success: function(res){
				if(res['status']=="success"){
					swal(
                        "Success!",
                        res['msg'],
                        "success").then(function(){
                            window.location.href="/guide/help_desk_my_tickets";
                        });
				}else{
					swal(
                        "Error!",
                        res['msg'],
                        "error");
				}
			}
		})
	});
});