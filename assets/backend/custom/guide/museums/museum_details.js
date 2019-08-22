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

    var contentString = '<div id="content">'+
            '<b>Name:</b> <label>'+$('#museum_name').html()+'</label><br>'+
            '<b>Address:</b> <label>'+$('#museum_address').html()+'</label><br>'+
            '<b>district:</b> <label>'+$('#museum_district').html()+'</label><br>'+
            '<b>city:</b> <label>'+$('#museum_city').html()+'</label>'+
            '</div>';

    var infowindow = new google.maps.InfoWindow({
        content: contentString
    });

    var marker = new google.maps.Marker({
        position: myLatlng,
        map: map,
        title: $('#museum_name').html()
    });
    marker.addListener('click', function() {
          infowindow.open(map, marker);
        });
}