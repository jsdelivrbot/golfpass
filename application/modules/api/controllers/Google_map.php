<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Google_map extends Public_Controller {

    function __construct(){
        parent::__construct();

        $this->load->library("map_api");
        $this->map_api->api_key = $this->setting->google_map_api_key;
      
    }
    

function ajax_get_marker_by_address()
    {
        header("content-type:application/json");
        $search = $this->input->post("search");
       
        $infos=$this->map_api->geocode($search);
        $adress = $this->map_api->get_address($infos[0]);
        $location=$this->map_api->get_location($infos[0]);
        $lat = $location->lat;
        $lng = $location->lng;
        
        // $result=$this->get_content("https://maps.googleapis.com/maps/api/geocode/json");
        // $result = json_encode($result);
        // var_dump($result[0]->formatted_address);
        // var_dump($result);
        // header("Content-Type:application/json");

        $data['callback'] = "

        deleteMarkers();
        moveToLocation(map,{$lat}, {$lng});
        addMarker(map,{$lat}, {$lng},'{$adress}');
        set_location_info('{$adress}',{$lat}, {$lng});
        "; 
        echo json_encode($data);
        return;
    }

}