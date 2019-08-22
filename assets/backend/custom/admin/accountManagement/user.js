var UserDatatableRemoteAjaxDemo= {
    init:function() {
        var t;
        t=$("#m_user_datatable").mDatatable( {
            data: {
                type:"remote", 
                source: {
                    read: {
                        url: "/admin/accountManagement_getUsers",
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
                    field:"name", 
                    title:"Name", 
                    filterable:!1, 
                    textAlign: "center",
                    width:150, 
                }, 
                {
                    field:"email", 
                    title:"Email", 
                    filterable:!1, 
                    textAlign: "center",
                    width:150, 
                }, 
                {
                    field:"role", 
                    title:"Role", 
                    filterable:!1, 
                    textAlign: "center",
                    width:150, 
                    template: function(t){
                        if(t.role==0)
                            return "Admin";
                        else if(t.role==1)
                            return "Supervisor";
                        else if(t.role==2)
                            return "Editor";
                        else if(t.role==3)
                            return "Agency";
                        else if(t.role==4)
                            return "Guide";
                    }
                },
            ]
        }
        )
    }
};
jQuery(document).ready(function() {
    // users table
    UserDatatableRemoteAjaxDemo.init();
    $("#m_user_datatable").on("click", "a[title='Delete']", function(){
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
            ? window.location.href="/auth/delete_user?id="+id
            :"cancel"===e.dismiss&&swal("Cancelled","","error")}) 
    });
});