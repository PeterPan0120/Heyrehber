var SupervisorDatatableRemoteAjaxDemo= {
    init:function() {
        var t;
        t=$("#m_supervisor_datatable").mDatatable( {
            data: {
                type:"remote", 
                source: {
                    read: {
                        url: "/admin/accountManagement_getsupervisors",
                        //url: "https://keenthemes.com/metronic/themes/themes/metronic/dist/preview/inc/api/datatables/demos/default.php",
                        map:function(t) {
                            var e=t;
                            return void 0!==t.data&&(e=t.data), e
                        }
                    }
                }, 
                pageSize:10, 
                serverPaging:!0, 
                serverFiltering:!0, 
                serverSorting:!0
            }, 
            layout: {
                scroll: !1, footer: !1
            }, 
            sortable:!0, 
            pagination:!0, 
            toolbar: {
                items: {
                    pagination: {
                        pageSizeSelect: [10, 20, 30, 50, 100]
                    }
                }
            }, 
            search: {
                input: $("#generalSearch")
            }, 
            columns:[ 
                {
                    field: "id", 
                    title: "ID", 
                    sortable: !1, 
                    width: 40, 
                    selector: !1, 
                    textAlign: "center"
                }, 
                {
                    field:"certificate", 
                    title:"Certificate", 
                    filterable:!1, 
                    textAlign: "center",
                    width:100, 
                    template: function(t){
                        if(t.certificate!=null)
                            return '<img src="/'+t.certificate+'" style="width: 50px; height: 50px; object-fit: cover;">';
                    }
                }, 
                {
                    field:"name", 
                    title:"Supervisor Name", 
                    filterable:!1, 
                    textAlign: "center",
                    width:100, 
                    template: function(t){
                        return t.name+' '+t.sirname;
                    }
                }, 
                {
                    field:"department", 
                    title:"Department", 
                    filterable:!1, 
                    textAlign: "center",
                    width:100, 
                    template: function(t){
                        if(t.department!=""){
                            var departments = JSON.parse(t.department);
                            var result="";
                            for(var i=0; i<departments.length; i++)
                                result+="<p>"+departments[i]+"</p>";
                            return result;
                        }
                    }
                }, 
                {
                    field:"number", 
                    title:"Phone Number", 
                    filterable:!1, 
                    textAlign: "center",
                    width:100, 
                }, 
                {
                    field:"email", 
                    title:"Email", 
                    filterable:!1, 
                    textAlign: "center",
                    width:150, 
                }, 
                {
                    field:"Actions", 
                    width:110, 
                    title:"Actions", 
                    sortable:!1, 
                    textAlign: "center",
                    overflow:"visible", 
                    template:function(t, e, a) {
                        
                        return  '\t\t\t\t\t\t'+
                                '<a href="/admin/accountManagement_supervisor_detail?id='+t.id+'" class="m-portlet__nav-link btn m-btn m-btn--hover-warning m-btn--icon m-btn--icon-only m-btn--pill" title="View Details">'+
                                    '\t\t\t\t\t\t\t'+
                                    '<i class="la la-eye"></i>'+
                                    '\t\t\t\t\t\t'+
                                '</a>'+
                                '\t\t\t\t\t\t'+
                                '<a href="/admin/accountManagement_edit_supervisor?id='+t.id+'" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit Details">'+
                                    '\t\t\t\t\t\t\t'+
                                    '<i class="la la-edit"></i>'+
                                    '\t\t\t\t\t\t'+
                                '</a>'+
                                '\t\t\t\t\t\t'+
                                '<a class="supervisor-'+t.id+' m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Delete">'+
                                    '\t\t\t\t\t\t\t'+
                                    '<i class="la la-trash"></i>'+
                                    '\t\t\t\t\t\t'+
                                '</a>'+
                                '\t\t\t\t\t';
                    }
                }
            ]
        }
        )
    }
};
jQuery(document).ready(function() {
    // supervisors table
    SupervisorDatatableRemoteAjaxDemo.init();
    $("#m_supervisor_datatable").on("click", "a[title='Delete']", function(){
        var id = $(this).attr('class').split(' ')[0].split('-')[1];
        swal({
            title:"Are you sure?",
            text:"You won't be able to revert this!",
            type:"warning",
            showCancelButton:!0,
            confirmButtonText:"Yes, delete it!",
            cancelButtonText:"No, cancel!",
            reverseButtons:!0
        }).then(function(e){
            e.value
            ? window.location.href="/auth/delete_supervisor?id="+id
            :"cancel"===e.dismiss&&swal("Cancelled","","error")}) 
    });
    //add supervisor
    $('.form-supervisors-add-supervisor #select_supervisor_departments').select2({placeholder:"Select Department"});
    $('.form-supervisors-add-supervisor').submit(function(e){
        e.preventDefault();
        console.log($(this).serialize());
        $.ajax({
            url: '/auth/do_signup_supervisor',
            data: $(this).serialize(),
            type: 'post',
            success: function(res){
                if(res['status']=="success"){
                    var id = res['supervisor_id'];
                    var file_data = $('#add_supervisor_certificate').prop('files')[0];
                    var fdata = new FormData();
                    fdata.append('file', file_data);
                    var url = '/auth/upload_supervisor_certificate?supervisor_id='+id;
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
                            window.location.href="/admin/accountManagement_supervisors";
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
    //edit city
    $('.form-supervisors-edit-supervisor #select_supervisor_departments').select2({placeholder:"Select Department"});
    $('.form-supervisors-edit-supervisor').submit(function(e){
        e.preventDefault();
        $.ajax({
            url: '/auth/update_supervisor',
            data: $(this).serialize(),
            type: 'post',
            success: function(res){
                if(res['status']=="success"){
                    var id = res['supervisor_id'];
                    var file_data = $('#edit_supervisor_certificate').prop('files')[0];
                    var fdata = new FormData();
                    fdata.append('file', file_data);
                    var url = '/auth/upload_supervisor_certificate?supervisor_id='+id;
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
                        "Updated!",
                        res['msg'],
                        "success").then(function(){
                            window.location.href="/admin/accountManagement_supervisors";
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
    $('.form-supervisors-add-supervisor input[type="file"]').each(function(){
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
    $('.form-supervisors-edit-supervisor input[type="file"]').each(function(){
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