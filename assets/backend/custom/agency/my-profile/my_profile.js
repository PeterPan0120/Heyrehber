$(document).ready(function(){
	$('.form-agency-my-profile-agency-profile #select_agency_group').select2({placeholder:"Select Group"});
    $('.form-agency-my-profile-personal-profile #select_agency_user_city').select2({placeholder:"Select City"});
    $('.form-agency-my-profile-personal-profile #select_agency_user_district').select2({placeholder:"Select District"});
    $('.form-agency-my-profile-agency-profile #select_agency_company_city').select2({placeholder:"Select City"});
    $('.form-agency-my-profile-agency-profile #select_agency_company_district').select2({placeholder:"Select District"});

    //add agency
    $('.form-agency-my-profile-personal-profile').submit(function(e){
        e.preventDefault();
        console.log($(this).serialize());
        $.ajax({
            url: '/auth/update_agencyProfile',
            data: $(this).serialize(),
            type: 'post',
            success: function(res){
                if(res['status']=="success"){
                    var id = res['agency_id'];
                    var file_data = $('#edit_agency_photo').prop('files')[0];
                    var fdata = new FormData();
                    fdata.append('file', file_data);
                    var url = '/auth/upload_agency_photo?agency_id='+id;
                    $.ajax({
                        url: url, // point to server-side PHP script 
                        dataType: 'text',  // what to expect back from the PHP script, if anything
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: fdata,                         
                        type: 'post',
                        success: function(upload_path){
                        }
                    });
                    swal(
                        "Saved!",
                        res['msg'],
                        "success").then(function(){
                            //console.log(res['redirect']);
                            if(!res['redirect'])
                                window.location.href="/auth/logout";
                            else window.location.href="/agency/my_profile";
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
    $('.form-agency-my-profile-agency-profile').submit(function(e){
        e.preventDefault();
        console.log($(this).serialize());
        $.ajax({
            url: '/auth/update_agencyProfile',
            data: $(this).serialize(),
            type: 'post',
            success: function(res){
                if(res['status']=="success"){
                    var id = res['agency_id'];
                    var file_data = $('#edit_agency_certificate').prop('files')[0];
                    var fdata = new FormData();
                    fdata.append('file', file_data);
                    var url = '/auth/upload_agency_certificate?agency_id='+id;
                    $.ajax({
                        url: url, // point to server-side PHP script 
                        dataType: 'text',  // what to expect back from the PHP script, if anything
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: fdata,                         
                        type: 'post',
                        success: function(upload_path){
                        }
                    });
                    swal(
                        "Saved!",
                        res['msg'],
                        "success").then(function(){
                            //console.log(res['redirect']);
                            if(!res['redirect'])
                                window.location.href="/auth/logout";
                            else window.location.href="/agency/my_profile";
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
    $('.form-agency-my-profile-social-media-profile').submit(function(e){
        e.preventDefault();
        console.log($(this).serialize());
        $.ajax({
            url: '/auth/update_agencyProfile',
            data: $(this).serialize(),
            type: 'post',
            success: function(res){
                if(res['status']=="success"){
                    swal(
                        "Saved!",
                        res['msg'],
                        "success").then(function(){
                            window.location.href="/agency/my_profile";
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
    $('.form-agency-my-profile-personal-profile input[type="file"]').each(function(){
      // Refs
      var $file = $(this),
          $label = $file.next('label'),
          $labelText = $label.find('span'),
          labelDefault = $labelText.text();

      // When a new file is selected
      $file.on('change', function(event){
        var fileName = $file.val().split( '\\' ).pop(),
            tmppath = URL.createObjectURL(event.target.files[0]);
        if( fileName ){
          $label
            .addClass('file-ok')
            .css('background-image', 'url(' + tmppath + ')');
          $labelText.text(fileName);
        }else{
          $label.removeClass('file-ok');
          $labelText.text(labelDefault);
        }
      });
    // End loop of file input elements
    });
    $('.form-agency-my-profile-agency-profile input[type="file"]').each(function(){
      // Refs
      var $file = $(this),
          $label = $file.next('label'),
          $labelText = $label.find('span'),
          labelDefault = $labelText.text();

      // When a new file is selected
      $file.on('change', function(event){
        var fileName = $file.val().split( '\\' ).pop(),
            tmppath = URL.createObjectURL(event.target.files[0]);
        if( fileName ){
          $label
            .addClass('file-ok')
            .css('background-image', 'url(' + tmppath + ')');
          $labelText.text(fileName);
        }else{
          $label.removeClass('file-ok');
          $labelText.text(labelDefault);
        }
      });
    // End loop of file input elements
    });

    var html = $(".change-password").html();
    if($('.change-password').hasClass("hide")){
        $(".change-password").html("");
    }
    $('.pwd-change').click(function(e){
        e.preventDefault();
        if($(".change-password").hasClass('show')){
            $(".change-password").removeClass('show');
            $(".change-password").addClass('hide');
            $('.change-password').html("");
        }
        else{
            $(".change-password").removeClass('hide');
            $(".change-password").addClass('show');
            $('.change-password').html(html);
        }
    });
});
