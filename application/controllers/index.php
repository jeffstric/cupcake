<?php

/*
 * author cnbb.com.cn
 */
    class Index extends CI_Controller{
        public function __construct() {
            parent::__construct();
        }
        public function index(){
            $info['menu_on'] = 0;
            $this->load->view('header',$info);
            $this->load->view('index');
            $this->load->view('footer');
        }
    }
?>
