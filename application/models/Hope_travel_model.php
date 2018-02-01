<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Hope_travel_Model extends Board_Model {

    
    function __construct(){
        parent:: __construct();
        $this->table = 'hope_travel';
        $this->as = 'h_t';
    }

    

}

/* End of file Hope_travel_Model.php */
 ?>