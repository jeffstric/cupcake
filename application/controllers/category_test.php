<?php

/*
 * author cnbb.com.cn
 */
    class Category_test extends CI_Controller{
        public function __construct() {
            parent::__construct();
            $this->load->model('category_model','C_M');
        }
        
        public function add(){
            $info = array('C_name'=>'杯形蛋糕','C_url'=>site_url('category/1'),
                'C_des'=>'正如其名','C_adder'=>'jeff');
            var_dump($this->C_M->add($info));
        }
        
        public function index(){
            var_dump($this->C_M->show());
        }
        
        public function select($C_id = NULL){
            if($C_id != NULL)
                var_dump($this->C_M->select_info($C_id));
        }
        
        public function update(){
            var_dump($this->C_M->update_info(2,array('C_name'=>'被新蛋糕','C_url'=>site_url('category/test'))));
        }
        public function delete(){
            var_dump($this->C_M->delete_info(2));
        }
        public function get_nav($C_id){
            if($C_id !=NULL)
                var_dump($this->C_M->get_nav($C_id));
        }
        public function get_all(){
            var_dump($this->C_M->get_all());
        }
    }
?>
