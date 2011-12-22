<?php

/*
 * author cnbb.com.cn
 */
    class Contact extends CI_Controller{
        public function __construct() {
            parent::__construct();
        }
        
        public function index(){
            $info['menu_on'] = 3;
            $this->load->view('header',$info);
            $this->load->view('contact');
            $this->load->view('footer');
        }
    }
?>
