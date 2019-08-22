var RestaurantDatatableRemoteAjaxDemo= {
    init:function() {
        var t;
        t=$("#m_restaurant_datatable").mDatatable( {
            data: {
                type:"remote", 
                source: {
                    read: {
                        url: "/guide/restaurants_getRestaurants",
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
                        return "<a href='/guide/restaurants_restaurant_details?id="+t.id+"'>"+t.name+"</a>";
                    }
                }, 
                {
                    field:"category", 
                    title:"Category", 
                    filterable:!1, 
                    textAlign: "center",
                    width:80, 
                    template:function(t, e, a) {
                        if(t.category!=""){
                            var cate = JSON.parse(t.category);
                            var result="";
                            for(var i=0; i<cate.length; i++)
                                result+="<p>"+cate[i]+"</p>";
                            return result;
                        }
                    }
                }, 
                {
                    field:"rating", 
                    title:"Rating", 
                    filterable:!1, 
                    textAlign: "center",
                    width:100, 
                    template: function(t){
                        var result="";
                        for(var i=0; i<t.rating; i++)
                            result+="<i class='flaticon-star' style='color: #FDD05B;'></i>";
                        for(i=0; i<5-t.rating; i++)
                            result+="<i class='flaticon-star' style='color: #d0d0d0;'></i>";
                        return result;
                    }
                }, 
                {
                    field:"address", 
                    title:"Address", 
                    filterable:!1, 
                    textAlign: "center",
                    width:80, 
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
                    field:"number", 
                    title:"Restaurant Number", 
                    filterable:!1, 
                    textAlign: "center",
                    width:80, 
                }, 
                {
                    field:"Actions", 
                    width:50, 
                    title:"Actions",
                    textAlign: "center", 
                    sortable:!1, 
                    overflow:"visible", 
                    template:function(t, e, a) {
                        return  '\t\t\t\t\t\t'+
                                '<a href="/guide/restaurants_restaurant_details?id='+t.id+'" class="m-portlet__nav-link btn m-btn m-btn--hover-warning m-btn--icon m-btn--icon-only m-btn--pill" title="View Details">'+
                                    '\t\t\t\t\t\t\t'+
                                    '<i class="la la-eye"></i>'+
                                    '\t\t\t\t\t\t'+
                                '</a>'+
                                '\t\t\t\t\t';
                    }
                }
            ]
        }
        )
        $("#select_filter_category").on("change",function(){
            t.search($(this).val(),"category")
        }),
        $("#select_filter_district").on("change",function(){
            t.search($(this).val(),"district")
        }),
        $("#select_filter_city").on("change",function(){
            t.search($(this).val(),"city")
        })
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
    // guides table
    RestaurantDatatableRemoteAjaxDemo.init();
    $("#m_restaurant_datatable").on("click", "a[title='Delete']", function(){
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
            ? window.location.href="/guide/restaurants_delete_restaurant?id="+id
            :"cancel"===e.dismiss&&swal("Cancelled","","error")}) 
    });
    //add restaurant
    $('.form-restaurants-add-restaurant #select_restaurant_categories').select2({placeholder:"Select Restaurant Categories"});
    $('.form-restaurants-add-restaurant #select_restaurant_city').select2({placeholder:"Select City"});
    $('.form-restaurants-add-restaurant #select_restaurant_country').select2({placeholder:"Select Country"});
    $('.form-restaurants-add-restaurant .awesomeRating').awesomeRating({
        valueInitial: "5",
        values: ["1", "2", "3", "4", "5"],
        targetSelector: "input.awesomeRatingValue"
    });
    $('.form-restaurants-add-restaurant').submit(function(e){
        e.preventDefault();
        $.ajax({
            url: '/guide/restaurants_save_restaurant',
            data: $(this).serialize(),
            type: 'post',
            success: function(res){
                //res = JSON.parse(res);
                if(res['status']=="success"){
                    swal(
                        "Saved!",
                        res['msg'],
                        "success").then(function(){
                            window.location.href="/guide/restaurants_restaurants";
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
    $('.form-restaurants-edit-restaurant #select_restaurant_categories').select2({placeholder:"Select restaurant Categories"});
    $('.form-restaurants-edit-restaurant #select_restaurant_city').select2({placeholder:"Select City"});
    $('.form-restaurants-edit-restaurant #select_restaurant_country').select2({placeholder:"Select Country"});
    var rating = $('.form-restaurants-edit-restaurant input.awesomeRatingValue').val();
    $('.form-restaurants-edit-restaurant .awesomeRating').awesomeRating({
        valueInitial: rating,
        values: ["1", "2", "3", "4", "5"],
        targetSelector: "input.awesomeRatingValue"
    });
    $('.form-restaurants-edit-restaurant').submit(function(e){
        e.preventDefault();
        $.ajax({
            url: '/guide/restaurants_update_restaurant',
            data: $(this).serialize(),
            type: 'post',
            success: function(res){
                if(res['status']=="success"){
                    swal(
                        "Updated!",
                        res['msg'],
                        "success").then(function(){
                            window.location.href="/guide/restaurants_restaurants";
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