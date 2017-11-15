<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
if(!function_exists('is_admin')){
    function is_admin(){
        $ci = &Public_Controller::$instance;
        $admin_lv = admin_auth;
        $user_lv = $ci->user->auth;
         if( $user_lv  !== $admin_lv){
            return false;
         }
         return true;
     }
}
if(!function_exists('is_auth_kind')){
      function is_auth_kind($authKind){
          if($authKind === 'all')
          {
                return true;
          }
         $ci = &Public_Controller::$instance;
        $user_kind=$ci->user->kind;
        if($authKind !== $user_kind){
            var_dump($user_kind);
            return false;
        }
        return true;
     }
}
if(!function_exists('min_lv')){
      function min_lv($authLv){
         $ci = &Public_Controller::$instance;
        $user_lv=$ci->user->auth;
        if($user_lv < $authLv &&  !is_admin()){
            return false;
        }
        return true;
     }
}
if(!function_exists('is_login')){
      function is_login(){
         $ci = &Public_Controller::$instance;
         if(!$ci->session->userdata('is_login')){
             return false;
         }
         return true;
     }
}
if(!function_exists('can_guest')){
      function can_guest($authLv){
         $ci = &Public_Controller::$instance;
        $guest_lv = guest_lv;
        if($authLv === $guest_lv || is_login()){
            return true;
        }
        return false;
     }
    }
if(!function_exists('is_guest')){
     function is_guest(){
         $ci = &Public_Controller::$instance;
        $guest_lv = guest_lv;
        if( $ci->user->auth ===  $guest_lv ){
            return true;
        }
        return false;
    }
}

if(!function_exists('is_writer')){
    function is_writer($writer_id){
        $ci = &Public_Controller::$instance;
       $user_id = $ci->user->id;
       if( $user_id ===  $writer_id || is_admin()){
           return true;
       }
       return false;
   }
}
if(!function_exists('is_guest_write')){
    function is_guest_write($writer_id){
        $guest_lv = guest_lv;
       if( $writer_id ===  $guest_lv &&  !is_admin()){
           return true;
       }
       return false;
   }
}

if(!function_exists('is_can_product_review')){
    function is_can_product_review($product_id){
        if($product_id === null || $product_id === false){
            return false;
        }
        
         $ci = &Public_Controller::$instance;
        $orders =$ci->db
        ->select("op.id 'id'")
        // ->select("*")
        ->from('p_order_products as op')
        ->join('product_orders as o',"op.merchant_uid = o.merchant_uid","LEFT")
        ->where('op.product_id',$product_id)
        ->where('o.user_id',$ci->user->id)
        // ->where('o.status','paid')
        ->where('op.is_review_write','0')
        ->get()->result();

        if(count($orders) === 0){
            return false;
        }
        return $orders;
   }
}

if(!function_exists('is_display_to_login')){
    function is_display_to_login($is_display_to_login){
        if(($is_display_to_login === '1' && is_login()) || $is_display_to_login === '0')
        {
            return true;
        }
   }
}
// if(!function_exists('is_product_review_board')){
//     function is_product_review_board(){
//         $ci = & get_instance();
//         $product_id =$ci->input->get('product_id');
//         if($product_id===null || $product_id === false){
//             return false;
//         }
//         return true;
//    }
// }
?>