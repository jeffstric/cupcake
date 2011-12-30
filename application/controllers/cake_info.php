<?php

/*
 * author cnbb.com.cn
 */
    class cake_info extends CI_Controller{
        public function __construct() {
            parent::__construct();
            $this->load->model('adsence_style_model','AS_M');
            $this->load->model('category_model','C_M');
        }
        
        public function index($P_id){
            //注意，$nav必须存在，因为CI在控制器中载入模型后会导致需要相同模型地辅助函数失效
            $nav =get_nav(array('index','cakes','product'=>$P_id) );
            $this->load->model('product_model','P_M');
            $info = array(
                       'menu_on'=>2,
                      'category'=>$this->C_M->get_all(),
                       'product'=>$this->P_M->product_show($P_id),
                           'nav'=>$nav,
                        'banner'=>$this->AS_M->get_adsence( 
            array('global_ad1'=>2,'global_ad2'=>3,'global_ad3'=>3) 
                                ),
            );
            $this->load->view('header',$info);
            $this->load->view('cake_info');
            $this->load->view('footer');
        }
    }
?>
