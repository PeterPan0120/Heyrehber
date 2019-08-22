var MuseumDatatableRemoteAjaxDemo= {
    init:function() {
        var t;
        t=$("#m_museum_datatable").mDatatable( {
            data: {
                type:"remote", 
                source: {
                    read: {
                        url: "/agency/museums_getMuseums",
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
                    width:80, 
                    template: function(t){
                        return "<a href='/agency/museums_museum_detail?id="+t.id+"'>"+t.name+"</a>";
                    }
                }, 
                {
                    field:"entrance_price", 
                    title:"Price", 
                    textAlign: "center",
                    width:80
                },  
                { 
                    field:"summer_rest_days",
                    title:"Closed Days in Summer", 
                    filterable:!1, 
                    textAlign: "center",
                    width:80, 
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
                    width:80, 
                    template: function(t){
                        if(t.winter_rest_days!=""){
                            var days = JSON.parse(t.winter_rest_days);
                            var result="";
                            for(var i=0; i<days.length; i++)
                                result+="<p>"+days[i]+"</p>";
                            return result;
                        }
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
                    field:"Actions", 
                    width:50, 
                    title:"Actions",
                    textAlign: "center", 
                    sortable:!1, 
                    overflow:"visible", 
                    template:function(t, e, a) {
                        return  '\t\t\t\t\t\t'+
                                '<a href="/agency/museums_museum_detail?id='+t.id+'" class="m-portlet__nav-link btn m-btn m-btn--hover-warning m-btn--icon m-btn--icon-only m-btn--pill" title="View Details">'+
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
    // agencies table
    MuseumDatatableRemoteAjaxDemo.init();
});