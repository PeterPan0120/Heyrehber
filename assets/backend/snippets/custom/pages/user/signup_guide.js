$(document).ready(function(){
    // $('#m_signup_guide .m-checkbox input[type="checkbox"]').change(function(){
    //     var status = $(this).prop("checked");
    //     console.log(status);
    //     $('input[type="submit"]').prop('disabled', !status);
    // })
    $(".form-signup-guide").submit(function(e){
      console.log($(this).serialize());
      e.preventDefault();
      $.ajax({
          url:"/auth/do_signup_guide",
          data: $(this).serialize(),
          type: 'post',
          success:function(res){
            console.log(res);
            if(res['status']=="success"){
              var id = res['guide_id'];
              var file_data = $('#add_guide_photo').prop('files')[0];
              var fdata = new FormData();
              fdata.append('file', file_data);
              var url = '/auth/upload_guide_photo?guide_id='+id;
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
              file_data = $('#add_certificate_front').prop('files')[0];
              fdata = new FormData();
              fdata.append('file', file_data);
              var url = '/auth/upload_guide_certificate_front?guide_id='+id;
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
              file_data = $('#add_certificate_front').prop('files')[0];
              fdata = new FormData();
              fdata.append('file', file_data);
              var url = '/auth/upload_guide_certificate_back?guide_id='+id;
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
              swal({
                title: "Success!",
                text: res['msg'],
                type: "success"
              }).then(function(){
                window.location.href="/auth/login";
              });
            }
            else if(res['status']=='fail'){
              swal({
                      title: "Fail!",
                      text: res['msg'],
                      type: "error"
                  });
            }
          }
      });
      
    });
    $('.form-signup-guide input[type="file"]').each(function(){
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
          $labelText.text("");
        }else{
          $label.removeClass('file-ok');
          $labelText.text(labelDefault);
        }
      });
    // End loop of file input elements
    });
});