<?php
	class Test  {
        public function method(){
            $t = new Test2();
            $t->method();
            // echo 1;
        }
        
    }


    class Test2{
        public function method(){
            echo 2;
        }
    }