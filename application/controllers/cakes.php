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
        public function index($page = 0){
            $info = array(
                     'products'=>$this->P_M->product_get(0,$page),
                          'nav'=>get_nav(array('index','cakes')),
                 'pagelist_url'=>'cakes/index/',
                      'pagenum'=>$this->P_M->page_num(),
                         'page'=>$page
                   );
            $this->load_view('cakes', $info);
        }
        public function category($C_id,$page = 1){
            $info = array(
                     'products'=>$this->P_M->product_get($C_id,$page),
                          'nav'=>get_nav(array('index','cakes','category'=>$C_id)),
                 'pagelist_url'=>'cakes/category/'.$C_id.'/',
                      'pagenum'=>$this->P_M->page_num($C_id),
                         'page'=>$page
                   );
            $this->load_view('cakes', $info);
        }
        private function load_view($body,$I){
            $info = array_merge($I, 
              array(
                      'category'=>$this->C_M->get_all(),
                       'menu_on'=>2,
                        'banner'=>$this->AS_M->get_adsence( 
         array('global_ad1'=>2,'global_ad2'=>3,'global_ad3'=>3) 
                                )
                   ) 
            );
            $this->load->view('header',$info);
            $this->load->view($body);
            $this->load->view('footer');
        }
    }
?>
