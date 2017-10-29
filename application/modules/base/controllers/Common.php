<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common extends Public_Controller {

    function __construct(){
        parent::__construct();
    }
    
    function upload_receive_from_ck(){
        $config['upload_path'] = './public/uploads/user';
        // git,jpg,png 파일만 업로드를 허용한다.
        $config['allowed_types'] = 'gif|jpg|png';
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

    function upload_photo($who,$name,$uploadfunc)
    {
        $imgDir = "";
        if (isset($_FILES[$name])) {
            $config['upload_path'] = "./public/uploads/$who/images";
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '500000'; //500KB
            $config['max_width']  = '10240';
            $config['max_height']  = '7680';
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload($name)) {

                alert($this->upload->display_errors(false,false));
                my_redirect($_SERVER['HTTP_REFERER']);
                return;
                // echo ($this->upload->display_errors());
            } else {
                $fileName= $this->upload->data()['file_name'];
                $imgDir= "/public/uploads/$who/images/$fileName";
                //리사이즈
                // $config['image_library'] = 'gd2';
                // $config['source_image'] = "./public/uploads/$who/images/$fileName";
                // $config['maintain_ratio'] = true;
                // $config['width']   = 80;
                // $config['height']   = 80;

                // $this->load->library('image_lib', $config);
                $uploadfunc($imgDir);
                // $this->image_lib->resize();
              
                return;
            }
        }

    }
}
