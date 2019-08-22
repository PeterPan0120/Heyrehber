var CityDatatableRemoteAjaxDemo= {
    init:function() {
        var t;
        t=$("#m_city_datatable").mDatatable( {
            data: {
                type:"remote", 
                source: {
                    read: {
                        url: "/admin/settings_getCities",
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
                    field:"city", 
                    title:"City", 
                    filterable:!1, 
                    textAlign: "center",
                    width:150, 
                }, 
                {
                    field:"city_code", 
                    title:"City Code", 
                    filterable:!1, 
                    textAlign: "center",
                    width:150, 
                }, 
                {
                    field:"country", 
                    title:"Country", 
                    filterable:!1, 
                    textAlign: "center",
                    width:150, 
                }, 
                {
                    field:"Actions", 
                    width:120, 
                    title:"Actions", 
                    sortable:!1, 
                    overflow:"visible", 
                    textAlign: "center",
                    template:function(t, e, a) {
                        
                        return  '\t\t\t\t\t\t'+
                                '<a href="/admin/settings_edit_city?id='+t.id+'" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details">'+
                                    '\t\t\t\t\t\t\t'+
                                    '<i class="la la-edit"></i>'+
                                    '\t\t\t\t\t\t'+
                                '</a>'+
                                '\t\t\t\t\t\t'+
                                '<a class="city-'+t.id+' m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Delete">'+
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
}

;
jQuery(document).ready(function() {
    // cities table
    CityDatatableRemoteAjaxDemo.init();
    $("#m_city_datatable").on("click", "a[title='Delete']", function(){
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
            ? window.location.href="/admin/settings_delete_city?id="+id
            :"cancel"===e.dismiss&&swal("Cancelled","","error")}) 
    });
    //add city
    $('.form-settings-add-city #select_country').select2({placeholder:"Select a country"});
    $.ajax({
        url: '/admin/settings_getAllCountries',
        success: function(res){
            res = JSON.parse(res);
            var select = $('.form-settings-add-city #select_country');
            var option="<option></option>";
            select.append(option);
            for(var i=0; i<res.length; i++)
            {
                option = '<option value="'+res[i]['country']+'">'+res[i]['country']+'</option>';
                select.append(option);

            }
        }
    });
    $('.form-settings-add-city').submit(function(e){
        e.preventDefault();
        $.ajax({
            url: '/admin/settings_save_city',
            data: $(this).serialize(),
            type: 'post',
            success: function(res){
                if(res=="success"){
                    swal(
                        "Saved!",
                        "This city is successfully saved!",
                        "success").then(function(){
                            window.location.href="/admin/settings_cities";
                        });
                }else{
                    swal(
                        "Error!",
                        "This city is already existed!",
                        "error");
                }
            }
        });
    });
    //edit city
    $('.form-settings-edit-city #select_country').select2({placeholder:"Select a country"});

    var city_id = $('.form-settings-edit-city .edit_city_id').val();
    var city_country = $('.form-settings-edit-city .edit_city_country').val();
    $.ajax({
        url: '/admin/settings_getAllCountries',
        success: function(res){
            res = JSON.parse(res);
            var select = $('.form-settings-edit-city #select_country');
            var option="<option></option>";
            select.append(option);
            for(var i=0; i<res.length; i++)
            {
                if(res[i]['country']==city_country)
                    option = '<option value="'+res[i]['countr']+'" selected>'+res[i]['country']+'</option>';
                else
                    option = '<option value="'+res[i]['country']+'">'+res[i]['country']+'</option>';
                select.append(option);
            }
        }
    });
    $('.form-settings-edit-city').submit(function(e){
        e.preventDefault();
        $.ajax({
            url: '/admin/settings_update_city',
            data: $(this).serialize(),
            type: 'post',
            success: function(res){
                if(res=="success"){
                    swal(
                        "Updated!",
                        "This city is successfully updated!",
                        "success").then(function(){
                            window.location.href="/admin/settings_cities";
                        });
                }else{
                    swal(
                        "Error!",
                        "This city is already existed!",
                        "error");
                }
            }
        });
    });
});