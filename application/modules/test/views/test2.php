<!DOCTYPE html>
<html>
<body>

<div id="map" style="width:100%;height:500px;"></div>
<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
<script>
function myMap() {
  var mapCanvas = document.getElementById("map");
  var myCenter=new google.maps.LatLng(51.508742,-0.120850);
  var mapOptions = {center: myCenter, zoom: 5};
  var map = new google.maps.Map(mapCanvas, mapOptions);
  google.maps.event.addListener(map, 'click', function(event) {
    placeMarker(map, event.latLng);
    getTargetInfo(event.latLng);
  });
}
function getTargetInfo(location)
{
  $.ajax({
    type :"post",
    dataType:"json",
    data : {
      'latlng':location.lat()+","+location.lng()
    },
    url:"<?=site_url('/test/get_google_geocode')?>" ,
    success:function(data)
    {
      console.log(data);
    },
    error: function(xhr, textStatus, errorThrown){
            alert('에러... or 데이터 용량이 너무많습니다.');
            $('.loading').fadeOut(500);
            console.log('code: '+request.status+"\n"+'message: '+request.responseText+"\n"+'error: '+error);
            console.log(errorThrown);
        }
  });
}
function placeMarker(map, location) {
  var marker = new google.maps.Marker({
    position: location,
    map: map
  });
  var infowindow = new google.maps.InfoWindow({
    content: 'Latitude: ' + location.lat() + '<br>Longitude: ' + location.lng()
  });
  infowindow.open(map,marker);
}
</script>


<script src="https://maps.googleapis.com/maps/api/js?callback=myMap&key=AIzaSyDG0o9eNwx-e019j2Xe-yBdwrSojDr29eY"></script>
<!--
To use this code on your website, get a free API key from Google.
Read more at: https://www.w3schools.com/graphics/google_maps_basic.asp
-->

</body>
</html>

