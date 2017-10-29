<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Init_golfpass extends Init_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('base/menus_model');
        $this->load->model('shop/product_categories_model');
        $this->load->model('shop/products_model');
        $this->load->model('base/boards_model');
        $this->load->model('shop/product_reviews_model');
        $this->load->model('shop/ref_cate_product_model');
   
    }
    function index()
    {
        parent::index();
        $this->p_ref_hotel();
        $this->p_hotel();
        $this->hotel_option();
        $this->panels();
        $this->panel_contents();
        $this->cate_product_add();
        // $this->board_add();

    }
    function board_add()
    {
        $this->boards_model->_add(array("name"=>"패널 게시판",'skin'=>'panel','auth_r_board'=>'0','auth_r_content'=>'0','auth_w_content'=>'999','auth_w_review'=>'999'));
    }
    function cate_product_add()
    {
        ////카테고리추가
        //나라별
        $menu_id =$this->product_categories_model->_add(array('name'=>'나라별','desc'=>'나라별','can_alert'=>'0'));
        $rusia_id =$this->product_categories_model->_add(array('name'=>'러시아','desc'=>'럭셔리 러시아','parent_id'=>$menu_id,'photo'=>'/public/etc/main/images/pc_golf_course_1.jpg','can_add'=>'0'));
        $this->product_categories_model->_add(array('name'=>'미국','desc'=>'럭셔리 미국','parent_id'=>$menu_id,'photo'=>'/public/etc/main/images/pc_golf_course_2.jpg','can_add'=>'0'));
        $this->product_categories_model->_add(array('name'=>'일본','desc'=>'럭셔리 일본','parent_id'=>$menu_id,'photo'=>'/public/etc/main/images/pc_golf_course_3.jpg','can_add'=>'0'));
        $this->product_categories_model->_add(array('name'=>'중국','desc'=>'럭셔리 중국','parent_id'=>$menu_id,'photo'=>'/public/etc/main/images/pc_golf_course_4.jpg','can_add'=>'0'));
        $this->product_categories_model->_add(array('name'=>'영국','desc'=>'럭셔리 영국','parent_id'=>$menu_id,'photo'=>'/public/etc/main/images/pc_golf_course_5.jpg','can_add'=>'0'));
        $this->product_categories_model->_add(array('name'=>'프랑스','desc'=>'럭셔리 프랑스','parent_id'=>$menu_id,'photo'=>'/public/etc/main/images/pc_golf_course_6.jpg','can_add'=>'0'));
        
        //테마별
        $menu_id =$this->product_categories_model->_add(array('name'=>'테마별','desc'=>'테마별','can_alert'=>'0'));
        $this->product_categories_model->_add(array('name'=>'이달의 인기코스','desc'=>'인기 많음','parent_id'=>$menu_id,'photo'=>'/public/etc/main/images/theme_img1.jpg','can_add'=>'0'));
        $this->product_categories_model->_add(array('name'=>'골프 + 숙박 패키지','desc'=>'골프+숙박','parent_id'=>$menu_id,'photo'=>'/public/etc/main/images/theme_img2.jpg','can_add'=>'0'));
        $this->product_categories_model->_add(array('name'=>'2인 플레이','desc'=>'2인','parent_id'=>$menu_id,'photo'=>'/public/etc/main/images/theme_img3.jpg','can_add'=>'0'));
        $this->product_categories_model->_add(array('name'=>'시설이 고저스한','desc'=>'시설 좋음','parent_id'=>$menu_id,'photo'=>'/public/etc/main/images/theme_img4.jpg','can_add'=>'0'));
        $this->product_categories_model->_add(array('name'=>'토너먼트 개최 코스','desc'=>'토너먼트','parent_id'=>$menu_id,'photo'=>'/public/etc/main/images/theme_img5.jpg','can_add'=>'0'));
     
        //패널 추천
        $panel_id =$this->product_categories_model->_add(array('name'=>'골프패스 패널 추천','desc'=>'패널 추천','can_alert'=>'0','can_add'=>'0'));

        ////상품추가
        // 패널 상품추가
        $product_id =$this->products_model->_add(array("name"=>"샘플상품","eng_name"=>"product_name","desc"=>"샘플내용"));
        $this->ref_cate_product_model->_add(array("product_id"=>$product_id,'cate_id'=>$panel_id));

        //러시아 상품추가
        $product_id =$this->products_model->_add(array("name"=>"샘플상품","eng_name"=>"product_name","desc"=>"샘플내용"));
        $this->ref_cate_product_model->_add(array("product_id"=>$product_id,'cate_id'=>$rusia_id));

        $product_id =$this->products_model->_add(array("name"=>"샘플상품2","eng_name"=>"product_name","desc"=>"샘플내용"));
        $this->ref_cate_product_model->_add(array("product_id"=>$product_id,'cate_id'=>$rusia_id));
        $product_id =$this->products_model->_add(array("name"=>"샘플상품3","eng_name"=>"product_name","desc"=>"샘플내용"));
        $this->ref_cate_product_model->_add(array("product_id"=>$product_id,'cate_id'=>$rusia_id));
        $product_id =$this->products_model->_add(array("name"=>"샘플상품4","eng_name"=>"product_name","desc"=>"샘플내용"));
        $this->ref_cate_product_model->_add(array("product_id"=>$product_id,'cate_id'=>$rusia_id));
        $product_id =$this->products_model->_add(array("name"=>"샘플상품5","eng_name"=>"product_name","desc"=>"샘플내용"));
        $this->ref_cate_product_model->_add(array("product_id"=>$product_id,'cate_id'=>$rusia_id));
    }

    function panels()
    {
        //panels 테이블 만들기
        $tb_name = 'panels';
        if(!$this->db->table_exists($tb_name)){
            $result = $this->db->query("CREATE TABLE `$tb_name`(
            `id` INT UNSIGNED NULL AUTO_INCREMENT, 
            `auth` INT NOT NULL DEFAULT '1',
            `address` varchar(255) ,
            `name` varchar(10),
            `sex` varchar(5),
            `birth` varchar(30),
            `email` varchar(40),
            `profilePhoto` varchar(255),
            `created` datetime NOT NULL DEFAULT NOW(),
            PRIMARY KEY (`id`)
             ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");

            if($result) echo("success create $tb_name ");
            else echo("failed create $tb_name");
        }else{
            echo "already table $tb_name exists";
        }
        echo "<br>";
    }
    function panel_contents()
    {
           //panel_contents 테이블 만들기
           $tb_name = "panel_contents";
           if(!$this->db->table_exists($tb_name)){
               $result = $this->db->query("CREATE TABLE `$tb_name`(
               `id` INT UNSIGNED NULL AUTO_INCREMENT, 
               `panel_id` INT UNSIGNED NOT NULL, 
               `title` varchar(30) NOT NULL, 
               `desc` text NOT NULL,
               `is_secret` varchar(10) NOT NULL DEFAULT '0',
               `is_display` varchar(10) NOT NULL DEFAULT '1',
               `score_1` int NOT NULL DEFAULT '0', 
               `score_2` int NOT NULL DEFAULT '0', 
               `score_3` int NOT NULL DEFAULT '0', 
               `score_4` int NOT NULL DEFAULT '0', 
               `score_5` int NOT NULL DEFAULT '0', 
               `score_6` int NOT NULL DEFAULT '0', 
               `score_7` int NOT NULL DEFAULT '0', 
               `score_8` int NOT NULL DEFAULT '0', 
               `score_9` int NOT NULL DEFAULT '0', 
               `score_10` int NOT NULL DEFAULT '0', 
               `hits` int UNSIGNED NOT NULL, 
               `created` datetime NOT NULL DEFAULT NOW(),
               PRIMARY KEY (`id`),
               KEY `idx_product_id` (`panel_id`,`is_display`)
               ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
                   
               if($result) echo("success create $tb_name ");
               else echo("failed create $tb_name");
           }else{
               echo "already table $tb_name exists";
           }
           echo "<br>";
    }
    function hotel_option()
    {
         //hotel_option 테이블 만들기
         $tb_name = 'hotel_option';
         if(!$this->db->table_exists($tb_name)){
         
             $result = $this->db->query("CREATE TABLE `$tb_name`(
             `id` INT UNSIGNED NULL AUTO_INCREMENT, 
             `hotel_id` int UNSIGNED NOT NULL,
             `name` varchar(255) NOT NULL,
             `kind` varchar(255) NOT NULL, 
             `sort` int NOT NULL DEFAULT '0', 
             `created` datetime NOT NULL DEFAULT NOW(),
             PRIMARY KEY (`id`),
             KEY `idx_hotel_id_kind`(`hotel_id`,`kind`),
             UNIQUE KEY (`hotel_id`,`name`,`kind`)
              ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
                 
             if($result) echo("success create $tb_name ");
             else echo("failed create $tb_name");
         }else{
             echo "already table $tb_name exists";
         }
         echo "<br>";
    }
    //재정의 시작
    function products()
    {
        
        //products 테이블 만들기
        $tb_name = 'products';
        if(!$this->db->table_exists($tb_name)){
        
            $result = $this->db->query("CREATE TABLE `$tb_name`(
            `id` INT UNSIGNED NULL AUTO_INCREMENT, 
            -- `category_id` int UNSIGNED NOT NULL,
            `reviews_count` int UNSIGNED NOT NULL DEFAULT '0',
            `name` varchar(30) NOT NULL DEFAULT '샘플상품',
            `eng_name` varchar(255) DEFAULT 'sample product', 
            `desc` varchar(255) DEFAULT '샘플설명', 
            `region` varchar(255)DEFAULT '샘플지역',
            `hole_count` varchar(255)NOT NULL, 
            `course_type` varchar(255) NOT NULL, 
            `pa` varchar(255) NOT NULL, 
            `distance` varchar(255) NOT NULL, 
            `grass_type` varchar(255) NOT NULL, 
            `open_day` varchar(255) NOT NULL, 
            `price` int UNSIGNED NOT NULL, 
            `weekday_price` INT UNSIGNED NOT NULL,
            `weekend_price` INT UNSIGNED NOT NULL,
            `holiday_price` INT UNSIGNED NOT NULL,
            `hits` int UNSIGNED NOT NULL DEFAULT '0',    
            `created` datetime NOT NULL DEFAULT NOW(),
            PRIMARY KEY (`id`)
            -- KEY `idx_category_id`(`category_id`)
             ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
                
            if($result) echo("success create $tb_name ");
            else echo("failed create $tb_name");
        }else{
            echo "already table $tb_name exists";
        }
        echo "<br>";
    }
    //재정의 시작

    //추가 시작
    function p_ref_hotel()
    {
        //p_ref_hotel 테이블 만들기
        $tb_name = 'p_ref_hotel';
        if(!$this->db->table_exists($tb_name)){

            $result = $this->db->query("CREATE TABLE `$tb_name`(
            `id` INT UNSIGNED NULL AUTO_INCREMENT, 
            `product_id` INT UNSIGNED NOT NULL,
            `hotel_id` INT UNSIGNED NOT NULL,
            `created` datetime NOT NULL DEFAULT NOW(),
            UNiQUE KEY `idx_product_hotel_id`(`product_id`,`hotel_id`),
            PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
                
            if($result) echo("success create $tb_name ");
            else echo("failed create $tb_name");
        }else{
            echo "already table $tb_name exists";
        }
        echo "<br>";
    }
    function p_hotel()
    {
        //p_hotel 테이블 만들기
        $tb_name = 'p_hotel';
        if(!$this->db->table_exists($tb_name)){

            $result = $this->db->query("CREATE TABLE `$tb_name`(
            `id` INT UNSIGNED NULL AUTO_INCREMENT, 
            `name` varchar(255) NOT NULL, 
            `desc` varchar(255) NOT NULL, 
            `room_count` varchar(255)NOT NULL, 
            `room_type` varchar(255)NOT NULL, 
            `bedroom` varchar(255)NOT NULL, 
            `bathroom` varchar(255)NOT NULL, 
            `maxium_number_of_people` varchar(255)NOT NULL, 
            `bed` varchar(255)NOT NULL, 
            `check_in_out` varchar(255)NOT NULL, 
            `weekday_price` INT UNSIGNED NOT NULL,
            `weekend_price` INT UNSIGNED NOT NULL,
            `holiday_price` INT UNSIGNED NOT NULL,
            `created` datetime NOT NULL DEFAULT NOW(),
            PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
                
            if($result) echo("success create $tb_name ");
            else echo("failed create $tb_name");
        }else{
            echo "already table $tb_name exists";
        }
        echo "<br>";
    }


    //추가 끝
}
