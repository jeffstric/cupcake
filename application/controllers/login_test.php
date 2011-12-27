<?php

/*
 * author cnbb.com.cn
 */
    class Login_test extends CI_Controller{
        public function __construct() {
            parent::__construct();
            $this->load->model('login_model','L_M');
        }
        
        public function add(){
            $info = array('L_U_id'=>3,'L_S_id'=>'dsgffief38fdskf3','L_unique'=>'sssss');
            var_dump($this->L_M->add($info));
        }
        
        public function select($L_id){
            var_dump($this->L_M->select_info($L_id));
        }
        
        public function index(){
            var_dump($this->L_M->show());
        }
        
        public function update($L_id){
            $info = array('L_U_id'=>3,'L_S_id'=>'aaaaaaaaaaa','L_unique'=>'sdfsd');
            var_dump($this->L_M->update_info($L_id,$info));
        }
        
        public function delete($L_id){
            var_dump($this->L_M->delete_info($L_id));
        }
        
        public function check_S($L_id,$L_unique){
            var_dump($this->L_M->check_S($L_id,$L_unique));
        }
        
        public function check_time($L_id){
            var_dump($this->L_M->check_time($L_id));
        }
        
        public function refresh($L_id){
            var_dump($this->L_M->refresh($L_id));
        }
    }
?>
