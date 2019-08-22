var TicketDatatableRemoteAjaxDemo= {
    init:function() {
        var t;
        t=$("#m_ticket_datatable").mDatatable( {
            data: {
                type:"remote", 
                source: {
                    read: {
                        url: "/admin/tickets_getTickets",
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
                        pageSizeSelect: [10, 20, 30, 50, 70]
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
                    width: 20, 
                    selector: !1, 
                    textAlign: "center"
                }, 
                {
                    field: "ticket_id", 
                    title: "Ticket Id", 
                    sortable: !1, 
                    width: 120, 
                    selector: !1, 
                    textAlign: "center",
                    template: function(t){
                        if(t.role==3)
                            return "AG-"+t.ticket_id;
                        else if(t.role==4)
                            return "GU-"+t.ticket_id;
                    }
                }, 
                {
                    field:"subject", 
                    title:"Subject", 
                    filterable:!1, 
                    textAlign: "center",
                    width:100, 
                    template: function(t){
                        return "<a href='/admin/tickets_ticket_view?id="+t.id+"' title='"+t.subject+"'>"+t.subject+"</a>";
                    }
                }, 
                {
                    field:"from", 
                    title:"From", 
                    filterable:!1, 
                    textAlign: "center",
                    width:70, 
                }, 
                {
                    field:"priority", 
                    title:"Priority", 
                    filterable:!1, 
                    textAlign: "center",
                    width:70,
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
                    width:70, 
                }, 
                {
                    field:"submission_date", 
                    title:"Submission Date", 
                    filterable:!1, 
                    textAlign: "center",
                    width:120, 
                }, 
                {
                    field:"last_updated", 
                    title:"Last Updated", 
                    filterable:!1, 
                    textAlign: "center",
                    width:120, 
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
                                '<a href="/admin/tickets_ticket_view?id='+t.id+'" class="m-portlet__nav-link btn m-btn m-btn--hover-warning m-btn--icon m-btn--icon-only m-btn--pill" title="View Ticket">'+
                                    '\t\t\t\t\t\t\t'+
                                    '<i class="la la-eye"></i>'+
                                    '\t\t\t\t\t\t'+
                                '</a>'+
                                '\t\t\t\t\t\t'+
                                '<a class="ticket-'+t.id+' m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Delete">'+
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
    // guides table
    TicketDatatableRemoteAjaxDemo.init();
    $("#m_ticket_datatable").on("click", "a[title='Delete']", function(){
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
            ? window.location.href="/admin/tickets_delete_ticket?id="+id
            :"cancel"===e.dismiss&&swal("Cancelled","","error")}) 
    });
    /*//add guide
    $('.form-guide-requests-add-guide-request #select_ticket_regions').select2({placeholder:"Select Regions"});
    $(".form-guide-requests-add-guide-request #select_ticket_requester").select2({
        placeholder:"Search for requester",
        allowClear:!0,
        ajax:{
            url:"/admin/getRequesterName",
            dataType:"json",
            delay:250,
            data:function(e){
                return{q:e.term,page:e.page}
            },
            processResults:function(e,t){
                return t.page=t.page||1,{
                    results:e.items,
                    pagination:{more:30*t.page<e.total_count}
                }
            },
            cache:!0
        },
        escapeMarkup:function(e){return e},
        minimumInputLength:1,
        templateResult:function(e){
            if(e.loading)return e.text;
            var t="<option value="+e.id+">"+e.name+"</option>";
            return t;
        },
        templateSelection:function(e){return e.name||e.text}
    }),
    $('.form-guide-requests-add-guide-request #select_ticket_tour_type').select2({placeholder:"Select Tour Type"});
    $('.form-guide-requests-add-guide-request #range_domestic').change(function(){
        $('.form-guide-requests-add-guide-request #select_ticket_regions').prop("disabled", false);
    });
    $('.form-guide-requests-add-guide-request #range_overseas').change(function(){
        $('.form-guide-requests-add-guide-request #select_ticket_regions').prop("disabled", true);
    });
    $('.form-guide-requests-add-guide-request select[name="tour_type"]').change(function(){
        var tour_type = $(this).val();
        console.log(tour_type);
        var data = {type: tour_type};
        $.ajax({
            url: '/admin/getDayFromTourType',
            data: data,
            type: 'post',
            success: function(res){
                console.log(res);
                if(res=="One Day"){
                    $('.form-guide-requests-add-guide-request input[name="finish_date"]').prop('disabled', true);
                }
                else {
                    $('.form-guide-requests-add-guide-request input[name="finish_date"]').prop('disabled', false);
                }
            }
        })
    })
    $('.form-guide-requests-add-guide-request').submit(function(e){
        e.preventDefault();
        $.ajax({
            url: '/admin/tickets_save_ticket',
            data: $(this).serialize(),
            type: 'post',
            success: function(res){
                if(res['status']=="success"){
                    swal(
                        "Saved!",
                        res['msg'],
                        "success").then(function(){
                            window.location.href="/admin/tickets_tickets";
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
    $('.form-guide-requests-edit-guide-request #select_ticket_regions').select2({placeholder:"Select Regions"});
    $(".form-guide-requests-edit-guide-request #select_ticket_requester").select2({
        placeholder:"Search for requester",
        allowClear:!0,
        ajax:{
            url:"/admin/getRequesterName",
            dataType:"json",
            delay:250,
            data:function(e){
                return{q:e.term,page:e.page}
            },
            processResults:function(e,t){
                return t.page=t.page||1,{
                    results:e.items,
                    pagination:{more:30*t.page<e.total_count}
                }
            },
            cache:!0
        },
        escapeMarkup:function(e){return e},
        minimumInputLength:1,
        templateResult:function(e){
            if(e.loading)return e.text;
            var t="<option value="+e.name+">"+e.name+"</option>";
            return t;
        },
        templateSelection:function(e){return e.name||e.text}
    }),
    $('.form-guide-requests-edit-guide-request #select_ticket_tour_type').select2({placeholder:"Select Tour Type"});
    $('.form-guide-requests-edit-guide-request #select_ticket_tour_type').select2({placeholder:"Select Tour Type"});
    $('.form-guide-requests-edit-guide-request #range_domestic').change(function(){
        $('.form-guide-requests-edit-guide-request #select_ticket_regions').prop("disabled", false);
    });
    $('.form-guide-requests-edit-guide-request #range_overseas').change(function(){
        $('.form-guide-requests-edit-guide-request #select_ticket_regions').prop("disabled", true);
    });
    $('.form-guide-requests-edit-guide-request select[name="tour_type"]').change(function(){
        var tour_type = $(this).val();
        console.log(tour_type);
        var data = {type: tour_type};
        $.ajax({
            url: '/admin/getDayFromTourType',
            data: data,
            type: 'post',
            success: function(res){
                console.log(res);
                if(res=="One Day")
                    $('.form-guide-requests-edit-guide-request input[name="finish_date"]').prop('disabled', true);
                else 
                    $('.form-guide-requests-edit-guide-request input[name="finish_date"]').prop('disabled', false);
            }
        })
    })
    $('.form-guide-requests-edit-guide-request').submit(function(e){
        e.preventDefault();
        $.ajax({
            url: '/admin/tickets_update_ticket',
            data: $(this).serialize(),
            type: 'post',
            success: function(res){
                if(res['status']=="success"){
                    swal(
                        "Updated!",
                        res['msg'],
                        "success").then(function(){
                            window.location.href="/admin/tickets_tickets";
                        });
                }else{
                    swal(
                        "Error!",
                        res['msg'],
                        "error");
                }
            }
        });
    });*/
});