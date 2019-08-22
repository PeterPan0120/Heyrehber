var NonFavouriteagencyRemoteAjaxDemo= {
    init:function() {
        var t;
        t=$("#m_non_favourite_agency_datatable").mDatatable( {
            data: {
                type:"remote", 
                source: {
                    read: {
                        url: "/guide/my_favourites_getNonFavouriteAgencies",
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
                    field:"non_favourite_agency", 
                    title:"agency", 
                    filterable:!1, 
                    textAlign: "center",
                    width:100, 
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
                                '<a href="/guide/my_favourites_non_favourite_agency_detail?id='+t.id+'" class="m-portlet__nav-link btn m-btn m-btn--hover-warning m-btn--icon m-btn--icon-only m-btn--pill" title="View Details">'+
                                    '\t\t\t\t\t\t\t'+
                                    '<i class="la la-eye"></i>'+
                                    '\t\t\t\t\t\t'+
                                '</a>'+
                                '\t\t\t\t\t\t'+
                                '<a href="/guide/my_favourites_edit_non_favourite_agency?id='+t.id+'" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit Details">'+
                                    '\t\t\t\t\t\t\t'+
                                    '<i class="la la-edit"></i>'+
                                    '\t\t\t\t\t\t'+
                                '</a>'+
                                '\t\t\t\t\t\t'+
                                '<a class="non_favourite_agency-'+t.id+' m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Delete">'+
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
    // agencys table
    NonFavouriteagencyRemoteAjaxDemo.init();
    $("#m_non_favourite_agency_datatable").on("click", "a[title='Delete']", function(){
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
            ? window.location.href="/guide/my_favourites_delete_non_favourite_agency?id="+id
            :"cancel"===e.dismiss&&swal("Cancelled","","error")}) 
    });
    //add restaurant
    $('.form-my-favourites-add-non-favourite-agency #select_non_favourite_agency').select2({placeholder:"Select agency"});
    
    $('.form-my-favourites-add-non-favourite-agency').submit(function(e){
        e.preventDefault();
        $.ajax({
            url: '/guide/my_favourites_save_non_favourite_agency',
            data: $(this).serialize(),
            type: 'post',
            success: function(res){
                //res = JSON.parse(res);
                if(res['status']=="success"){
                    swal(
                        "Saved!",
                        res['msg'],
                        "success").then(function(){
                            window.location.href="/guide/my_favourites_non_favourite_agencies";
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
    $('.form-my-favourites-edit-non-favourite-agency #select_non_favourite_agency').select2({placeholder:"Select Agency"});
    $('.form-my-favourites-edit-non-favourite-agency').submit(function(e){
        e.preventDefault();
        $.ajax({
            url: '/guide/my_favourites_update_non_favourite_agency',
            data: $(this).serialize(),
            type: 'post',
            success: function(res){
                if(res['status']=="success"){
                    swal(
                        "Updated!",
                        res['msg'],
                        "success").then(function(){
                            window.location.href="/guide/my_favourites_non_favourite_agencies";
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