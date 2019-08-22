var AgencyDatatableRemoteAjaxDemo= {
    init:function() {
        var t;
        t=$("#m_agency_datatable").mDatatable( {
            data: {
                type:"remote", 
                source: {
                    read: {
                        url: "/admin/agencies_getAgencies",
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
                    selector: !1, 
                    textAlign: "center",
                    width: 40
                }, 
                {
                    field:"agency_name", 
                    title:"Agency Name", 
                    filterable:!1, 
                    textAlign: "center",
                    width: 100,
                    template: function(t){
                        return "<a href='/admin/agencies_agency_detail?id="+t.id+"'>"+t.agency_name+"</a>";
                    }
                }, 
                {
                    field:"certificate_number", 
                    title:"Certificate Number", 
                    filterable:!1, 
                    textAlign: "center",
                },
                {
                    field:"group", 
                    title:"Group", 
                    filterable:!1, 
                    textAlign: "center",
                    width: 80
                }, 
                {
                    field:"city", 
                    title:"City", 
                    filterable:!1, 
                    textAlign: "center",
                    width: 80
                }, 
                {
                    field:"district", 
                    title:"District", 
                    filterable:!1, 
                    textAlign: "center",
                    width: 80
                }, 
                {
                    field:"status", 
                    title:"Status", 
                    filterable:!1, 
                    textAlign: "center",
                    template: function(t){
                        if(t.status=="active")
                            return "<span class='m-badge m-badge--success m-badge--wide'>Active</span>";
                        else return "<span class='m-badge m-badge--metal m-badge--wide'>Dective</span>";
                    }
                }, 
                {
                    field:"Actions", 
                    title:"Actions", 
                    sortable:!1, 
                    overflow:"visible", 
                    textAlign: "center",
                    width:120, 
                    template:function(t, e, a) {
                        
                        return  '\t\t\t\t\t\t'+
                                '<a href="/admin/agencies_agency_detail?id='+t.id+'" class="m-portlet__nav-link btn m-btn m-btn--hover-warning m-btn--icon m-btn--icon-only m-btn--pill" title="View Details">'+
                                    '\t\t\t\t\t\t\t'+
                                    '<i class="la la-eye"></i>'+
                                    '\t\t\t\t\t\t'+
                                '</a>'+
                                '\t\t\t\t\t\t'+
                                '<a href="/admin/agencies_edit_agency?id='+t.id+'" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit Details">'+
                                    '\t\t\t\t\t\t\t'+
                                    '<i class="la la-edit"></i>'+
                                    '\t\t\t\t\t\t'+
                                '</a>'+
                                '\t\t\t\t\t\t'+
                                '<a class="agency-'+t.id+' m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Delete">'+
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
        $("#select_filter_group").on("change",function(){
            t.search($(this).val(),"group")
        }),
        $("#select_filter_district").on("change",function(){
            t.search($(this).val(),"district")
        }),
        $("#select_filter_city").on("change",function(){
            t.search($(this).val(),"city")
        }),
        $("#select_filter_status").on("change",function(){
            t.search($(this).val(),"status")
        })
    }
};
jQuery(document).ready(function() {
    // agencies table
    AgencyDatatableRemoteAjaxDemo.init();
    $("#m_agency_datatable").on("click", "a[title='Delete']", function(){
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
            ? window.location.href="/auth/delete_agency?id="+id
            :"cancel"===e.dismiss&&swal("Cancelled","","error")}) 
    });
    $('.form-agencies-add-agency #select_agency_group').select2({placeholder:"Select Group"});
    $('.form-agencies-add-agency #select_agency_user_city').select2({placeholder:"Select City"});
    $('.form-agencies-add-agency #select_agency_user_district').select2({placeholder:"Select District"});
    $('.form-agencies-add-agency #select_agency_company_city').select2({placeholder:"Select City"});
    $('.form-agencies-add-agency #select_agency_company_district').select2({placeholder:"Select District"});
    //add agency
    $('.form-agencies-add-agency').submit(function(e){
        e.preventDefault();
        console.log($(this).serialize());
        $.ajax({
            url: '/auth/do_signup_agency',
            data: $(this).serialize(),
            type: 'post',
            success: function(res){
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
                    file_data = $('#add_agency_photo').prop('files')[0];
                    fdata = new FormData();
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
                            window.location.href="/admin/agencies_agencies";
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

    $('.form-agencies-edit-agency #select_agency_group').select2({placeholder:"Select Group"});
    $('.form-agencies-edit-agency #select_agency_user_city').select2({placeholder:"Select City"});
    $('.form-agencies-edit-agency #select_agency_user_district').select2({placeholder:"Select District"});
    $('.form-agencies-edit-agency #select_agency_company_city').select2({placeholder:"Select City"});
    $('.form-agencies-edit-agency #select_agency_company_district').select2({placeholder:"Select District"});
    $('.form-agencies-edit-agency').submit(function(e){
        e.preventDefault();
        $.ajax({
            url: '/auth/update_agency',
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
                    file_data = $('#edit_agency_photo').prop('files')[0];
                    fdata = new FormData();
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
                        "Updated!",
                        res['msg'],
                        "success").then(function(){
                            window.location.href="/admin/agencies_agencies";
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
    $('.form-agencies-add-agency input[type="file"]').each(function(){
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
    $('.form-agencies-edit-agency input[type="file"]').each(function(){
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
});