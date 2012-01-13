<?php

/*
 * author cnbb.com.cn
 */
    class Index extends CI_Controller{
        public function __construct() {
            parent::__construct();
            $this->load->model('category_model','C_M');
        }
        public function index(){
            $this->load->model('product_model','P_M');
            $info = array(
                     'menu_on'=>0,
                    'load_css'=>'gallery.css',
                     'load_js'=>'gallery.js',
                    'category'=>$this->C_M->get_all(),
                    'Iproduct'=>$this->P_M->index_product(),
                   );
            $this->load->view('header',$info);
            $this->load->view('index');
            $this->load->view('footer');
        }
    }
?>
