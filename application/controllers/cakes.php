<?php

/*
 * author cnbb.com.cn
 */
    class Cakes extends CI_Controller{
        public function __construct() {
            parent::__construct();
        }
        public function index(){
            $info['menu_on'] = 2;
            $this->load->view('header',$info);
            $this->load->view('cakes');
            $this->load->view('footer');
        }
    }
?>
