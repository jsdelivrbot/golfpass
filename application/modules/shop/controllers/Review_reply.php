<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Review_reply extends Base_Controller {

    function __construct(){
        parent::__construct(array(
            'table'=>'product_review_replys'        
        ));
    }
	
}
