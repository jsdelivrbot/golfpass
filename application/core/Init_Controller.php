<?php 
class Init_Controller extends MX_Controller{

    function __construct(){
        parent::__construct();
        $this->load->helper("url");
        $this->load->database();
        $this->load->dbforge();
    }

    public function reset(){
        $this->db->query("DROP TABLE `boards`, `board_contents`, `board_replys`, `ci_sessions`, `menus`, `messages`, `pages`, `products`, `product_cartlist`, `product_categories`, `product_celebrity_reviews`, `product_orders`, `product_reviews`, `product_review_replys`, `p_order_products`, `ref_cate_product`, `setting`, `users`;");
        redirect('/init');
    }

    function index()
    {
        $home_link= site_url("");
        echo "<a href='$home_link'>홈으로</a>";
        echo "<br>";
       

        $this->setting();
        $this->session();
        $this->users();
        $this->products();
        $this->product_option();
        $this->procedure();
        // $this->p_ref_option();
        $this->product_reviews();
        $this->product_review_replys();
        $this->product_categories();
        $this->ref_cate_product();
        $this->product_orders();
        $this->p_order_products();
        $this->product_celebrity_reviews();
        $this->messages();
        $this->menus();
        $this->boards();
        $this->board_contents();
        $this->board_replys();
        $this->pages();
        $this->product_cartlist();
    }
    
    function setting()
    {
         // setting 테이블 만들기
         $tb_name = 'setting';
         if(!$this->db->table_exists($tb_name)){
         
             $result = $this->db->query("CREATE TABLE `$tb_name`(
             `id` INT UNSIGNED NULL AUTO_INCREMENT, 
             `is_product_review_display` varchar(10) NOT NULL DEFAULT '0',
             `created` datetime NOT NULL DEFAULT NOW(),
             PRIMARY KEY (`id`)
              ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
                 
             if($result){
                 $this->load->model('admin/setting_model');
                 $this->setting_model->_add();
                 echo("success create $tb_name ");
             }else{
                 echo("failed create $tb_name");
             } 
 
         }else{
             echo "already table $tb_name exists";
         }
         echo "<br>";
    }
   
     function test()
    {
        $this->load->model('board_contents_model');
        $data= array();

        for($i=0; $i<77800 ;$i++)
        {
            $board_id=rand(1,10);
            $user_id=rand(1,10);
            $product_id=rand(1,10);
            $title=rand(1,9999);
            $desc=rand(1,9999);
            $is_display=rand(0,1);

            $row_data =array(
                'board_id'=>$board_id,
                'user_id'=>$user_id,
                'product_id'=>$product_id,
                'title'=>$title,
                'desc'=>$desc,
                'is_display'=>$is_display
            );
             array_push($data,$row_data);
        }
        var_dump($data);
        $this->db->insert_batch('board_contents',$data);


    }

    function session()
    {
        
        //세션 테이블 만들기
        $tb_name = 'ci_sessions';
        if(!$this->db->table_exists($tb_name)){
            $result =$this->db->query("CREATE TABLE IF NOT EXISTS `$tb_name` ( `id` varchar(40) NOT NULL, `ip_address` varchar(45) NOT NULL, `timestamp` int(10) unsigned DEFAULT 0 NOT NULL, `data` blob NOT NULL, PRIMARY KEY (id) );");

            if($result) echo("success create $tb_name ");
            else echo("failed create $tb_name");
            }else{
            echo "already table $tb_name exists";
        }
        echo "<br>";

    }
    function users()
    {
         //users 테이블 만들기
         $tb_name = 'users';
         if(!$this->db->table_exists($tb_name)){
 
             $result = $this->db->query("CREATE TABLE `$tb_name`(
             `id` INT UNSIGNED NULL AUTO_INCREMENT, 
             `auth` INT NOT NULL DEFAULT '1',
             `postal_number` INT UNSIGNED NOT NULL, 
             `address` varchar(255) NOT NULL, 
             `address_more` varchar(255) NOT NULL,
             `userName` varchar(10) NOT NULL, 
             `password` varchar(255) NOT NULL, 
             `name` varchar(10) NOT NULL,
             `sex` varchar(5) NOT NULL,
             `birth` varchar(30) NOT NULL,
             `phone` varchar(20) NOT NULL,
             `email` varchar(40) NOT NULL,
             `profilePhoto` varchar(255) NOT NULL,
             `created` datetime NOT NULL DEFAULT NOW(),
             PRIMARY KEY (`id`),
             UNIQUE KEY `idx_userName`(`userName`)
              ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
             
             $this->db->query("ALTER TABLE `$tb_name` ADD UNIQUE KEY `userName` (`userName`), ADD KEY `email` (`email`);");
                 
             //관리자 추가
             $password =password_hash("admin",PASSWORD_BCRYPT);
             $this->db->query("INSERT INTO `$tb_name` (`id`, `auth`, `userName`, `password`, `name`,`sex`, `phone`, `email`, `created`) 
             VALUES (NULL, '-1', 'admin', '$password', '최고관리자','남' ,'010-6626-2252', 'admin@admin.com', NOW());");
             
             $password =password_hash("test",PASSWORD_BCRYPT);
             $this->db->query("INSERT INTO `$tb_name` (`id`, `auth`, `userName`, `password`, `name`,`sex`, `phone`, `email`, `created`) 
             VALUES (NULL, '1', 'test', '$password', '테스트','남' ,'010-6626-2252', 'test@admin.com', NOW());");
 
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
            -- `category_id` int UNSIGNED NOT NULL,
            `reviews_count` int UNSIGNED NOT NULL DEFAULT '0',
            `name` varchar(30) NOT NULL DEFAULT '샘플상품',
            `desc` varchar(255) NOT NULL DEFAULT '샘플설명', 
            `price` int UNSIGNED NOT NULL DEFAULT '10000', 
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
    function product_option()
    {
         //product_option 테이블 만들기
         $tb_name = 'product_option';
         if(!$this->db->table_exists($tb_name)){
         
             $result = $this->db->query("CREATE TABLE `$tb_name`(
             `id` INT UNSIGNED NULL AUTO_INCREMENT, 
             `product_id` int UNSIGNED NOT NULL,
             `name` varchar(255) NOT NULL,
             `kind` varchar(255) NOT NULL, 
             `sort` int NOT NULL DEFAULT '0', 
             `created` datetime NOT NULL DEFAULT NOW(),
             PRIMARY KEY (`id`),
             KEY `idx_product_id_kind`(`product_id`,`kind`),
             UNIQUE KEY (`product_id`,`name`,`kind`)
              ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
                 
             if($result) echo("success create $tb_name ");
             else echo("failed create $tb_name");
         }else{
             echo "already table $tb_name exists";
         }
         echo "<br>";
    }
    function procedure()
    {
          // //procedure
        // if(ENVIRONMENT == 'development')
        //     $link = mysqli_connect("localhost", "root", db_password, "solution");
        // else if(ENVIRONMENT == 'production')
        //     $link = mysqli_connect("localhost", "santutu10", db_password, "santutu10");    
        // //
        // $procedureName = "test";
        // $result = mysqli_query($link ,"
        // CREATE PROCEDURE `$procedureName`(IN id INT)
        // BEGIN 
        //     SELECT * FROM `product_categories` WHERE `id` = `id`;
        // END
        // ");
        // if($result){
        //     echo("success create $procedureName");
        // }else{
        //     echo("failed create $procedureName");
        // }
        // echo "<br>";
        // //
        // $procedureName = "test2";
        // $result = mysqli_query($link ,"
        // CREATE PROCEDURE `$procedureName`(IN inputparameters INT)
        // BEGIN 
        //     SELECT * FROM products WHERE id = 1;
        // END
        // ");
        // if($result){
        //     echo("success create procedure $procedureName");
        // }else{
        //     echo("failed create procedure $procedureName");
        // }
        // echo "<br>";

    }
    function p_ref_option()
    {
            //p_ref_option 테이블 만들기
            $tb_name = 'p_ref_option';
            if(!$this->db->table_exists($tb_name)){
    
                $result = $this->db->query("CREATE TABLE `$tb_name`(
                `id` INT UNSIGNED NULL AUTO_INCREMENT, 
                `product_id` INT UNSIGNED NOT NULL,
                `option_id` INT UNSIGNED NOT NULL,
                `created` datetime NOT NULL DEFAULT NOW(),
                KEY `idx_product_option_id`(`product_id`,`option_id`),
                PRIMARY KEY (`id`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
                    
                if($result) echo("success create $tb_name ");
                else echo("failed create $tb_name");
            }else{
                echo "already table $tb_name exists";
            }
            echo "<br>";
    }
    
   
    function product_reviews()
    {
         //product_reviews 테이블 만들기
         $tb_name = "product_reviews";
         if(!$this->db->table_exists($tb_name)){
             $result = $this->db->query("CREATE TABLE `$tb_name`(
             `id` INT UNSIGNED NULL AUTO_INCREMENT, 
             `product_id` int UNSIGNED NOT NULL,
             `user_id` INT UNSIGNED NOT NULL, 
             `title` varchar(30) NOT NULL, 
             `desc` text NOT NULL,
             `reply_count` INT UNSIGNED  NOT NULL DEFAULT '0',
             `guest_name` varchar(50) NOT NULL DEFAULT 'NULL',
             `guest_password` varchar(255) NOT NULL DEFAULT 'NULL',
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
             KEY `idx_product_id` (`product_id`),
             KEY `idx_board_user_id` (`product_id`,`user_id`),
             KEY `idx_is_display` (`is_display`)
             -- FOREIGN KEY (`board_id`) REFERENCES `boards` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
             -- FOREIGN KEY (`id`) REFERENCES `board_rviews` (`content_id`) ON DELETE CASCADE ON UPDATE CASCADE
             ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
                 
             if($result) echo("success create $tb_name ");
             else echo("failed create $tb_name");
         }else{
             echo "already table $tb_name exists";
         }
         echo "<br>";
    }
    function product_review_replys()
    {
          //product_review_replys 테이블 만들기
          $tb_name = 'product_review_replys';
          if(!$this->db->table_exists($tb_name)){
              $result = $this->db->query("CREATE TABLE `$tb_name`(
              `id` INT UNSIGNED NULL AUTO_INCREMENT, 
              `parent_id` INT UNSIGNED DEFAULT '0',
              `product_id` INT UNSIGNED NOT NULL, 
              `review_id` INT UNSIGNED NOT NULL,
              `user_id` INT UNSIGNED NOT NULL, 
              `guest_name` varchar(50) DEFAULT 'NULL',
              `guest_password` varchar(255) DEFAULT 'NULL',
              `desc` varchar(255) NOT NULL,
              `is_secret` varchar(10) NOT NULL DEFAULT '0', 
              `is_display` varchar(10) NOT NULL DEFAULT '0', 
              `score_1` INT UNSIGNED, 
              `score_2` INT UNSIGNED, 
              `score_3` INT UNSIGNED, 
              `score_4` INT UNSIGNED, 
              `score_5` INT UNSIGNED, 
              `created` datetime NOT NULL DEFAULT NOW(),
              PRIMARY KEY (`id`),
              KEY `idx_board_content_user_id` (`product_id`,`review_id`,`user_id`)
              ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
                  
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
               `photo` varchar(50), 
               `can_alert` varchar(10) NOT NULL DEFAULT '1', 
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
    function ref_cate_product()
    {
        //ref_cate_product 테이블 만들기
        $tb_name = 'ref_cate_product';
        if(!$this->db->table_exists($tb_name)){
        
            $result = $this->db->query("CREATE TABLE `$tb_name`(
            `id` INT UNSIGNED NULL AUTO_INCREMENT, 
            `cate_id` INT UNSIGNED NOT NULL, 
            `product_id` INT UNSIGNED NOT NULL,
            `sort` INT NOT NULL DEFAULT '0',
            `created` datetime NOT NULL DEFAULT NOW(),
            UNIQUE KEY `idx_cate_id_product_id` (`cate_id`,`product_id`),
            PRIMARY KEY (`id`) ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
                
            if($result) echo("success create $tb_name ");
            else echo("failed create $tb_name");
        }else{
            echo "already table $tb_name exists";
        }
        echo "<br>";
    }
    function product_orders()
    {
        //product_orders 테이블 만들기
        $tb_name = 'product_orders';
        if(!$this->db->table_exists($tb_name)){
            $result = $this->db->query("CREATE TABLE `$tb_name`(
            `id` INT UNSIGNED NULL AUTO_INCREMENT, 
            `merchant_uid` varchar(100) NOT NULL,
            `order_name` varchar(100) NOT NULL,
            `user_id` INT UNSIGNED NOT NULL,
            `user_name` varchar(50) NOT NULL,
            `phone` varchar(50) NOT NULL,
            `total_price` INT UNSIGNED,
            `status` varchar(100) NOT NULL,
            `pay_method` varchar(100),
            `apply_num` varchar(100),
            `vbank_name` varchar(100),
            `vbank_holder` varchar(100),
            `vbank_num` varchar(100),
            `vbank_date` varchar(100),
           
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
    function p_order_products()
    {
         //p_order_products 테이블 만들기
         $tb_name = 'p_order_products';
         if(!$this->db->table_exists($tb_name)){
             $result = $this->db->query("CREATE TABLE `$tb_name`(
             `id` INT UNSIGNED NULL AUTO_INCREMENT, 
             `merchant_uid` varchar(100) NOT NULL,
             `product_id` INT UNSIGNED NOT NULL, 
             `count` INT UNSIGNED NOT NULL, 
             `price` INT UNSIGNED NOT NULL, 
             `is_review_write` varchar(10) NOT NULL DEFAULT '0',
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
    function product_celebrity_reviews()
    {
        //product_celebrity_reviews 테이블 만들기
        $tb_name = 'product_celebrity_reviews';
        if(!$this->db->table_exists($tb_name)){
            $result = $this->db->query("CREATE TABLE `$tb_name`(
            `id` INT UNSIGNED NULL AUTO_INCREMENT, 
            `product_id` INT UNSIGNED NOT NULL, 
            `celebrity_name` INT UNSIGNED NOT NULL, 
            `desc` varchar(255) NOT NULL, 
            `picture` varchar(255) NOT NULL, 
            `score_1` INT UNSIGNED NOT NULL, 
            `score_2` INT UNSIGNED NOT NULL, 
            `score_3` INT UNSIGNED NOT NULL, 
            `score_4` INT UNSIGNED NOT NULL, 
            `score_5` INT UNSIGNED NOT NULL, 
            `created` datetime NOT NULL DEFAULT NOW(),
            PRIMARY KEY (`id`),
            KEY `idx_product_id` (`product_id`)
             ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
            if($result) echo("success create $tb_name ");
            else echo("failed create $tb_name");
        }else{
            echo "already table $tb_name exists";
        }
        echo "<br>";

    }
    function messages()
    {
         //messages 테이블 만들기
         $tb_name = 'messages';
         if(!$this->db->table_exists($tb_name)){
             $result = $this->db->query("CREATE TABLE `$tb_name`(
             `id` INT UNSIGNED NULL AUTO_INCREMENT, 
             `from_user_id` INT UNSIGNED NOT NULL, 
             `to_user_id` INT UNSIGNED NOT NULL, 
             `title` varchar(255) NOT NULL, 
             `desc` varchar(255) NOT NULL, 
             `created` datetime NOT NULL DEFAULT NOW(),
             PRIMARY KEY (`id`),
             KEY `idx_from_user_to_user_id` (`from_user_id`,`to_user_id`)
              ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
                 
             if($result) echo("success create $tb_name ");
             else echo("failed create $tb_name");
         }else{
             echo "already table $tb_name exists";
         }
         echo "<br>";
    }
    function menus()
    {
        //menus 테이블 만들기
        $tb_name = 'menus';
        if(!$this->db->table_exists($tb_name)){
            $result = $this->db->query("CREATE TABLE `$tb_name`(
            `id` INT UNSIGNED NULL AUTO_INCREMENT, 
            `parent_id` INT UNSIGNED NOT NULL DEFAULT '0', 
            -- `position` VARCHAR(30) NOT NULL DEFAULT 'main', 
            `order` INT  NOT NULL DEFAULT '1', 
            `name` varchar(30) NOT NULL DEFAULT '샘플메뉴', 
            `uri` varchar(255) DEFAULT '', 
            `skin` varchar(30), 
            `is_display_to_login` varchar(10) DEFAULT '0', 
            `created` datetime NOT NULL DEFAULT NOW(),
            PRIMARY KEY (`id`),
            UNIQUE KEY(`id`),
            -- KEY `idx_position_parent_id` (`position`,`parent_id`),
            KEY `order` (`order`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
                
            if($result) echo("success create $tb_name ");
            else echo("failed create $tb_name");
        }else{
            echo "already table $tb_name exists";
        }
        echo "<br>";
    }
    function boards()
    {
         //boards 테이블 만들기
         $tb_name = 'boards';
         if(!$this->db->table_exists($tb_name)){
             $result = $this->db->query("CREATE TABLE `$tb_name`(
             `id` INT UNSIGNED NULL AUTO_INCREMENT, 
             `name` varchar(30) NOT NULL DEFAULT '샘플게시판',
             `contents_count` INT UNSIGNED NOT NULL DEFAULT '0', 
             `is_linked_with_product` varchar(10) NOT NULL DEFAULT '0', 
             `auth_r_board` INT NOT NULL DEFAULT '0', 
             `auth_r_content` INT NOT NULL DEFAULT '0',
             `auth_w_content` INT NOT NULL DEFAULT '1', 
             `auth_w_review` INT NOT NULL DEFAULT '1',
             `skin` varchar(30) NOT NULL DEFAULT 'basic', 
             `created` datetime NOT NULL DEFAULT NOW(),
             PRIMARY KEY (`id`),
             UNIQUE KEY `idx_id`(`id`)
              ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
                 
             if($result) echo("success create $tb_name ");
             else echo("failed create $tb_name");
         }else{
             echo "already table $tb_name exists";
         }
         echo "<br>";
    }
    function board_contents()
    {
         //board_contents 테이블 만들기
         $tb_name = "board_contents";
         if(!$this->db->table_exists($tb_name)){
             $result = $this->db->query("CREATE TABLE `$tb_name`(
             `id` INT UNSIGNED NULL AUTO_INCREMENT, 
             `board_id` int UNSIGNED NOT NULL,
             `user_id` INT UNSIGNED NOT NULL, 
             `product_id` INT UNSIGNED NOT NULL, 
             `title` varchar(30) NOT NULL, 
             `desc` TEXT NOT NULL,
             `replys_count` INT UNSIGNED  NOT NULL DEFAULT '0',
             `guest_name` varchar(50) NOT NULL DEFAULT 'NULL',
             `guest_password` varchar(255) NOT NULL DEFAULT 'NULL',
             `is_secret` varchar(10) NOT NULL DEFAULT '0',
             `is_display` varchar(10) NOT NULL DEFAULT '1',
             `hits` int UNSIGNED NOT NULL, 
             `created` datetime NOT NULL DEFAULT NOW(),
             PRIMARY KEY (`id`)
             -- KEY `idx_board_id` (`board_id`),
             -- KEY `idx_board_user_id` (`board_id`,`user_id`),
             -- KEY `idx_is_display` (`is_display`),
             -- KEY `idx_product_id` (`product_id`)
             -- KEY `idx_is_display_product_id` (`is_display`,`product_id`)
             -- KEY `idx_user_id` (`user_id`),
             -- KEY `idx_user_id_is_display` (`user_id`,`is_display`)
             -- FOREIGN KEY (`board_id`) REFERENCES `boards` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
             -- FOREIGN KEY (`id`) REFERENCES `board_rviews` (`content_id`) ON DELETE CASCADE ON UPDATE CASCADE
             ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
                 
             if($result) echo("success create $tb_name ");
             else echo("failed create $tb_name");
         }else{
             echo "already table $tb_name exists";
         }
         echo "<br>";
    }
    function board_replys()
    {
         //board_replys 테이블 만들기
         $tb_name = 'board_replys';
         if(!$this->db->table_exists($tb_name)){
             $result = $this->db->query("CREATE TABLE `$tb_name`(
             `id` INT UNSIGNED NULL AUTO_INCREMENT, 
             `parent_id` INT UNSIGNED DEFAULT '0',
             `board_id` INT UNSIGNED NOT NULL, 
             `content_id` INT UNSIGNED NOT NULL,
             `user_id` INT UNSIGNED NOT NULL, 
             `guest_name` varchar(50) DEFAULT 'NULL',
             `guest_password` varchar(255) DEFAULT 'NULL',
             `desc` varchar(255) NOT NULL,
             `is_secret` varchar(10) NOT NULL DEFAULT '0', 
             `is_display` varchar(10) NOT NULL DEFAULT '0', 
             `good` INT UNSIGNED, 
             `hated` INT UNSIGNED, 
             `created` datetime NOT NULL DEFAULT NOW(),
             PRIMARY KEY (`id`),
             KEY `idx_board_content_user_id` (`board_id`,`content_id`,`user_id`)
             ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
                 
             if($result) echo("success create $tb_name ");
             else echo("failed create $tb_name");
         }else{
             echo "already table $tb_name exists";
         }
         echo "<br>";
    }
    function pages()
    {
         //Page 테이블 만들기
         $tb_name = 'pages';
         if(!$this->db->table_exists($tb_name)){
             $result = $this->db->query("CREATE TABLE `$tb_name`(
             `id` INT UNSIGNED NULL AUTO_INCREMENT, 
             `title` varchar(80) NOT NULL DEFAULT '샘플제목',
             `desc` varchar(255) NOT NULL DEFAULT '샘플내용입니다.',
             `is_secret` varchar(10) NOT NULL DEFAULT '0', 
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
    function product_cartlist()
    {
          //product_cartlist 테이블 만들기
          $tb_name = 'product_cartlist';
          if(!$this->db->table_exists($tb_name)){
              $result = $this->db->query("CREATE TABLE `$tb_name`(
              `id` INT UNSIGNED NULL AUTO_INCREMENT, 
              `product_id` INT NOT NULL,
              `user_id` INT NOT NULL,
              `count` INT NOT NULL DEFAULT 1,
              `kind` varchar(50) NOT NULL DEFAULT 'cartlist',
              `created` datetime NOT NULL DEFAULT NOW(),
              PRIMARY KEY (`id`),
              UNIQUE KEY `idx_product_user_id_kind` (`product_id`,`user_id`,`kind`)
              ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
                  
              if($result) echo("success create $tb_name ");
              else echo("failed create $tb_name");
          }else{
              echo "already table $tb_name exists";
          }
          echo "<br>";
    }
    
	 function _index()
    {
        
      
       
        
       
       

       

        
       

       
         
        // //product_contents 테이블 만들기
        // $tb_name = "product_contents";
        // if(!$this->db->table_exists($tb_name)){
        //     $result = $this->db->query("CREATE TABLE `$tb_name`(
        //     `id` INT UNSIGNED NULL AUTO_INCREMENT, 
        //     `product_id` int UNSIGNED NOT NULL,
        //     `user_id` INT UNSIGNED NOT NULL, 
        //     `title` varchar(30) NOT NULL, 
        //     `desc` varchar(255) NOT NULL,
        //     `skin` varchar(30) NOT NULL, 
        //     `replys_count` INT UNSIGNED  NOT NULL DEFAULT '0',
        //     `guest_name` varchar(50) NOT NULL DEFAULT 'NULL',
        //     `guest_password` varchar(255) NOT NULL DEFAULT 'NULL',
        //     `is_secret` varchar(10) NOT NULL DEFAULT '0',
        //     `is_display` varchar(10) NOT NULL DEFAULT '1',
        //     `hits` int UNSIGNED NOT NULL, 
        //     `created` datetime NOT NULL DEFAULT NOW(),
        //     PRIMARY KEY (`id`),
        //     KEY `idx_product_id` (`product_id`),
        //     KEY `idx_product_user_id` (`product_id`,`user_id`),
        //     KEY `idx_is_display` (`is_display`),
        //     KEY `idx_user_id` (`user_id`),
        //     KEY `idx_user_id_is_display` (`user_id`,`is_display`)
        //     -- FOREIGN KEY (`board_id`) REFERENCES `boards` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
        //     -- FOREIGN KEY (`id`) REFERENCES `board_rviews` (`content_id`) ON DELETE CASCADE ON UPDATE CASCADE
        //     ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
                
        //     if($result) echo("success create $tb_name ");
        //     else echo("failed create $tb_name");
        // }else{
        //     echo "already table $tb_name exists";
        // }
        // echo "<br>";

        // //product_replys 테이블 만들기
        // $tb_name = 'product_replys';
        // if(!$this->db->table_exists($tb_name)){
        //     $result = $this->db->query("CREATE TABLE `$tb_name`(
        //     `id` INT UNSIGNED NULL AUTO_INCREMENT, 
        //     `parent_id` INT UNSIGNED DEFAULT '0',
        //     `product_id` INT UNSIGNED NOT NULL, 
        //     `content_id` INT UNSIGNED NOT NULL,
        //     `user_id` INT UNSIGNED NOT NULL, 
        //     `guest_name` varchar(50) DEFAULT 'NULL',
        //     `guest_password` varchar(255) DEFAULT 'NULL',
        //     `desc` varchar(255) NOT NULL,
        //     `is_secret` varchar(10) NOT NULL DEFAULT '0', 
        //     `is_display` varchar(10) NOT NULL DEFAULT '0', 
        //     `good` INT UNSIGNED, 
        //     `hated` INT UNSIGNED, 
        //     `created` datetime NOT NULL DEFAULT NOW(),
        //     PRIMARY KEY (`id`),
        //     KEY `idx_product_content_user_id` (`product_id`,`content_id`,`user_id`)
        //     ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
                
        //     if($result) echo("success create $tb_name ");
        //     else echo("failed create $tb_name");
        // }else{
        //     echo "already table $tb_name exists";
        // }
        // echo "<br>";
        

	}
    public function shop()
    {
        $this->load->model('base/menus_model');
        $this->load->model('shop/product_categories_model');
        $this->load->model('shop/products_model');
        $this->load->model('base/boards_model');
        $this->load->model('shop/product_reviews_model');
        $this->load->model('shop/ref_cate_product_model');

        $home_link= site_url("");
        echo "<a href='$home_link'>홈으로</a>";
        echo "<br>";
        //muenus_top
        $table_menus = 'menus';
        $name = '상단메뉴';
        $row =$this->menus_model->_get(array('name'=>$name));

        if($row === null){

            $menu_top_parent_id= $this->menus_model->_add(array(
                'parent_id'=>'0',
                'name'=>$name,
            ));
            //장바구니
            $name = "장바구니";
            $uri = shop_cartlist_uri."/gets";
            
            $parent_id= $this->menus_model->_add(array(
                'parent_id'=>$menu_top_parent_id,
                'name'=>$name,
                'uri'=>$uri
            ));

            //마이페이지
            $name = "마이페이지";
            $uri = shop_mypage_uri."/index";
            
            $parent_id= $this->menus_model->_add(array(
                'parent_id'=>$menu_top_parent_id,
                'name'=>$name,
                'uri'=>$uri,
                'skin'=>'mypage',
                'is_display_to_login'=>'1'
            ));

            //장바구니
            $name = "장바구니";
            $uri = shop_cartlist_uri."/gets";
            $this->menus_model->_add(array(
                'parent_id'=>$parent_id,
                'name'=>$name,
                'uri'=>$uri,
                'is_display_to_login'=>'1'
            ));

            //주문관리
            $name = "주문관리";
            $uri = shop_order_uri."/gets";
            $this->menus_model->_add(array(
                'parent_id'=>$parent_id,
                'name'=>$name,
                'uri'=>$uri,
                'is_display_to_login'=>'1'
            ));


            //후기관리 메뉴
            $name = "내가쓴 후기";
            $uri = shop_review_uri."/gets";
            $this->menus_model->_add(array(
                'parent_id'=>$parent_id,
                'name'=>$name,
                'uri'=>$uri,
                'is_display_to_login'=>'1'
            ));

            // //상품문의 게시판
            // $name ='상품문의';
            // $skin="product_qna";
            // $board_id= $this->boards_model->_add(array(
            //     "name"=>$name,
            //     "skin"=>$skin,
            //     "is_linked_with_product" =>"1",
            //     "auth_w_content"=>"0",
            //     "auth_w_review"=>"0"
            //     ));
 
 
            //  //상품문의 메뉴
            //  $name = "상품문의";
            //  $uri = content_uri."/gets?board_id={$board_id}&is_user=true";
            //  $this->menus_model->_add(array(
            //      'parent_id'=>$parent_id,
            //      'name'=>$name,
            //      'uri'=>$uri,
            //      'is_display_to_login'=>'1'
            //  ));

            //1:1문의 게시판
            $name ='1:1문의';
            $skin="contact";
            $board_id= $this->boards_model->_add(array("name"=>$name,"skin"=>$skin));
          
            //1:1문의 메뉴
            $name = "1:1문의";
            $uri = content_uri."/gets?board_id=$board_id&is_user=true";
            $this->menus_model->_add(array(
                'parent_id'=>$parent_id,
                'name'=>$name,
                'uri'=>$uri,
                'is_display_to_login'=>'1'
            ));
            
            //sample product_caregories
            $name = "샘플 상품분류";
            $cate_id =$this->product_categories_model->_add();
            
            //sample product
            $product_id =$this->products_model->_add(array('price'=>'2000','name'=>'샘플상품1'));
            //카테고리에 추가
            $this->ref_cate_product_model->_add(array('cate_id'=>$cate_id,'product_id'=>$product_id));

            //sample product2
             $product_id = $this->products_model->_add(array('price'=>'2000','name'=>'샘플상품2'));
            //카테고리에 추가
            $this->ref_cate_product_model->_add(array('cate_id'=>$cate_id,'product_id'=>$product_id));


            echo "succeed row '$name' from $table_menus ";
            echo "<br>";
        }else{
            echo "already exists row '$name' from $table_menus ";
            echo "<br>";
        }
        
    }
   
   
    public function base(){
        $this->load->model('base/menus_model');
        $this->load->model('base/boards_model');
        $this->load->model('base/pages_model');
        
        $home_link= site_url("");
        echo "<a href='$home_link'>홈으로</a>";
        echo "<br>";

       

        //menus_main
        $table_menus = 'menus';
        $name = '메인메뉴';
        $row = $this->menus_model->_get(array('name'=>$name));

        if($row === null){

            //메인메뉴
            $main_menu_parent_id= $this->menus_model->_add(array(
                'parent_id'=>'0',
                'name'=>$name
            ));

            //샘플페이지
            $page_id = $this->pages_model->_add();

            
            //샘플메인메뉴
            $uri = page_uri."/get/$page_id";
            $name = "샘플메뉴1";
            $parent_id= $this->menus_model->_add(array(
                'parent_id'=>$main_menu_parent_id,
                'name'=>$name,
                'uri'=>$uri
            ));

            //샘플서브메뉴(페이지)
            $name = '샘플서브메뉴1';
            $uri = page_uri."/get/$page_id";
            $this->menus_model->_add(array(
                'parent_id'=>$parent_id,
                'name'=>$name,
                'uri'=>$uri
            ));

            //샘플페이지2
            $title = "샘플 제목2";
            $desc = "샘플 내용입니다2.";
            $page_id = $this->pages_model->_add(array(
                'title'=>$title,
                'desc'=>$desc
            ));

         
            //샘플서브메뉴(페이지)
            $name = '샘플서브메뉴2';
            $uri = page_uri."/get/$page_id";
            $this->menus_model->_add(array(
                'parent_id'=>$parent_id,
                'name'=>$name,
                'uri'=>$uri
            ));

            //샘플게시판
            $board_id=$this->boards_model->_add(array('auth_w_content'=>'0','auth_w_review'=>'0'));

            //샘플메인메뉴2
            $name = '샘플메뉴2(게시판)';
            $uri = content_uri."/gets?board_id=$board_id";
            $parent_id=$this->menus_model->_add(array(
                'parent_id'=>$main_menu_parent_id,
                'name'=>$name,
                'uri'=>$uri
            ));

             //샘플서브메뉴1
             $name = '샘플서브메뉴1';
             $uri = content_uri."/gets?board_id=$board_id";
             $this->menus_model->_add(array(
                 'parent_id'=>$parent_id,
                 'name'=>$name,
                 'uri'=>$uri
             ));

            //샘플게시판2
            $board_id=$this->boards_model->_add(array('name'=>'샘플게시판2','auth_w_content'=>'0','auth_w_review'=>'0'));

            //샘플서브메뉴2
            $name = '샘플서브메뉴2';
            $uri = content_uri."/gets?board_id=$board_id";
            $this->menus_model->_add(array(
                'parent_id'=>$parent_id,
                'name'=>$name,
                'uri'=>$uri
            ));


            echo "succeed exists row '$name' from $table_menus ";
            echo "<br>";
        }else{
            echo "already exists row '$name' from $table_menus ";
            echo "<br>";
        }
    }

  

}
