specialisticsvar SpecialisticsRemoteAjaxDemo= {
    init:function() {
        var t;
        t=$("#m_specialistics_datatable").mDatatable( {
            data: {
                type:"remote", 
                source: {
                    read: {
                        url: "/admin/settings_getSpecialistics",/*"https://keenthemes.com/metronic/themes/themes/metronic/dist/preview/inc/api/datatables/demos/default.php",*/
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
                    field:"specialistics", 
                    title:"Specialistics", 
                    filterable:!1, 
                    textAlign: "center",
                    width:150, 
                }, 
                {
                    field:"Actions", 
                    textAlign: "center",
                    width:110, 
                    title:"Actions", 
                    sortable:!1, 
                    overflow:"visible", 
                    template:function(t, e, a) {
                        return  '\t\t\t\t\t\t'+
                                '<a href="/admin/settings_edit_specialistics?id='+t.id+'" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details">'+
                                    '\t\t\t\t\t\t\t'+
                                    '<i class="la la-edit"></i>'+
                                    '\t\t\t\t\t\t'+
                                '</a>'+
                                '\t\t\t\t\t\t'+
                                '<a class="specialistics-'+t.id+' m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Delete">'+
                                    '\t\t\t\t\t\t\t'+
                                    '<i class="la la-trash"></i>'+
                                    '\t\t\t\t\t\t'+
                                '</a>'+
                                '\t\t\t\t\t';
                    }
                }
            ]
        });
    }
}

;
jQuery(document).ready(function() {
    //categories table
    SpecialisticsRemoteAjaxDemo.init();
    $("#m_specialistics_datatable").on("click", "a[title='Delete']", function(){
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
            ? window.location.href="/admin/settings_delete_specialistics?id="+id
            :"cancel"===e.dismiss&&swal("Cancelled","","error")}) 
    });
    //add category
    $('.form-settings-add-specialistics').submit(function(e){
        e.preventDefault();
        $.ajax({
            url: '/admin/settings_save_specialistics',
            data: $(this).serialize(),
            type: 'post',
            success: function(res){
                if(res=="success"){
                    swal(
                        "Saved!",
                        "This specialistics is successfully saved!",
                        "success").then(function(){
                            window.location.href="/admin/settings_specialistics";
                        });
                }else{
                    swal(
                        "Error!",
                        "This specialistics is already existed!",
                        "error");
                }
            }
        });
    });
    //edit category
    $('.form-settings-edit-specialistics').submit(function(e){
        e.preventDefault();
        $.ajax({
            url: '/admin/settings_update_specialistics',
            data: $(this).serialize(),
            type: 'post',
            success: function(res){
                if(res=="success"){
                    swal(
                        "Updated!",
                        "This specialistics is successfully updated!",
                        "success").then(function(){
                            window.location.href="/admin/settings_specialistics";
                        });
                }else{
                    swal(
                        "Error!",
                        "This specialistics is already existed!",
                        "error");
                }
            }
        });
    });
});