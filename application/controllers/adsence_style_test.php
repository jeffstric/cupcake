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
            $info = array('A_id'=>1,'AS_name'=>'全局广告位三','AS_adder'=>'jeff');
            var_dump($this->AS_M->add($info));
        }
        public function select($AS_id){
            var_dump($this->AS_M->select_info($AS_id));
        }
        public function update($AS_id){
            $info = array('AS_des'=>'全局广告位','A_id'=>'4,5,6');
            var_dump($this->AS_M->update_info($AS_id,$info));
        }
        public function delete($AS_id){
            var_dump($this->AS_M->delete_info($AS_id));
        }
        public function get_adsence(){
            var_dump($this->AS_M->get_adsence(array('a'=>1,'b'=>2) ));
        }
    }
?>
