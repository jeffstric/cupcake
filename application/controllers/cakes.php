<?php

/*
 * author cnbb.com.cn
 */
    class Cakes extends CI_Controller{
        public function __construct() {
            parent::__construct();
            $this->load->model('adsence_style_model','AS_M');
            $this->load->model('category_model','C_M');
            $this->load->model('product_model','P_M');
        }
        public function index(){
            $info = array(
                     'products'=>$this->P_M->product_get(),
                          'nav'=>get_nav(array('index','cakes'))
                   );
            $this->load_view('cakes', $info);
        }
        public function category($C_id){
            $info = array(
                     'products'=>$this->P_M->product_get($C_id),
                          'nav'=>get_nav(array('index','cakes','category'=>$C_id))
                   );
            $this->load_view('cakes', $info);
        }
        private function load_view($body,$I){
            $info = array_merge($I, 
              array(
                'global_adsence'=>$this->AS_M->get_adsence(2),
                      'category'=>$this->C_M->get_all(),
                       'menu_on'=>2
                   ) 
            );
            $this->load->view('header',$info);
            $this->load->view($body);
            $this->load->view('footer');
        }
    }
?>
