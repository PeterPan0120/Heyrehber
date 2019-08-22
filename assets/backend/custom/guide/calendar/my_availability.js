var GuideAvailableDaysDatatableRemoteAjaxDemo= {
    init:function() {
        var t;
        t=$("#m_my_availability_datatable").mDatatable( {
            data: {
                type:"remote", 
                source: {
                    read: {
                        url: "/guide/calendar_getMyAvailableDays",
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
                    field:"days", 
                    title:"Days", 
                    filterable:!1, 
                    textAlign: "center",
                    width:120, 
                }, 
                {
                    field:"from", 
                    title:"From", 
                    filterable:!1, 
                    textAlign: "center",
                    width:80, 
                }, 
                {
                    field:"to", 
                    title:"To", 
                    filterable:!1, 
                    textAlign: "center",
                    width:80, 
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
                                '<a href="/guide/calendar_my_availability_details?id='+t.id+'" class="m-portlet__nav-link btn m-btn m-btn--hover-warning m-btn--icon m-btn--icon-only m-btn--pill" title="View Details">'+
                                    '\t\t\t\t\t\t\t'+
                                    '<i class="la la-eye"></i>'+
                                    '\t\t\t\t\t\t'+
                                '</a>'+
                                '\t\t\t\t\t\t'+
                                '<a href="/guide/calendar_edit_my_availability?id='+t.id+'" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit Details">'+
                                    '\t\t\t\t\t\t\t'+
                                    '<i class="la la-edit"></i>'+
                                    '\t\t\t\t\t\t'+
                                '</a>'+
                                '\t\t\t\t\t\t'+
                                '<a class="my_availability-'+t.id+' m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Delete">'+
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
    GuideAvailableDaysDatatableRemoteAjaxDemo.init();
    $("#m_my_availability_datatable").on("click", "a[title='Delete']", function(){
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
            ? window.location.href="/guide/calendar_delete_my_availability?id="+id
            :"cancel"===e.dismiss&&swal("Cancelled","","error")}) 
    });

    //add availability
    $('.form-calendar-add-my-availability #select_my_availability_days').change(function(){
        var value = $(this).val();
        console.log(value);
        //console.log($('.form-calendar-add-my-availability input[name="to"]'));
        //$('.form-calendar-add-my-availability input[name="to"]').remove();
        if(value=="One Day")
            $('.form-calendar-add-my-availability input[name="to"]').prop('disabled', true);
        else 
            $('.form-calendar-add-my-availability input[name="to"]').prop('disabled', false);
    })
    $('.form-calendar-add-my-availability').submit(function(e){
        e.preventDefault();
        $.ajax({
            url: '/guide/calendar_save_my_availability',
            data: $(this).serialize(),
            type: 'post',
            success: function(res){
                //res = JSON.parse(res);
                if(res['status']=="success"){
                    swal(
                        "Saved!",
                        res['msg'],
                        "success").then(function(){
                            window.location.href="/guide/calendar_my_availability";
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
    //edit availability
     $('.form-calendar-edit-my-availability #select_my_availability_days').change(function(){
        var value = $(this).val();
        console.log(value);
        //console.log($('.form-calendar-edit-my-availability input[name="to"]'));
        //$('.form-calendar-edit-my-availability input[name="to"]').remove();
        if(value=="One Day")
            $('.form-calendar-edit-my-availability input[name="to"]').prop('disabled', true);
        else 
            $('.form-calendar-edit-my-availability input[name="to"]').prop('disabled', false);
    })
    $('.form-calendar-edit-my-availability').submit(function(e){
        e.preventDefault();
        $.ajax({
            url: '/guide/calendar_update_my_availability',
            data: $(this).serialize(),
            type: 'post',
            success: function(res){
                if(res['status']=="success"){
                    swal(
                        "Updated!",
                        res['msg'],
                        "success").then(function(){
                            window.location.href="/guide/calendar_my_availability";
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