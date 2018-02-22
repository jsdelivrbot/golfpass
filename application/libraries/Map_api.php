<?php


class Map_api
{
    public $api_key;
    public $language = "ko";
    public $callback ="mapInit";
    public $target = "map";
    public $default_zoom = "2";

    public $address_input_name = "address";
    public $lat_input_name = "lat";
    public $lng_input_name = "lng";
    function create_script()
    {
        ?>
        
        <script>
            var map; //구글맵 변수 전역으로 선언
            var markers = [];
            function mapInit() {
            var mapCanvas = document.getElementById("<?=$this->target?>");
            var myCenter=new google.maps.LatLng(51.508742,-0.120850);
            var mapOptions = {center: myCenter, zoom: <?=$this->default_zoom?>};
            map = new google.maps.Map(mapCanvas, mapOptions);

            //이벤트
            // google.maps.event.addListener(map, 'click', function(event) {
            //   placeMarker(map, event.latLng);
            //   getTargetInfo(event.latLng);
            // });
            }
            function set_location_info(address,lat,lng)
            {
                $("input[name=<?=$this->address_input_name?>]").val(address);
                $("input[name=<?=$this->lat_input_name?>]").val(lat);
                $("input[name=<?=$this->lng_input_name?>]").val(lng);
            }
            function moveToLocation(map,lat, lng){
                var center = new google.maps.LatLng(lat, lng);
                map.panTo(center);
            }

         
            function addMarker(map,lat,lng,address,name,type,latlngSw)
            {
                address =  typeof address !== 'undefined' ? address : null; 
                name=  typeof name!== 'undefined' ? name: null; 
                type=  typeof type!== 'undefined' ? type: null; 
                latlngSw=  typeof latlngSw!== 'undefined' ? latlngSw: true;

                var location=new google.maps.LatLng(lat,lng);
                var marker = new google.maps.Marker({
                        position: location,
                        map: map
                });
                map.setZoom(8);
                markers.push(marker);
                var content ='';
                if(name !== null && name !== 'null' && name !=='')
                {
                    content += name;
                }
                if(type !== null && type !== 'null' && type !=='')
                {
                    //content += `(${type})<br>`;
                    content += "("+type+")<br>";
                }
                else if(name !== null && name !== 'null' && name !=='')
                {
                    content +="<br>";
                }
                if(address !== null && address !== 'null' && address !=='')
                {
                //    content += `${address}<br>`;
                    content += address+"<br>";

                }
                if(latlngSw === true)
                {
                    content += 'Latitude: ' + location.lat() + '<br>Longitude: ' + location.lng();
                }

                var infowindow = new google.maps.InfoWindow({
                    content: content
                });
                infowindow.open(map,marker);
            }
         

            function deleteMarkers() {
            for (var i = 0; i < markers.length; i++) {
                markers[i].setMap(null);
            }
            markers = [];
            }


            // function getTargetInfo(location)
            // {
            // $.ajax({
            //     type :"post",
            //     dataType:"json",
            //     data : {
            //     'latlng':location.lat()+","+location.lng()
            //     },
            //     url:"" ,
            //     success:function(data)
            //     {
            //     console.log(data);
            //     },
            //     error: function(xhr, textStatus, errorThrown){
            //             alert('에러... or 데이터 용량이 너무많습니다.');
            //             $('.loading').fadeOut(500);
            //             console.log('code: '+request.status+"\n"+'message: '+request.responseText+"\n"+'error: '+error);
            //             console.log(errorThrown);
            //         }
            // });
            // }
             </script>
             <script src="https://maps.googleapis.com/maps/api/js?callback=<?=$this->callback?>&key=<?=$this->api_key?>"></script>
        <?php

    }
    function move_to_location($lat,$lng)
    {   
        ?>
        <script>
        moveToLocation(map,<?=$lat?>,<?=$lng?>);
        </script>
        <?php
    }
    function add_marker($lat=null,$lng=null,$address =null,$name =null,$type =null,$lnglatSw="true" )
    {
        ?>
        <script>
        addMarker(map,<?=$lat?>,<?=$lng?>,'<?=$address?>','<?=$name?>','<?=$type?>',<?=$lnglatSw?>);
        </script>
        <?php
    }
    function get_address($info)
    {
        return $info->formatted_address;
    }
    function get_location($info)
    {   
        return $info->geometry->location;
    }
    function geocode($address)
    {
        $url ="https://maps.googleapis.com/maps/api/geocode/json?address=";
        $url .= str_replace(" ","+",$address);
        if($this->api_key)
            $url .= "&key={$this->api_key}";
        if($this->language)
            $url .= "&language={$this->language}";

        $ch = curl_init(); 
        curl_setopt ($ch, CURLOPT_URL,$url); //접속할 URL 주소 
        curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, false); // 인증서 체크같은데 true 시 안되는 경우가 많다. 
        // default 값이 true 이기때문에 이부분을 조심 (https 접속시에 필요) 
        curl_setopt ($ch, CURLOPT_SSLVERSION,4); // SSL 버젼 (https 접속시에 필요) 
        curl_setopt ($ch, CURLOPT_HEADER, 0); // 헤더 출력 여부 
        curl_setopt ($ch, CURLOPT_POST, 0); // Post Get 접속 여부 
        // curl_setopt ($ch, CURLOPT_POSTFIELDS, "latlng=37,126.961452&key=AIzaSyDG0o9eNwx-e019j2Xe-yBdwrSojDr29eY"); // Post 값  Get 방식처럼적는다. 
        // curl_setopt ($ch, CURLOPT_POSTFIELDS, "latlng=37,126.961452&key=AIzaSyDG0o9eNwx-e019j2Xe-yBdwrSojDr29eY"); // Post 값  Get 방식처럼적는다. 
        curl_setopt ($ch, CURLOPT_TIMEOUT, 30); // TimeOut 값 
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1); // 결과값을 받을것인지 
        $infos = curl_exec ($ch); 
        curl_close ($ch); 

        $infos = json_decode($infos);
        $infos = $infos->results;
        
        return $infos;
    }
}