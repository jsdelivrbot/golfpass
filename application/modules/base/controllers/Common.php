<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common extends Public_Controller {

    function __construct(){
        parent::__construct(array(
            "view_dir"=>"common"
        ));
    }
    
    function upload_receive_from_ck(){
        $config['upload_path'] = './public/uploads/user';
        // git,jpg,png 파일만 업로드를 허용한다.
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        // 허용되는 파일의 최대 사이즈
        $config['max_size'] = '2000';
        // 이미지인 경우 허용되는 최대 폭
        $config['max_width']  = '2048';
        // 이미지인 경우 허용되는 최대 높이
        $config['max_height']  = '1536';
        $this->load->library('upload', $config);

        $CKEditorFuncNum = $this->input->get('CKEditorFuncNum');
        if ( ! $this->upload->do_upload("upload"))
        {
            $msg = "'{$this->upload->display_errors(false,false)}'";
            $url ="false";
        }   
        else
        {
            $data = $this->upload->data();            
            $filename = $data['file_name'];

            $msg = "false";
            $url = "'/public/uploads/user/{$filename}'";
        }
        echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction('{$CKEditorFuncNum}', {$url}, {$msg} )</script>";         
    }
    function upload_photo()
    {
        // echo "1";
        $this->_upload_photo('admin','photo',function($imgDir){
            //   리사이즈
              $config['image_library'] = 'gd2';
              $config['source_image'] = ".{$imgDir}";
              $config['maintain_ratio'] = true;
              $config['width']   = 225;
              $config['height']   = 255;

            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
        },
        function(){
            echo ($this->upload->display_errors());
        },
        function($imgDir){
            $this->_view("upload_photo", array("photo"=>$imgDir));
        });

     
    }
    function _multi_upload_photo($who,$name,$uploadfunc=null,$failFunc =null,$endFunc =null)
    {       
        $this->load->library('upload');
        $imgDir = "";
        $files = $_FILES;
        $cpt = count($_FILES[$name]['name']);
        $errors ="";

        $config = array();
        $config['upload_path'] = "./public/uploads/{$who}/images";
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = '500000'; //500KB
        $config['max_width']  = '10240';
        $config['max_height']  = '7680';
        $config['overwrite']     = FALSE;

        for($i=0; $i<$cpt; $i++)
        {           
            $_FILES[$name]['name']= $files[$name]['name'][$i];
            $_FILES[$name]['type']= $files[$name]['type'][$i];
            $_FILES[$name]['tmp_name']= $files[$name]['tmp_name'][$i];
            $_FILES[$name]['error']= $files[$name]['error'][$i];
            $_FILES[$name]['size']= $files[$name]['size'][$i];    
    
          
            $this->upload->initialize($config);
            if (!$this->upload->do_upload($name)) {//실패
                if($failFunc === null)
                {
                    $errors .=$this->upload->display_errors(false,false)."<br>";
                }
                else
                {
                    $failFunc();
                }
            }
            else//성공
            {
                $fileName= $this->upload->data()['file_name'];
                $imgDir= "/public/uploads/$who/images/$fileName";
                $uploadfunc($imgDir);
            }
        }
        //끝
        if($errors!=="")
            alert($errors);
        if($endFunc !== null)
            $endFunc($imgDir);
        return ;
    }
    
  

    function _upload_photo($who,$name,$uploadfunc,$failFunc =null,$endFunc =null)
    {
        $imgDir = "";
        if (isset($_FILES[$name])) {
            $config['upload_path'] = "./public/uploads/$who/images";
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size'] = '500000'; //500KB
            $config['max_width']  = '10240';
            $config['max_height']  = '7680';
            $this->load->library('upload', $config);
            
            if (!$this->upload->do_upload($name)) {
               //업로드 실패 함수
                if($failFunc === null)
                {
                    alert($this->upload->display_errors(false,false));
                    my_redirect($_SERVER['HTTP_REFERER']);
                    return;
                }
                else
                {
                    $failFunc();
                }          
                
            } else {
                //업로드 성공 함수
                $fileName= $this->upload->data()['file_name'];
                $imgDir= "/public/uploads/$who/images/$fileName";
                $uploadfunc($imgDir);
            }
        }
        // 마무리함수
        if($endFunc !== null)
            $endFunc($imgDir);
        return ;
    }
}
