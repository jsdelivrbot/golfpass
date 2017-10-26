<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Base_Controller extends Public_Controller{
    
    function __construct($args =null){
        $args['template_kind']= $args['template_kind'] ?? 'base';
        parent::__construct($args);
    }
  
   
}