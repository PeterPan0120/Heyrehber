var EditorDatatableRemoteAjaxDemo= {
    init:function() {
        var t;
        t=$("#m_editor_datatable").mDatatable( {
            data: {
                type:"remote", 
                source: {
                    read: {
                        url: "/admin/accountManagement_getEditors",
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
                    title:"Editor Name", 
                    filterable:!1, 
                    textAlign: "center",
                    width:100, 
                    template: function(t){
                        return t.name+' '+t.sirname;
                    }
                }, 
                {
                    field:"supervisor", 
                    title:"Supervisor", 
                    filterable:!1, 
                    textAlign: "center",
                    width:100,
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
                    width:120, 
                    title:"Actions", 
                    sortable:!1, 
                    textAlign: "center",
                    overflow:"visible", 
                    template:function(t, e, a) {
                        
                        return  '\t\t\t\t\t\t'+
                                '<a href="/admin/accountManagement_editor_detail?id='+t.id+'" class="m-portlet__nav-link btn m-btn m-btn--hover-warning m-btn--icon m-btn--icon-only m-btn--pill" title="View Details">'+
                                    '\t\t\t\t\t\t\t'+
                                    '<i class="la la-eye"></i>'+
                                    '\t\t\t\t\t\t'+
                                '</a>'+
                                '\t\t\t\t\t\t'+
                                '<a href="/admin/accountManagement_edit_editor?id='+t.id+'" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit Details">'+
                                    '\t\t\t\t\t\t\t'+
                                    '<i class="la la-edit"></i>'+
                                    '\t\t\t\t\t\t'+
                                '</a>'+
                                '\t\t\t\t\t\t'+
                                '<a class="editor-'+t.id+' m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Delete">'+
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
    // editors table
    EditorDatatableRemoteAjaxDemo.init();
    $("#m_editor_datatable").on("click", "a[title='Delete']", function(){
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
            ? window.location.href="/auth/delete_editor?id="+id
            :"cancel"===e.dismiss&&swal("Cancelled","","error")}) 
    });
    //add editor
    $('.form-editors-add-editor #select_editor_supervisor').select2({placeholder:"Select Supervisor"});
    $('.form-editors-add-editor #select_editor_departments').select2({placeholder:"Select Department"});
    $('.form-editors-add-editor').submit(function(e){
        e.preventDefault();
        console.log($(this).serialize());
        $.ajax({
            url: '/auth/do_signup_editor',
            data: $(this).serialize(),
            type: 'post',
            success: function(res){
                if(res['status']=="success"){
                    var id = res['editor_id'];
                    var file_data = $('#add_editor_certificate').prop('files')[0];
                    var fdata = new FormData();
                    fdata.append('file', file_data);
                    var url = '/auth/upload_editor_certificate?editor_id='+id;
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
                            window.location.href="/admin/accountManagement_editors";
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
    $('.form-editors-edit-editor #select_editor_supervisor').select2({placeholder:"Select Supervisor"});
    $('.form-editors-edit-editor #select_editor_departments').select2({placeholder:"Select Department"});
    $('.form-editors-edit-editor').submit(function(e){
        e.preventDefault();
        $.ajax({
            url: '/auth/update_editor',
            data: $(this).serialize(),
            type: 'post',
            success: function(res){
                if(res['status']=="success"){
                    var id = res['editor_id'];
                    var file_data = $('#edit_editor_certificate').prop('files')[0];
                    var fdata = new FormData();
                    fdata.append('file', file_data);
                    var url = '/auth/upload_editor_certificate?editor_id='+id;
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
                            window.location.href="/admin/accountManagement_editors";
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
    $('.form-editors-add-editor input[type="file"]').each(function(){
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
    $('.form-editors-edit-editor input[type="file"]').each(function(){
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