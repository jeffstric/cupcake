<?php

/*
 * author cnbb.com.cn
 */
    class Admin extends CI_Controller{
        public function __construct() {
            parent::__construct();
            $this->load->library();
            $this->load->library(array('session','form_validation') ); 
            $this->load->helper('form');
            $this->load->model('login_model','L_M');
        }
        
        public function login(){
            fb($this->form_validation->run('login'));
           if ($this->form_validation->run('login') == FALSE){
                $this->load->view('admin/login');
           }
           else{
               if(is_numeric($this->U_id)){
                    $this->L_M->login($this->U_id);
                    fb('登陆成功');
               }     
               else{
                   fb('函数namepw_check没有正确执行',FirePHP::TRACE);
                   die();show_error ('错误');
               }
            }
        }
        
        public function sign_out(){
            $this->L_M->sign_out($this->session->userdata('session_id'));
            header('Location:'.site_url('admin/login'));
        }
            
        public function namepw_check($name){
            $this->load->model('user_model','U_M');
            $result = $this->U_M->name_pw_check($name,$this->input->post('pw'));
            if($result != FALSE){
                $this->U_id = $result;
                return TRUE;
            }
            else{
                $this->form_validation->set_message('namepw_check', '用户名或密码错误');
                return FALSE;
            }
        }
        
        public function checkcode_check($input){
            @session_start();
            if($_SESSION['turing_string'] == $input)
                return TRUE;
            else{
                $this->form_validation->set_message('checkcode_check', '验证码错误');
                return FALSE;
            }
        }
        
        public function a(){
            
        }
        
        public function b(){
            
        }
        
        public function c(){
            
        }
        
        
    }
?>
