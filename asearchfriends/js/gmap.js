$(function () {
    
    function initMap() {
        var myLatLng = new google.maps.LatLng(21.036554, 105.778757);   
        var map = new google.maps.Map(document.getElementById('map'), {
            center: myLatLng,
            zoom: 15
        });

//        // Create a marker and set its position.
//        var marker = new google.maps.Marker({
//            map: map,
//            position: myLatLng,
//            title: 'You are here'
//        });
    }
    initMap();
});