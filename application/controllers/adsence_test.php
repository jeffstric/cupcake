<?php

/*
 * author cnbb.com.cn
 */
    class Adsence_test extends CI_Controller{
        public function __construct() {
            parent::__construct();
            $this->load->model('adsence_model','A_M');
        }
        
        public function index(){
            var_dump($this->A_M->show());
        }
        public function add(){
            $info = array('A_name'=>'全局广告一','A_adder'=>'jeff','A_img'=>'4.gif');
            var_dump($this->A_M->add($info));
        }
        public function select($A_id){
            var_dump($this->A_M->select_info($A_id));
        }
        public function update($A_id){
            $info = array('A_adder'=>'jeffstric','A_name'=>'cupcake蛋糕广告');
            var_dump($this->A_M->update_info($A_id,$info));
        }
        public function delete($A_id){
            var_dump($this->A_M->delete_info($A_id));
        }
        public function get_adsence($A_id){
            var_dump($this->A_M->get_adsence($A_id));
        }
        
    }
?>
