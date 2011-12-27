<?php

/*
 * author cnbb.com.cn
 */
    class  User_test extends CI_Controller{
        public function __construct() {
            parent::__construct();
            $this->load->model('user_model','U_M');
        }
        
        public function index(){
            var_dump($this->U_M->show());
        }
        
        public function add(){
            $info = array('U_name'=>'jeffstric','U_pw'=>'jeff_pw',
                'U_right'=>63,'U_adder'=>'system');
            var_dump($this->U_M->add($info));
        }
        
        public function select($U_id){
            var_dump($this->U_M->select_info($U_id));
        }
        
        public function update($U_id){
            $info = array('U_name'=>'jeff','U_pw'=>'jeff_pw',
                'U_right'=>63,'U_adder'=>'system');
            var_dump($this->U_M->update_info($U_id,$info));
        }
        
        public function check($U_id){
            $name = 'jeff';
            $pw = 'jeff_pw';
            var_dump($this->U_M->name_pw_check($name,$pw));
        }
        public function change($U_id,$pw){
            var_dump($this->U_M->pw_change($U_id,$pw));
        }
        
        public function delete($U_id){
            var_dump($this->U_M->delete_info($U_id));
        }
    }
?>
