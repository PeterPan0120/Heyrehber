var MuseumSuggestionDatatableRemoteAjaxDemo= {
    init:function() {
        var t;
        t=$("#m_museum_suggestion_datatable").mDatatable( {
            data: {
                type:"remote", 
                source: {
                    read: {
                        url: "/agency/museums_getMuseumSuggestions",
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
                    field:"name", 
                    title:"Name", 
                    filterable:!1, 
                    textAlign: "center",
                    width:100, 
                    template: function(t){
                        return "<a href='/agency/museums_museum_suggestion_detail?id="+t.id+"'>"+t.name+"</a>";
                    }
                }, 
                { 
                    field:"summer_rest_days",
                    title:"Closed Days in Summer", 
                    filterable:!1, 
                    textAlign: "center",
                    width:100, 
                    template: function(t){
                        if(t.summer_rest_days!=""){
                            var days = JSON.parse(t.summer_rest_days);
                            var result="";
                            for(var i=0; i<days.length; i++)
                                result+="<p>"+days[i]+"</p>";
                            return result;
                        }
                    }
                }, 
                { 
                    field:"winter_rest_days",
                    title:"Closed Days in Winter",
                    filterable:!1, 
                    textAlign: "center",
                    width:100, 
                    template: function(t){
                        var days = JSON.parse(t.winter_rest_days);
                        var result="";
                        for(var i=0; i<days.length; i++)
                            result+="<p>"+days[i]+"</p>";
                        return result;
                    }
                }, 
                {
                    field:"district", 
                    title:"District", 
                    filterable:!1, 
                    textAlign: "center",
                    width:80, 
                }, 
                {
                    field:"city", 
                    title:"City", 
                    filterable:!1, 
                    textAlign: "center",
                    width:80, 
                }, 
                {
                    field:"status", 
                    title:"Status", 
                    filterable:!1, 
                    textAlign: "center",
                    width:80, 
                    template: function(t){
                        if(t.status=="active")
                            return "<span class='m-badge m-badge--success m-badge--wide'>Active</span>";
                        else return "<span class='m-badge m-badge--metal m-badge--wide'>Dective</span>";
                    }
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
                                '<a href="/agency/museums_museum_suggestion_detail?id='+t.id+'" class="m-portlet__nav-link btn m-btn m-btn--hover-warning m-btn--icon m-btn--icon-only m-btn--pill" title="View Details">'+
                                    '\t\t\t\t\t\t\t'+
                                    '<i class="la la-eye"></i>'+
                                    '\t\t\t\t\t\t'+
                                '</a>'+
                                '\t\t\t\t\t\t'+
                                '<a href="/agency/museums_edit_museum_suggestion?id='+t.id+'" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit Details">'+
                                    '\t\t\t\t\t\t\t'+
                                    '<i class="la la-edit"></i>'+
                                    '\t\t\t\t\t\t'+
                                '</a>'+
                                '\t\t\t\t\t\t'+
                                '<a class="museum_suggestion-'+t.id+' m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Delete">'+
                                    '\t\t\t\t\t\t\t'+
                                    '<i class="la la-trash"></i>'+
                                    '\t\t\t\t\t\t'+
                                '</a>'+
                                '\t\t\t\t\t';
                    }
                }            ]
        }
        )
    }
};
function initialize() {
    var lat=$('input[name="lat"]').val();
    var lng=$('input[name="lng"]').val();
    var myLatlng;
    if(lat && lng)
        myLatlng = new google.maps.LatLng(lat, lng);
    else
        myLatlng = new google.maps.LatLng(41.015137, 28.979530);
    console.log(myLatlng);
    var mapOptions = {
        zoom: 14,
        center: myLatlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }

    var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

    var marker = new google.maps.Marker({
        position: myLatlng,
        map: map,
    });

    google.maps.event.addListener(map, "click", function (e) {

        latLng = e.latLng;
        
        //$('input[name="lat"]').val()
        if (marker && marker.setMap) {
            marker.setMap(null);
        }
        marker = new google.maps.Marker({
            position: latLng,
            map: map
        });
        lat = marker.getPosition().lat();
        lng = marker.getPosition().lng();
        $("input[name='lat']").val(lat);
        $("input[name='lng']").val(lng);
    }); 
}
jQuery(document).ready(function() {
    // agencys table
    MuseumSuggestionDatatableRemoteAjaxDemo.init();
    $("#m_museum_suggestion_datatable").on("click", "a[title='Delete']", function(){
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
            ? window.location.href="/agency/museums_delete_museum?id="+id
            :"cancel"===e.dismiss&&swal("Cancelled","","error")}) 
    });
    //add museum
    $('.form-museums-add-museum-suggestion #select_museum_categories').select2({placeholder:"Select Category"});
    $('.form-museums-add-museum-suggestion #select_museum_district').select2({placeholder:"Select District"});
    $('.form-museums-add-museum-suggestion #select_museum_city').select2({placeholder:"Select City"});
    $('.form-museums-add-museum-suggestion #select_museum_country').select2({placeholder:"Select Country"});

    $('.form-museums-add-museum-suggestion').submit(function(e){
        e.preventDefault();
        $.ajax({
            url: '/agency/museums_save_museum',
            data: $(this).serialize(),
            type: 'post',
            success: function(res){
                //res = JSON.parse(res);
                if(res['status']=="success"){
                    swal(
                        "Saved!",
                        res['msg'],
                        "success").then(function(){
                            window.location.href="/agency/museums_museum_suggestions";
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
    //edit museum
    $('.form-museums-edit-museum-suggestion #select_museum_categories').select2({placeholder:"Select Category"});
    $('.form-museums-edit-museum-suggestion #select_museum_district').select2({placeholder:"Select District"});
    $('.form-museums-edit-museum-suggestion #select_museum_city').select2({placeholder:"Select City"});
    $('.form-museums-edit-museum-suggestion #select_museum_country').select2({placeholder:"Select Country"});

    $('.form-museums-edit-museum-suggestion').submit(function(e){
        e.preventDefault();
        $.ajax({
            url: '/agency/museums_update_museum',
            data: $(this).serialize(),
            type: 'post',
            success: function(res){
                if(res['status']=="success"){
                    swal(
                        "Updated!",
                        res['msg'],
                        "success").then(function(){
                            window.location.href="/agency/museums_museum_suggestions";
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