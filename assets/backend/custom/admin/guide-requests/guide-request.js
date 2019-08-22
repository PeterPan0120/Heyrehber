var GuideRequestDatatableRemoteAjaxDemo= {
    init:function() {
        var t;
        t=$("#m_guide_request_datatable").mDatatable( {
            data: {
                type:"remote", 
                source: {
                    read: {
                        url: "/admin/guide_requests_getGuideRequests",
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
                        pageSizeSelect: [10, 20, 30, 50, 80]
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
                    field:"title", 
                    title:"Title", 
                    filterable:!1, 
                    textAlign: "center",
                    width:80, 
                    template: function(t){
                        return "<a href='/admin/guide_requests_guide_request_detail?id="+t.id+"'>"+t.title+"</a>";
                    }
                }, 
                {
                    field:"requester", 
                    title:"Requester", 
                    filterable:!1, 
                    textAlign: "center",
                    width:80, 
                }, 
                {
                    field:"range", 
                    title:"Range", 
                    filterable:!1, 
                    textAlign: "center",
                    width:80, 
                }, 
                {
                    field:"tour_type", 
                    title:"Type of Tour", 
                    filterable:!1, 
                    textAlign: "center",
                    width:80, 
                }, 
                {
                    field:"start_date", 
                    title:"Period", 
                    filterable:!1, 
                    textAlign: "center",
                    width:120, 
                    template: function(t){
                        var start_date_day = t.start_date.split('-')[2];
                        var start_date_month = t.start_date.split('-')[1];
                        var start_date_year = t.start_date.split('-')[0];
                        var start_date = start_date_day+"."+start_date_month+"."+start_date_year;
                        var finish_date_day = t.finish_date.split('-')[2];
                        var finish_date_month = t.finish_date.split('-')[1];
                        var finish_date_year = t.finish_date.split('-')[0];
                        var finish_date = finish_date_day+"."+finish_date_month+"."+finish_date_year;
                        return start_date+" - "+finish_date;
                        //return t.start_date+' - '+t.finish_date;
                    }
                }, 
                {
                    field:"start_location", 
                    title:"Location", 
                    filterable:!1, 
                    textAlign: "center",
                    width:120, 
                    template: function(t){
                        return t.start_location+' - '+t.finish_location;
                    }
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
                                '<a href="/admin/guide_requests_guide_request_detail?id='+t.id+'" class="m-portlet__nav-link btn m-btn m-btn--hover-warning m-btn--icon m-btn--icon-only m-btn--pill" title="View Details">'+
                                    '\t\t\t\t\t\t\t'+
                                    '<i class="la la-eye"></i>'+
                                    '\t\t\t\t\t\t'+
                                '</a>'+
                                '\t\t\t\t\t\t'+
                                '<a href="/admin/guide_requests_edit_guide_request?id='+t.id+'" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit Details">'+
                                    '\t\t\t\t\t\t\t'+
                                    '<i class="la la-edit"></i>'+
                                    '\t\t\t\t\t\t'+
                                '</a>'+
                                '\t\t\t\t\t\t'+
                                '<a class="guide_request-'+t.id+' m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Delete">'+
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
    GuideRequestDatatableRemoteAjaxDemo.init();
    $("#m_guide_request_datatable").on("click", "a[title='Delete']", function(){
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
            ? window.location.href="/admin/guide_requests_delete_guide_request?id="+id
            :"cancel"===e.dismiss&&swal("Cancelled","","error")}) 
    });
    //add guide
    $('.form-guide-requests-add-guide-request #select_guide_request_regions').select2({placeholder:"Select Regions"});
    $(".form-guide-requests-add-guide-request #select_guide_request_requester").select2({
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
    $('.form-guide-requests-add-guide-request #select_guide_request_tour_type').select2({placeholder:"Select Tour Type"});
    $('.form-guide-requests-add-guide-request #range_domestic').change(function(){
        $('.form-guide-requests-add-guide-request #select_guide_request_regions').prop("disabled", false);
    });
    $('.form-guide-requests-add-guide-request #range_overseas').change(function(){
        $('.form-guide-requests-add-guide-request #select_guide_request_regions').prop("disabled", true);
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
            url: '/admin/guide_requests_save_guide_request',
            data: $(this).serialize(),
            type: 'post',
            success: function(res){
                if(res['status']=="success"){
                    swal(
                        "Saved!",
                        res['msg'],
                        "success").then(function(){
                            window.location.href="/admin/guide_requests_guide_requests";
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
    $('.form-guide-requests-edit-guide-request #select_guide_request_regions').select2({placeholder:"Select Regions"});
    $(".form-guide-requests-edit-guide-request #select_guide_request_requester").select2({
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
    $('.form-guide-requests-edit-guide-request #select_guide_request_tour_type').select2({placeholder:"Select Tour Type"});
    $('.form-guide-requests-edit-guide-request #select_guide_request_tour_type').select2({placeholder:"Select Tour Type"});
    $('.form-guide-requests-edit-guide-request #range_domestic').change(function(){
        $('.form-guide-requests-edit-guide-request #select_guide_request_regions').prop("disabled", false);
    });
    $('.form-guide-requests-edit-guide-request #range_overseas').change(function(){
        $('.form-guide-requests-edit-guide-request #select_guide_request_regions').prop("disabled", true);
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
            url: '/admin/guide_requests_update_guide_request',
            data: $(this).serialize(),
            type: 'post',
            success: function(res){
                if(res['status']=="success"){
                    swal(
                        "Updated!",
                        res['msg'],
                        "success").then(function(){
                            window.location.href="/admin/guide_requests_guide_requests";
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
});