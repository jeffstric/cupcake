<?php

/*
 * author cnbb.com.cn
 */

    class About extends CI_Controller{
        public function __constrtuct(){
            parent::__construct();
        }
        public function index(){
            $info['menu_on'] = 1;
            $this->load->view('header',$info);
            $this->load->view('about');
            $this->load->view('footer');
        }
            
    }
?>
