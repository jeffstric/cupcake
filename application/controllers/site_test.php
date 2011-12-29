<?php

/*
 * author cnbb.com.cn
 */
    class Site_test extends CI_Controller{
        public function __construct() {
            parent::__construct();
            $this->load->model('site_model','S_M');
        }
        
        public function index(){
            var_dump($this->S_M->show());
        }
        
        public function select($key){
            var_dump($this->S_M->select_info($key));
        }
        
        public function delete($key){
            var_dump($this->S_M->delete_info($key));
        }
        
        public function update($key){
            $info = array('S_value'=>'关于我们内容' );
            var_dump($this->S_M->update_info($key,$info));
        }
        
        public function add(){
            $info = array('S_key'=>'contact','S_value'=>'联系我们内容test');
            var_dump($this->S_M->add($info));
        }
        
        public function value($key){
            var_dump($this->S_M->value($key));
        }
    }
?>
