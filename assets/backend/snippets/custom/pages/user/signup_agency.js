$(document).ready(function(){
    // $('#m_signup_agency .m-checkbox input[type="checkbox"]').change(function(){
    //     var status = $(this).prop("checked");
    //     console.log(status);
    //     $('input[type="submit"]').prop('disabled', !status);
    // })
    $(".form-signup-agency").submit(function(e){
      e.preventDefault();
      $.ajax({
          url:"/auth/do_signup_agency",
          data: $(this).serialize(),
          type: 'post',
          success:function(res){
            console.log(res);
            if(res['status']=="success"){
              var id = res['agency_id'];
              var file_data = $('#add_agency_certificate').prop('files')[0];
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
              $.dialogbox({
                type:'msg',
                title:'Success',
                content: res['msg'],
                closeBtn: true,
                btn:['OK'],
                call:[
                  function(){
                    window.location.href="/auth/login";
                  }
                ]
              });
            }
            else if(res['status']=='fail'){
              $.dialogbox({
                type:'msg',
                title:'Fail!',
                content: res['msg'],
                closeBtn:true,
                btn:['OK']
              });
            }
          }
      });
      
    });
    $('.form-signup-agency input[type="file"]').each(function(){
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