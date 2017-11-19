<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Init extends Init_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('base/menus_model');
        $this->load->model('shop/product_categories_model');
        $this->load->model('shop/products_model');
        $this->load->model('base/boards_model');
        $this->load->model('base/board_contents_model');
        $this->load->model('shop/product_reviews_model');
        $this->load->model('shop/ref_cate_product_model');
        $this->load->model('shop/p_hotel_model');
        $this->load->model('golfpass/panels_model');
        $this->load->model('golfpass/panel_contents_model');
        $this->load->model('shop/product_option_model');

    }
    function index()
    {
        parent::index();
        $this->p_ref_hotel();
        $this->p_hotel();
        if($this->hotel_option()===true)
        {
            $this->add_sample_cate_product();
            $this->add_panel_data();
            $this->add_board();
        }
        $this->p_daily_price();
        $this->p_order_infos();
        $this->p_order_options();
        $this->newsLetter();        
        // $sample_product_id =$this->products_model->_add(array("name"=>"222 C.C","eng_name"=>"product_name","desc"=>"샘플내용",'hole_count'=>'18'));
        // $this->product_reviews_model->_add(array(
        //     "product_id"=>$sample_product_id,
        //     'user_id'=>"2",
        //     'score_1' => "2",
        //     'score_2' => "4",
        //     'score_3' => "1",
        //     'score_4' => "1",
        //     'score_5' => "1",
        //     'score_6' => "1",
        //     'score_7' => "1",
        //     'score_8' => "1"
        // ));
        // $sample_product_id =$this->products_model->_add(array("name"=>"333 C.C","eng_name"=>"product_name","desc"=>"샘플내용",'hole_count'=>'18'));
        // $this->product_reviews_model->_add(array(
        //     "product_id"=>$sample_product_id,
        //     'user_id'=>"2",
        //     'score_1' => "1",
        //     'score_2' => "1",
        //     'score_3' => "5",
        //     'score_4' => "5",
        //     'score_5' => "5",
        //     'score_6' => "5",
        //     'score_7' => "5",
        //     'score_8' => "5"
        // ));
    }
 
    function add_board()
    {
        $board_id =$this->boards_model->_add(array("name"=>"1:1문의",'skin'=>'golfpass'));
        $board_id =$this->boards_model->_add(array("name"=>"FAQ",'skin'=>'golfpass',"auth_kind_w_content"=>"admin","auth_kind_w_review"=>"all"));
        $board_id =$this->boards_model->_add(array("name"=>"공지사항",'skin'=>'golfpass',"auth_kind_w_content"=>"admin","auth_kind_w_review"=>"all"));

    }
    function add_panel_data()
    {
        // $this->boards_model->_add(array("name"=>"패널 게시판",'skin'=>'panel','auth_r_board'=>'0','auth_r_content'=>'0','auth_w_content'=>'999','auth_w_review'=>'999'));
        $board_id =$this->boards_model->_add(array("name"=>"패널 게시판",'skin'=>'panel','auth_kind_w_content'=>'panel'));
        
        $password =password_hash("1234",PASSWORD_BCRYPT);
        $this->db->set("auth","1");
        $this->db->set("profilePhoto","/public/images/panel.jpg");
        $this->db->set("userName","test2");
        $this->db->set("kind","panel");
        $this->db->set("password",$password);
        $this->db->set("name","샘플패널1");
        $this->db->set("sex","");
        $this->db->set("email","");
        $this->db->insert("users");
        $user_id = $this->db->insert_id();

        $this->board_contents_model->add(array("board_id"=>$board_id,"user_id"=>$user_id,"title"=>"샘플제목","desc"=>"샘플내용입니다."));
    }
    function add_sample_cate_product()
    {
        ////카테고리추가
        //나라 도시별
        $parent_nation_id =$this->product_categories_model->_add(array('name'=>'나라별','desc'=>'나라별','can_alert'=>'0','can_add'=>'1'));

        //중국
        $china_id=$this->product_categories_model->_add(array('name'=>'중국','desc'=>'베이징','parent_id'=>$parent_nation_id,"photo"=>"/public/images/china.jpg",'can_add'=>'1'));
            $city_id=$this->product_categories_model->_add(array('name'=>'위해','desc'=>'','parent_id'=>$china_id,'photo'=>'','can_add'=>'0'));
                $sample_product_id =$this->products_model->_add(array("name"=>"웨이하이포인트 C.C","eng_name"=>"product_name","desc"=>"샘플내용",'hole_count'=>'18'));
                $this->product_option_model->_add(array("product_id"=>$sample_product_id,"name"=>"/public/images/product.jpg","kind"=>"photo"));
                $this->product_option_model->_add(array("product_id"=>$sample_product_id,"name"=>"/public/images/product2.jpg","kind"=>"photo"));
                $this->ref_cate_product_model->_add(array("product_id"=>$sample_product_id,'cate_id'=>$city_id));
                $hotel_id=$this->p_hotel_model->_add(array("name"=>"웨이하이포인트 리조트"));
                $this->db->set("product_id",$sample_product_id)->set("hotel_id",$hotel_id)->insert("p_ref_hotel");
                $this->db->set("product_id","1")->set("kind","main")->insert("product_option");
            $city_id=$this->product_categories_model->_add(array('name'=>'연태','desc'=>'','parent_id'=>$china_id,'photo'=>'','can_add'=>'0'));
            $city_id=$this->product_categories_model->_add(array('name'=>'백두산','desc'=>'','parent_id'=>$china_id,'photo'=>'','can_add'=>'0'));
            $city_id=$this->product_categories_model->_add(array('name'=>'청도','desc'=>'','parent_id'=>$china_id,'photo'=>'','can_add'=>'0'));
            $city_id=$this->product_categories_model->_add(array('name'=>'천진','desc'=>'','parent_id'=>$china_id,'photo'=>'','can_add'=>'0'));
            $city_id=$this->product_categories_model->_add(array('name'=>'대련','desc'=>'','parent_id'=>$china_id,'photo'=>'','can_add'=>'0'));

        //태국
        $thailand_id=$this->product_categories_model->_add(array('name'=>'태국','desc'=>'태국','parent_id'=>$parent_nation_id,'can_add'=>'1'));
       $city_id=$this->product_categories_model->_add(array('name'=>'방콕','desc'=>'','parent_id'=>$thailand_id,'photo'=>'','can_add'=>'0'));
       $city_id=$this->product_categories_model->_add(array('name'=>'파타야','desc'=>'','parent_id'=>$thailand_id,'photo'=>'','can_add'=>'0'));
       $city_id=$this->product_categories_model->_add(array('name'=>'카오야이','desc'=>'','parent_id'=>$thailand_id,'photo'=>'','can_add'=>'0'));
       $city_id=$this->product_categories_model->_add(array('name'=>'칸차나부리','desc'=>'','parent_id'=>$thailand_id,'photo'=>'','can_add'=>'0'));
       $city_id=$this->product_categories_model->_add(array('name'=>'치앙마이','desc'=>'','parent_id'=>$thailand_id,'photo'=>'','can_add'=>'0'));

        //필리핀
        $philippines_id=$this->product_categories_model->_add(array('name'=>'필리핀','desc'=>'필리핀','parent_id'=>$parent_nation_id,'can_add'=>'1'));
        $city_id=$this->product_categories_model->_add(array('name'=>'마닐라','desc'=>'','parent_id'=>$philippines_id,'photo'=>'','can_add'=>'0'));
        $city_id=$this->product_categories_model->_add(array('name'=>'클락','desc'=>'','parent_id'=>$philippines_id,'photo'=>'','can_add'=>'0'));
        $city_id=$this->product_categories_model->_add(array('name'=>'세부','desc'=>'','parent_id'=>$philippines_id,'photo'=>'','can_add'=>'0'));

        //사이판
        $saipan_id=$this->product_categories_model->_add(array('name'=>'사이판','desc'=>'사이판','parent_id'=>$parent_nation_id,'can_add'=>'1'));
        $city_id=$this->product_categories_model->_add(array('name'=>'사이판','desc'=>'','parent_id'=>$saipan_id,'photo'=>'','can_add'=>'0'));
        
        //괌
        $guam_id=$this->product_categories_model->_add(array('name'=>'괌','desc'=>'괌','parent_id'=>$parent_nation_id,'can_add'=>'1'));
        $city_id= $this->product_categories_model->_add(array('name'=>'괌','desc'=>'','parent_id'=>$guam_id,'photo'=>'','can_add'=>'0'));

        //라오스
        $raos_id=$this->product_categories_model->_add(array('name'=>'라오스','desc'=>'라오스','parent_id'=>$parent_nation_id,'can_add'=>'1'));
        $city_id=$this->product_categories_model->_add(array('name'=>'라오스','desc'=>'','parent_id'=>$raos_id,'photo'=>'','can_add'=>'0'));
     
        //일본
        $nation_id =$this->product_categories_model->_add(array('name'=>'일본','desc'=>'일본','parent_id'=>$parent_nation_id,'can_add'=>'1'));
       $city_id=$this->product_categories_model->_add(array('name'=>'후쿠오카','desc'=>'','parent_id'=>$nation_id,'photo'=>'','can_add'=>'0'));
       $city_id=$this->product_categories_model->_add(array('name'=>'나가사키','desc'=>'','parent_id'=>$nation_id,'photo'=>'','can_add'=>'0'));
       $city_id=$this->product_categories_model->_add(array('name'=>'오이타','desc'=>'','parent_id'=>$nation_id,'photo'=>'','can_add'=>'0'));
       $city_id=$this->product_categories_model->_add(array('name'=>'쿠마모토','desc'=>'','parent_id'=>$nation_id,'photo'=>'','can_add'=>'0'));
       $city_id=$this->product_categories_model->_add(array('name'=>'미야자키','desc'=>'','parent_id'=>$nation_id,'photo'=>'','can_add'=>'0'));
       $city_id=$this->product_categories_model->_add(array('name'=>'가고시마','desc'=>'','parent_id'=>$nation_id,'photo'=>'','can_add'=>'0'));
       $city_id=$this->product_categories_model->_add(array('name'=>'북해도','desc'=>'','parent_id'=>$nation_id,'photo'=>'','can_add'=>'0'));
       $city_id=$this->product_categories_model->_add(array('name'=>'치바','desc'=>'','parent_id'=>$nation_id,'photo'=>'','can_add'=>'0'));
       $city_id=$this->product_categories_model->_add(array('name'=>'와카야마','desc'=>'','parent_id'=>$nation_id,'photo'=>'','can_add'=>'0'));
       $city_id=$this->product_categories_model->_add(array('name'=>'시즈오카','desc'=>'','parent_id'=>$nation_id,'photo'=>'','can_add'=>'0'));
       $city_id=$this->product_categories_model->_add(array('name'=>'히로시마','desc'=>'','parent_id'=>$nation_id,'photo'=>'','can_add'=>'0'));
       
        
        
        //테마별
        $menu_id =$this->product_categories_model->_add(array('name'=>'테마별','desc'=>'테마별','can_alert'=>'0','can_add'=>'1'));
        $this->product_categories_model->_add(array('name'=>'이달의 인기코스','desc'=>'트렌디한 코스를 경험하고 싶다면','parent_id'=>$menu_id,'photo'=>'/public/images/theme1.jpg','can_add'=>'0'));
        $this->product_categories_model->_add(array('name'=>'골프 + 숙박 패키지','desc'=>'원클릭으로 여행 플랜 완성!','parent_id'=>$menu_id,'photo'=>'/public/images/theme2.jpg','can_add'=>'0'));
        $this->product_categories_model->_add(array('name'=>'2인 플레이','desc'=>'2인 플레이에 딱 맞는 코스','parent_id'=>$menu_id,'photo'=>'/public/images/theme3.jpg','can_add'=>'0'));
        $this->product_categories_model->_add(array('name'=>'시설이 고저스한','desc'=>'여행은 잠자리가 편해야지','parent_id'=>$menu_id,'photo'=>'/public/images/theme4.jpg','can_add'=>'0'));
        $this->product_categories_model->_add(array('name'=>'토너먼트 개최 코스','desc'=>'평론가에게 인정받은','parent_id'=>$menu_id,'photo'=>'/public/images/theme5.jpg','can_add'=>'0'));
     
        //패널 추천
        $panel_id =$this->product_categories_model->_add(array('name'=>'골프패스 패널 추천','desc'=>'패널 추천','can_alert'=>'0','can_add'=>'0'));
        $this->ref_cate_product_model->_add(array("product_id"=>$sample_product_id,'cate_id'=>$panel_id));

    
    }
    
    function p_daily_price()
    {
         //product_categories 테이블 만들기
         $tb_name = 'p_daily_price';
         if(!$this->db->table_exists($tb_name)){
         
             $result = $this->db->query("CREATE TABLE `$tb_name`(
             `id` INT UNSIGNED NULL AUTO_INCREMENT, 
             `product_id` INT UNSIGNED NOT NULL,
             `date` varchar(255) NOT NULL,
             `num_people` varchar(50) NOT NULL DEFAULT '1',
             `period` varchar(50) NOT NULL DEFAULT '1',
             `price` varchar(50) NOT NULL,
             `remarks` varchar(255) DEFAULT '',
             `created` datetime NOT NULL DEFAULT NOW(),
             UNIQUE KEY (`product_id`,`date`,`num_people`,`period`),
             PRIMARY KEY (`id`) ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
                 
             if($result) echo("success create $tb_name ");
             else echo("failed create $tb_name");
         }else{
             echo "already table $tb_name exists";
         }
         echo "<br>";
    }

    function product_categories()
    {
           //product_categories 테이블 만들기
           $tb_name = 'product_categories';
           if(!$this->db->table_exists($tb_name)){
           
               $result = $this->db->query("CREATE TABLE `$tb_name`(
               `id` INT UNSIGNED NULL AUTO_INCREMENT, 
               `parent_id` INT UNSIGNED NOT NULL DEFAULT '0', 
               `name` varchar(50) NOT NULL DEFAULT '샘플상품분류', 
               `desc` varchar(255) NOT NULL DEFAULT '분류 설명', 
               `sort` varchar(20) NOT NULL DEFAULT '0', 
               `photo` varchar(255), 
               `photo2` varchar(255), 
               `photo3` varchar(255), 
               `photo4` varchar(255), 
               `photo5` varchar(255), 
               `photo6` varchar(255), 
               `can_alert` varchar(10) NOT NULL DEFAULT '1', 
               `can_add` varchar(10) NOT NULL DEFAULT '0', 
               `created` datetime NOT NULL DEFAULT NOW(),
               KEY `idx_parent_id` (`parent_id`),
               PRIMARY KEY (`id`) ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
                   
               if($result) echo("success create $tb_name ");
               else echo("failed create $tb_name");
           }else{
               echo "already table $tb_name exists";
           }
           echo "<br>";
    }
    function panels()
    {
        //panels 테이블 만들기
        $tb_name = 'panels';
        if(!$this->db->table_exists($tb_name)){
            $result = $this->db->query("CREATE TABLE `$tb_name`(
            `id` INT UNSIGNED NULL AUTO_INCREMENT, 
            `num_contents` int DEFAULT '0',
            `auth` INT NOT NULL DEFAULT '1',
            `intro` varchar(255),
            `address` varchar(255) ,
            `name` varchar(10),
            `sex` varchar(5),
            `birth` varchar(30),
            `email` varchar(40),
            `photo` varchar(255),
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
               echo "<br>";
               return true;
           }
           else
           {
               echo "already table $tb_name exists";
               echo "<br>";
               return false;
           }
           
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
             echo "<br>";
             return true;
         }else{
             echo "already table $tb_name exists";
             echo "<br>";
             return false;
         }
        
    }
    function newsLetter()
    {
        //newsLetter 테이블 만들기
        $tb_name = 'newsLetter';
        if(!$this->db->table_exists($tb_name)){
            $result = $this->db->query("CREATE TABLE `$tb_name`(
            `id` INT UNSIGNED NULL AUTO_INCREMENT, 
            `email` varchar(255) NOT NULL,
            `created` datetime NOT NULL DEFAULT NOW(),
            PRIMARY KEY (`id`),
            KEY `idx_email` (`email`)
             ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
                
            if($result)
            {
                echo("success create $tb_name ");
                echo "<br>";
                return true;
            }
            else
            {
                echo("failed create $tb_name");
                echo "<br>";
                return false;
            }
                
        }else{
            echo "already table $tb_name exists";
            echo "<br>";
            return false;
        }
        
    }
    function p_order_options()
    {
        //p_order_options 테이블 만들기
        $tb_name = 'p_order_options';
        if(!$this->db->table_exists($tb_name)){
            $result = $this->db->query("CREATE TABLE `$tb_name`(
            `id` INT UNSIGNED NULL AUTO_INCREMENT, 
            `merchant_uid` varchar(100) NOT NULL,
            `option_id` INT UNSIGNED NOT NULL, 
            `created` datetime NOT NULL DEFAULT NOW(),
            PRIMARY KEY (`id`),
            KEY `idx_merchant_uid` (`merchant_uid`),
            KEY `idx_option_id` (`option_id`),
            KEY `idx_merchant_uid_option_id` (`option_id`,`merchant_uid`)
             ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
                
            if($result) echo("success create $tb_name ");
            else echo("failed create $tb_name");
        }else{
            echo "already table $tb_name exists";
        }
        echo "<br>";

    }
    function p_order_infos()
    {
        //p_order_infos 테이블 만들기
        $tb_name = 'p_order_infos';
        if(!$this->db->table_exists($tb_name)){
            $result = $this->db->query("CREATE TABLE `$tb_name`(
            `id` INT UNSIGNED NULL AUTO_INCREMENT, 
            `merchant_uid` varchar(100) NOT NULL,
            `product_id` INT UNSIGNED NOT NULL, 
            `name_with` varchar(255) NOT NULL, 
            `eng_name_with` varchar(255) NOT NULL, 
            `email_with` varchar(255) NOT NULL, 
            `phone_with` varchar(255) NOT NULL, 
            `created` datetime NOT NULL DEFAULT NOW(),
            PRIMARY KEY (`id`),
            KEY `idx_merchant_uid` (`merchant_uid`),
            KEY `idx_product_id` (`product_id`),
            KEY `idx_merchant_uid_product_id` (`product_id`,`merchant_uid`)
             ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
                
            if($result) echo("success create $tb_name ");
            else echo("failed create $tb_name");
        }else{
            echo "already table $tb_name exists";
        }
        echo "<br>";

    }
    //재정의 시작
    function product_orders()
    {
        //product_orders 테이블 만들기
        $tb_name = 'product_orders';
        if(!$this->db->table_exists($tb_name)){
            $result = $this->db->query("CREATE TABLE `$tb_name`(
            `id` INT UNSIGNED NULL AUTO_INCREMENT, 
            `product_id` INT NOT NULL,
            `start_date` varchar(100),
            `end_date` varchar(100),
            `num_people` varchar(100),
            `merchant_uid` varchar(100) NOT NULL,
            `order_name` varchar(100),
            `user_id` INT UNSIGNED NOT NULL,
            `user_name` varchar(50),
            `phone` varchar(50) NOT NULL,
            `email` varchar(255),
            `address` varchar(255),
            `total_price` INT UNSIGNED,
            `status` varchar(100) NOT NULL,
            `pay_method` varchar(100),
            `apply_num` varchar(100),
            `vbank_name` varchar(100),
            `vbank_holder` varchar(100),
            `vbank_num` varchar(100),
            `vbank_date` varchar(100),
            `is_review_write` varchar(10) NOT NULL DEFAULT '0',
            `created` datetime NOT NULL DEFAULT NOW(),
            PRIMARY KEY (`id`),
            UNIQUE KEY `idx_merchant_uid` (`merchant_uid`),
            KEY `idx_user_id` (`user_id`)
             ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
                
            if($result) echo("success create $tb_name ");
            else echo("failed create $tb_name");
        }else{
            echo "already table $tb_name exists";
        }
        echo "<br>";
    }
 



    function products()
    {
        
        //products 테이블 만들기
        $tb_name = 'products';
        if(!$this->db->table_exists($tb_name)){
        
            $result = $this->db->query("CREATE TABLE `$tb_name`(
            `id` INT UNSIGNED NULL AUTO_INCREMENT, 
            `hashtag` varchar(255) DEFAULT '', 
            -- 위치정보 
            `map_name` VARCHAR( 60 ) NOT NULL ,
            `address` VARCHAR( 80 ) NOT NULL ,
            `lat` FLOAT( 10, 6 ) NOT NULL ,
            `lng` FLOAT( 10, 6 ) NOT NULL ,
            `map_type` VARCHAR( 30 ) NOT NULL,
            -- 위치정보 
            `same_price_every_year` VARCHAR(10) NOT NULL DEFAULT '0',
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
            `min_people` INT UNSIGNED NOT NULL,
            `max_people` INT UNSIGNED NOT NULL,
            `hits` int UNSIGNED NOT NULL DEFAULT '0',    
            `created` datetime NOT NULL DEFAULT NOW(),
            PRIMARY KEY (`id`)
            -- KEY `idx_category_id`(`category_id`)
             ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
                
            if($result){
                echo("success create $tb_name ");
                echo "<br>";
                return true;

            }
            else{
                echo("failed create $tb_name");

                echo "<br>";
                return false;
            } 
                
        }else{
            echo "already table $tb_name exists";
            echo "<br>";
            return false;
        }
        
    }
    //재정의 끝

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
            echo "<br>";
            return true;
        }else{
            echo "already table $tb_name exists";
            echo "<br>";
            return false;
        }
        
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
