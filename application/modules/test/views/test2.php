<!DOCTYPE html>
<html>
<body>
  <!-- <form  action="<?=site_url("/test/gets_geocode_name")?>" method="post"> -->
  <form onsubmit="ajax_submit(this); return false;" action="<?=site_url("/test/gets_geocode_name")?>" method="post">
    <input type="text" name="search">
    <input type="submit" value="검색">
  </form>
<div id="map" style="width:100%;height:500px;"></div>

<form action="">
<input type="text" name="address">
<input type="text" name="lat">
<input type="text" name="lng">
<input type="submit" value="위치저장">
</form>
<!-- 자바스크립트 로드 -->
<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>

<!-- 자바스크립트 로드 -->


<script>
  var map; //구글맵 변수 전역으로 선언
  var markers = [];
function mapInit() {
  var mapCanvas = document.getElementById("map");
  var myCenter=new google.maps.LatLng(51.508742,-0.120850);
  var mapOptions = {center: myCenter, zoom: 2};
  map = new google.maps.Map(mapCanvas, mapOptions);

  //이벤트
  // google.maps.event.addListener(map, 'click', function(event) {
  //   placeMarker(map, event.latLng);
  //   getTargetInfo(event.latLng);
  // });
}
function set_location_info(address,lat,lng)
{
  $("input[name=address]").val(address);
  $("input[name=lat]").val(lat);
  $("input[name=lng]").val(lng);
}
function moveToLocation(map,lat, lng){
    var center = new google.maps.LatLng(lat, lng);
    map.panTo(center);
}

function placeMarker(map, address,lat,lng) {
  
  var location=new google.maps.LatLng(lat,lng);
  var marker =addMarker(map,lat,lng);

  var infowindow = new google.maps.InfoWindow({
    content: address+'<br>Latitude: ' + location.lat() + '<br>Longitude: ' + location.lng()
  });
  infowindow.open(map,marker);
 
}

function addMarker(map,lat,lng) {

  var location=new google.maps.LatLng(lat,lng);
  var marker = new google.maps.Marker({
          position: location,
          map: map
  });
  map.setZoom(8);
  markers.push(marker);
  return marker;
 
}

function deleteMarkers() {
  for (var i = 0; i < markers.length; i++) {
      markers[i].setMap(null);
  }
  markers = [];
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

</script>


<script src="https://maps.googleapis.com/maps/api/js?callback=mapInit&key=AIzaSyDG0o9eNwx-e019j2Xe-yBdwrSojDr29eY"></script>
<!--
To use this code on your website, get a free API key from Google.
Read more at: https://www.w3schools.com/graphics/google_maps_basic.asp
-->

</body>
</html>

<script src="<?=domain_url('/public/js/common.js')?>"></script>