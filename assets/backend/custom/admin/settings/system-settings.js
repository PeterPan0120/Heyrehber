$(document).ready(function(){
	$('.form-settings-system-settings #select_admin_language').select2({placeholder:"Select Default Admin Language"});
	$('.form-settings-system-settings #select_agency_language').select2({placeholder:"Select Default Agency Language"});
	$('.form-settings-system-settings #select_guide_language').select2({placeholder:"Select Default Guide Language"});
	$('.form-settings-system-settings #select_frontend_language').select2({placeholder:"Select a Frontend Language"});
	$('.form-settings-system-settings #email_active_language').select2({placeholder:"Select a Email Active Language"});
	$('.form-settings-system-settings').submit(function(e){
		e.preventDefault();
		$.ajax({
			url: "/admin/settings_update_system_settings",
			data: $(this).serialize(),
			type: 'post',
			success: function(res){
				console.log(res);
				swal(
	                "Saved!",
	                "System Settings are successfully saved!",
	                "success").then(function(){
	                    if(res=="English")
	                    	window.location.href="/admin/switchLanguage/english";
	                    else if(res=="Turkish")
	                    	window.location.href="/admin/switchLanguage/turkish";
                });
			}
		})
	})
})