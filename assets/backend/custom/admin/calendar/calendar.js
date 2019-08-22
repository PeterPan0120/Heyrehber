var EventDatatableRemoteAjaxDemo= {
    init:function() {
        var t;
        t=$("#m_event_datatable").mDatatable( {
            data: {
                type:"remote", 
                source: {
                    read: {
                        url: "/admin/events_getEvents",
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
                    width: 30, 
                    selector: !1, 
                    textAlign: "center"
                }, 
                {
                    field:"title", 
                    title:"Title", 
                    filterable:!1, 
                    textAlign: "center",
                    width:100, 
                    template: function(t){
                        return "<b><a href='/admin/events_event_detail?id="+t.id+"' style='color:"+t.activity_color+"'>"+t.title+"</a></b>";
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
                    field:"event_date", 
                    title:"Event Date", 
                    filterable:!1, 
                    textAlign: "center",
                }, 
                {
                    field:"start_time", 
                    title:"Event Time", 
                    filterable:!1, 
                    width: 150,
                    textAlign: "center",
                    template: function(t){
                        return "<i class='la la-clock-o'></i>"+t.start_time+" - "+"<i class='la la-clock-o'></i>"+t.finish_time;
                    }
                }, 
                {
                    field:"location", 
                    title:"Location", 
                    filterable:!1, 
                    textAlign: "center",
                    width:80, 
                },  
                {
                    field:"Actions", 
                    width:120, 
                    title:"Actions", 
                    textAlign: "center",
                    sortable:!1, 
                    overflow:"visible", 
                    template:function(t, e, a) {
                        return  '\t\t\t\t\t\t'+
                                '<a href="/admin/events_event_detail?id='+t.id+'" class="m-portlet__nav-link btn m-btn m-btn--hover-warning m-btn--icon m-btn--icon-only m-btn--pill" title="View Details">'+
                                    '\t\t\t\t\t\t\t'+
                                    '<i class="la la-eye"></i>'+
                                    '\t\t\t\t\t\t'+
                                '</a>'+
                                '\t\t\t\t\t\t'+
                                '<a href="/admin/events_edit_event?id='+t.id+'" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit Ddetails">'+
                                    '\t\t\t\t\t\t\t'+
                                    '<i class="la la-edit"></i>'+
                                    '\t\t\t\t\t\t'+
                                '</a>'+
                                '\t\t\t\t\t\t'+
                                '<a class="event-'+t.id+' m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Delete">'+
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
    // events table
    EventDatatableRemoteAjaxDemo.init();
    $("#m_event_datatable").on("click", "a[title='Delete']", function(){
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
            ? window.location.href="/admin/events_delete_event?id="+id
            :"cancel"===e.dismiss&&swal("Cancelled","","error")}) 
    });
    //add event
    $('.form-events-add-event #select_event_guide').select2({placeholder:"Select Guide"});
    $('.form-events-add-event #select_event_tour_type').select2({placeholder:"Select Tour Type"});
    $(".form-events-add-event .colorPickSelector").colorPick({
        'initialColor' : '#27ae60',
        'onColorSelected': function() {
            $('.form-events-add-event .colorPickSelector input[name="activity_color"]').val(this.color);
            this.element.css({'backgroundColor': this.color, 'color': this.color});
        }
    });
    $('.form-events-add-event select[name="tour_type"]').change(function(){
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
                    $('.form-events-add-event input[name="days"]').val("One Day");
                    $('.form-events-add-event sm.desc_tour_type').html("This tour takes only one day.");
                    $('.form-events-add-event input[name="finish_date"]').prop('disabled', true);
                }
                else {
                    $('.form-events-add-event input[name="days"]').val("Several Days");
                    $('.form-events-add-event sm.desc_tour_type').html("This tour takes several days.");
                    $('.form-events-add-event input[name="finish_date"]').prop('disabled', false);
                }
            }
        })
    })
    $('.form-events-add-event').submit(function(e){
        e.preventDefault();
        console.log($(this).serialize());
        $.ajax({
            url: '/admin/events_save_event',
            data: $(this).serialize(),
            type: 'post',
            success: function(res){
                if(res['status']=="success"){
                    swal(
                        "Saved!",
                        res['msg'],
                        "success").then(function(){
                            window.location.href="/admin/events_events";
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
    $('.form-events-edit-event #select_event_guide').select2({placeholder:"Select Guide"});
    $('.form-events-edit-event #select_event_tour_type').select2({placeholder:"Select Tour Type"});
    $('.form-events-edit-event #days_one').change(function(){
        $('.form-events-edit-event input[name="finish_date"]').prop("disabled", true);
    });
    $('.form-events-edit-event #days_several').change(function(){
        $('.form-events-edit-event input[name="finish_date"]').prop("disabled", false);
    });
    $(".form-events-edit-event .colorPickSelector").colorPick({
        'initialColor' : $('.form-events-edit-event .colorPickSelector input[name="activity_color"]').val(),
        'onColorSelected': function() {
            $('.form-events-edit-event .colorPickSelector input[name="activity_color"]').val(this.color);
            this.element.css({'backgroundColor': this.color, 'color': this.color});
        }
    });
    $('.form-events-edit-event').submit(function(e){
        e.preventDefault();
        $.ajax({
            url: '/admin/events_update_event',
            data: $(this).serialize(),
            type: 'post',
            success: function(res){
                if(res['status']=="success"){
                    swal(
                        "Updated!",
                        res['msg'],
                        "success").then(function(){
                            window.location.href="/admin/events_events";
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