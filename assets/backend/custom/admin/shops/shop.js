var ShopDatatableRemoteAjaxDemo= {
    init:function() {
        var t;
        t=$("#m_shop_datatable").mDatatable( {
            data: {
                type:"remote", 
                source: {
                    read: {
                        url: "/admin/shops_getShops",
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
                    field:"name", 
                    title:"Name", 
                    filterable:!1, 
                    width: 80,
                    textAlign: "center",
                    template: function(t){
                        return "<a href='/admin/shops_shop_detail?id="+t.id+"'>"+t.name+"</a>";
                    }
                }, 
                {
                    field:"category", 
                    title:"Category", 
                    filterable:!1, 
                    textAlign: "center",
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
                    field:"district", 
                    title:"District", 
                    filterable:!1, 
                    width: 80,
                    textAlign: "center",
                }, 
                {
                    field:"city", 
                    title:"City", 
                    filterable:!1, 
                    width: 80,
                    textAlign: "center",
                }, 
                {
                    field:"status", 
                    title:"Status", 
                    filterable:!1, 
                    textAlign: "center",
                    template: function(t){
                        if(t.status=="active")
                            return "<span class='m-badge m-badge--success m-badge--wide'>Active</span>";
                        else return "<span class='m-badge m-badge--metal m-badge--wide'>Dective</span>";
                    }
                }, 
                {
                    field:"Actions", 
                    width: 120,
                    title:"Actions", 
                    sortable:!1, 
                    textAlign: "center",
                    overflow:"visible", 
                    template:function(t, e, a) {
                        
                        return  '\t\t\t\t\t\t'+
                                '<a href="/admin/shops_shop_detail?id='+t.id+'" class="m-portlet__nav-link btn m-btn m-btn--hover-warning m-btn--icon m-btn--icon-only m-btn--pill" title="View Details">'+
                                    '\t\t\t\t\t\t\t'+
                                    '<i class="la la-eye"></i>'+
                                    '\t\t\t\t\t\t'+
                                '</a>'+
                                '\t\t\t\t\t\t'+
                                '<a href="/admin/shops_edit_shop?id='+t.id+'" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit Details">'+
                                    '\t\t\t\t\t\t\t'+
                                    '<i class="la la-edit"></i>'+
                                    '\t\t\t\t\t\t'+
                                '</a>'+
                                '\t\t\t\t\t\t'+
                                '<a class="shop-'+t.id+' m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Delete">'+
                                    '\t\t\t\t\t\t\t'+
                                    '<i class="la la-trash"></i>'+
                                    '\t\t\t\t\t\t'+
                                '</a>'+
                                '\t\t\t\t\t';
                    }
                }
            ]
        }
        ),
        $("#select_filter_category").on("change",function(){
            t.search($(this).val(),"category")
        }),
        $("#select_filter_district").on("change",function(){
            t.search($(this).val(),"district")
        }),
        $("#select_filter_city").on("change",function(){
            t.search($(this).val(),"city")
        }),
        $("#select_filter_status").on("change",function(){
            t.search($(this).val(),"status")
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
    var mapOptions = {
        zoom: 14,
        center: myLatlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }

    var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

    var marker = new google.maps.Marker({
        position: myLatlng,
        map: map,
        title: 'Here is Istanbul!'
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
Dropzone.options.shopDropzone = {
    maxThumbnailFilesize: 50,
    addRemoveLinks: true,
    removedfile: function(file) {
        $.ajax({
            url: '/admin/delete_shop_images',
            data: { 'name': file.name},
            type: 'post',
            success: function(res){
                console.log(res);
                if(res=="success")
                    console.log("Successfully removed!");
            }
        });
        var _ref;
        return (_ref = file.previewElement) != null
            ? _ref.parentNode.removeChild(file.previewElement)
            : void 0;
    }
};
jQuery(document).ready(function() {
    // guides table
    ShopDatatableRemoteAjaxDemo.init();

    // $('#select_filter_category').select2({placeholder:"Select Category"});
    // $('#select_filter_district').select2({placeholder:"Select District"});
    // $('#select_filter_city').select2({placeholder:"Select City"});
    // $('#select_filter_status').select2({placeholder:"Select Status"});

    $("#m_shop_datatable").on("click", "a[title='Delete']", function(){
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
            ? window.location.href="/admin/shops_delete_shop?id="+id
            :"cancel"===e.dismiss&&swal("Cancelled","","error")}) 
    });
    //add shop
    $('.form-shops-add-shop #select_shop_categories').select2({placeholder:"Select Shop Categories"});
    $('.form-shops-add-shop #select_shop_district').select2({placeholder:"Select District"});
    $('.form-shops-add-shop #select_shop_city').select2({placeholder:"Select City"});
    $('.form-shops-add-shop #select_shop_country').select2({placeholder:"Select Country"});
    $('.form-shops-add-shop .awesomeRating').awesomeRating({
        valueInitial: "5",
        values: ["1", "2", "3", "4", "5"],
        targetSelector: "input.awesomeRatingValue"
    });
    $('.form-shops-add-shop').submit(function(e){
        e.preventDefault();
        var filenames = [];
        $('#shop_dropzone .dz-details .dz-filename span').each(function(){
            //console.log($(this));
            filenames.push($(this).html());
        });
        var data;
        if(filenames.length!=0)
            data = $(this).serialize()+"&images="+JSON.stringify(filenames);
        else data = $(this).serialize();
        $.ajax({
            url: '/admin/shops_save_shop',
            data: data,
            type: 'post',
            success: function(res){
                //res = JSON.parse(res);
                if(res['status']=="success"){
                    swal(
                        "Saved!",
                        res['msg'],
                        "success").then(function(){
                            window.location.href="/admin/shops_shops";
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
    $('.form-shops-edit-shop #select_shop_categories').select2({placeholder:"Select Shop Categories"});
    $('.form-shops-edit-shop #select_shop_district').select2({placeholder:"Select District"});
    $('.form-shops-edit-shop #select_shop_city').select2({placeholder:"Select City"});
    $('.form-shops-edit-shop #select_shop_country').select2({placeholder:"Select Country"});
    var rating = $('.form-shops-edit-shop input.awesomeRatingValue').val();
    $('.form-shops-edit-shop .awesomeRating').awesomeRating({
        valueInitial: rating,
        values: ["1", "2", "3", "4", "5"],
        targetSelector: "input.awesomeRatingValue"
    });
    $(".form-shops-edit-shop a.dz-remove").click(function(){
        var filename = $(this).parent().find(".dz-filename span").html();
        console.log(filename);
        $.ajax({
            url: '/admin/delete_shop_images',
            data: {name: filename},
            type: 'post',
            success: function(res){
                if(res=="success"){
                    console.log("Successfully removed");
                }
            }
        })
        $(this).parent().remove();
    })
    $('.form-shops-edit-shop').submit(function(e){
        e.preventDefault();
        var filenames = [];
        $('#shop_dropzone .dz-details .dz-filename span').each(function(){
            //console.log($(this));
            filenames.push($(this).html());
        });
        var data;
        if(filenames.length!=0)
            data = $(this).serialize()+"&images="+JSON.stringify(filenames);
        else data = $(this).serialize();
        $.ajax({
            url: '/admin/shops_update_shop',
            data: data,
            type: 'post',
            success: function(res){
                if(res['status']=="success"){
                    swal(
                        "Updated!",
                        res['msg'],
                        "success").then(function(){
                            window.location.href="/admin/shops_shops";
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
    $('.form-shops-add-shop input[type="file"]').each(function(){
      // Refs
      var $file = $(this),
          $label = $file.next('label'),
          $labelText = $label.find('span'),
          labelDefault = $labelText.text();

      // When a new file is selected
      $file.on('change', function(event){
        var fileName = $file.val().split( '\\' ).pop(),
            tmppath = URL.createObjectURL(event.target.files[0]);
        if( fileName ){
          $label
            .addClass('file-ok')
            .css('background-image', 'url(' + tmppath + ')');
          $labelText.text(fileName);
        }else{
          $label.removeClass('file-ok');
          $labelText.text(labelDefault);
        }
      });
    // End loop of file input elements
    });
    $('.form-shops-edit-shop input[type="file"]').each(function(){
      // Refs
      var $file = $(this),
          $label = $file.next('label'),
          $labelText = $label.find('span'),
          labelDefault = $labelText.text();

      // When a new file is selected
      $file.on('change', function(event){
        var fileName = $file.val().split( '\\' ).pop(),
            tmppath = URL.createObjectURL(event.target.files[0]);
        if( fileName ){
          $label
            .addClass('file-ok')
            .css('background-image', 'url(' + tmppath + ')');
          $labelText.text(fileName);
        }else{
          $label.removeClass('file-ok');
          $labelText.text(labelDefault);
        }
      });
    // End loop of file input elements
    });
});