$(document).ready(function(){
    // $('#m_signup_guide .m-checkbox input[type="checkbox"]').change(function(){
    //     var status = $(this).prop("checked");
    //     console.log(status);
    //     $('input[type="submit"]').prop('disabled', !status);
    // })
    $(".select2-multiple" ).select2( {
      theme: "bootstrap",
      placeholder: "Select Languages",
      maximumSelectionSize: 4,
    } );
    $(".form-signup-guide").submit(function(e){
      e.preventDefault();
      $.ajax({
          url:"/auth/do_signup_guide",
          data: $(this).serialize(),
          type: 'post',
          success:function(res){
            console.log(res);
            if(res['status']=="success"){
              var from = res['from'];
              var to = res['to'];
              var mailData = res['mailData'];
              swal({
                title: "Confirm your email!", 
                text: "You need to confirm your email to activate your account.", 
                type: 'warning',
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Confirm",
                },function(){
                  window.location.href="/auth/confirm?from="+from+"&to="+to+"&mailData="+mailData;
                });
            }
            else if(res['status']=='fail'){
              swal("Error!", res['msg'], "error");
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