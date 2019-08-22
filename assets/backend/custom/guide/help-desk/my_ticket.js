var MyTicketsDatatableRemoteAjaxDemo= {
    init:function() {
        var t;
        t=$("#m_my_ticket_datatable").mDatatable( {
            data: {
                type:"remote", 
                source: {
                    read: {
                        url: "/guide/help_desk_getMyTickets",
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
                    field:"ticket_id", 
                    title:"Ticket Id", 
                    filterable:!1, 
                    textAlign: "center",
                    width:120, 
                }, 
                {
                    field:"subject", 
                    title:"Subject", 
                    filterable:!1, 
                    textAlign: "center",
                    width:120, 
                    template: function(t){
                        return "<a href='/guide/help_desk_my_ticket_details?id="+t.id+"' title='"+t.subject+"'>"+t.subject+"</a>";
                    }
                }, 
                {
                    field:"priority", 
                    title:"Priority", 
                    filterable:!1, 
                    textAlign: "center",
                    width:80, 
                    template: function(t){
                        if(t.priority=="low")
                            return "<span class='m-badge m-badge--success' style='padding: 0px 10px;'>"+t.priority+"</a>";
                        if(t.priority=="medium")
                            return "<span class='m-badge m-badge--warning' style='padding: 0px 10px;'>"+t.priority+"</a>";
                        else if(t.priority=="urgent")
                            return "<span class='m-badge m-badge--danger m-badget--wide' style='padding: 0px 10px;'>"+t.priority+"</span>";
                    }
                }, 
                {
                    field:"status", 
                    title:"Status", 
                    filterable:!1, 
                    textAlign: "center",
                    width:80,
                }, 
                {
                    field:"submission_date", 
                    title:"Submission Date", 
                    filterable:!1, 
                    textAlign: "center",
                    width:130, 
                }, 
                {
                    field:"last_updated", 
                    title:"Last Updated Date", 
                    filterable:!1, 
                    textAlign: "center",
                    width:130,
                }, 
                {
                    field:"Actions", 
                    width:110, 
                    title:"Actions", 
                    sortable:!1, 
                    overflow:"visible", 
                    textAlign: "center",
                    template:function(t, e, a) {
                        
                        return  '\t\t\t\t\t\t'+
                                '<a href="/guide/help_desk_my_ticket_details?id='+t.id+'" class="m-portlet__nav-link btn m-btn m-btn--hover-warning m-btn--icon m-btn--icon-only m-btn--pill" title="View Details">'+
                                    '\t\t\t\t\t\t\t'+
                                    '<i class="la la-eye"></i>'+
                                    '\t\t\t\t\t\t'+
                                '</a>'+
                                '\t\t\t\t\t\t';
                    }
                }
            ]
        }
        )
    }
};
jQuery(document).ready(function() {
    // guides table
    MyTicketsDatatableRemoteAjaxDemo.init();
    $("#m_my_ticket_datatable").on("click", "a[title='Delete']", function(){
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
            ? window.location.href="/guide/help_desk_delete_ticket?id="+id
            :"cancel"===e.dismiss&&swal("Cancelled","","error")}) 
    });
});