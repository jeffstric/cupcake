<?php

/*
 * author cnbb.com.cn
 */

    class About extends CI_Controller{
        public function __constrtuct(){
            parent::__construct();
        }
        public function index(){
            $this->load->model('site_model','S_M');
            $this->load->model('adsence_style_model','AS_M');
            $this->load->model('category_model','C_M');
            
            $info = array(
                       'menu_on'=>1,
                'global_adsence'=>$this->AS_M->get_adsence(2),
                      'category'=>$this->C_M->get_all(),
                           'nav'=>get_nav(array('index','cakes') ),
                         'content'=>$this->S_M->value('about')
            );
            
            $this->load->view('header',$info);
            $this->load->view('about');
            $this->load->view('footer');
        }
            
    }
?>
