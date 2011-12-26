<?php

/*
 * author cnbb.com.cn
 */
    class Product_test extends CI_Controller{
        public function __construct() {
            parent::__construct();
            $this->load->model('product_model','P_M');
        }
        
        public function index(){
            var_dump($this->P_M->show());
        }
        
        public function add(){
            $info = array('P_C_id'=>1,'P_name'=>'C1',
                'P_des'=>'叫我如何解释你？','P_index'=>1,'P_adder'=>'jeff');
            var_dump($this->P_M->add($info));
        }
        public function select(){
            var_dump($this->P_M->select_info(1));
        }
        public function product_show($C_id = NULL,$num = NULL){
            if(is_numeric($C_id) && is_numeric($num))
                fb($this->P_M->product_get($C_id,$num));
            else
                var_dump($this->P_M->product_get());
        }
        public function index_product($num = NULL){
            if(is_numeric($num)){
                fb($this->P_M->index_product($num));
            }
            else{
                fb($this->P_M->index_product());
            }
        }
        public function update_info($P_id = NULL){
            if(is_numeric($P_id)){
                $info = array('P_name'=>'经典法式蛋糕');
                var_dump($this->P_M->update_info($P_id,$info));
            }
        }
        public function update_sort($P_id = NULL,$P_sort = NULL){
            if(is_numeric($P_id) && is_numeric($P_sort)){
                var_dump($this->P_M->update_sort($P_id,$P_sort));
            }
        }
        public function delete($P_id){
            if(is_numeric($P_id)){
                var_dump($this->P_M->delete_info($P_id));
            }
        }
        public function get_nav($P_id){
            if(is_numeric($P_id)){
                fb($this->P_M->get_nav($P_id));
            }
        }
    }
?>
