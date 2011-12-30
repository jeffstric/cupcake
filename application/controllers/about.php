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
                      'category'=>$this->C_M->get_all(),
                           'nav'=>get_nav(array('index','cakes') ),
                       'content'=>$this->S_M->value('about'),
                        'banner'=>$this->AS_M->get_adsence( 
            array('global_ad1'=>2,'global_ad2'=>3,'global_ad3'=>3) 
                                ),
            );
            
            $this->load->view('header',$info);
            $this->load->view('about');
            $this->load->view('footer');
        }
            
    }
?>
