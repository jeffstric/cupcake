<?php

/*
 * author cnbb.com.cn
 */

    class Adsence_style_test extends CI_controller{
        public function __construct() {
            parent::__construct();
            $this->load->model('adsence_style_model','AS_M');
        }
        
        public function index(){
            var_dump($this->AS_M->show());
        }
        
        public function add(){
            $info = array('A_id'=>1,'AS_name'=>'首页广告位二','AS_adder'=>'jeff');
            var_dump($this->AS_M->add($info));
        }
        public function select($AS_id){
            var_dump($this->AS_M->select_info($AS_id));
        }
        public function update($AS_id){
            $info = array('AS_des'=>'传说中地广告位','AS_adder'=>'jeffstric');
            var_dump($this->AS_M->update_info($AS_id,$info));
        }
        public function delete($AS_id){
            var_dump($this->AS_M->delete_info($AS_id));
        }
        public function get_adsence($AS_id){
            var_dump($this->AS_M->get_adsence($AS_id));
        }
    }
?>
