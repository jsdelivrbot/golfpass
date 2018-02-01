<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Hope_travel extends Base_Controller {

    public function index()
    {
        header("Content-Type:application/json");
        
        foreach ($this->input->post() as $key => $value) {
            $this->db->set($key,$value);
        }
        $result =$this->db->insert("hope_travel");
        echo json_encode($result);
    }

}

/* End of file Hope_travel.php */
 ?>