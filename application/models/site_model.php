<?php

/*
 * author cnbb.com.cn
 */
    class Site_model extends CI_Model{
        public function __construct() {
            parent::__construct();
        }
        
        /**
         *
         * @param array $info
         * @return string 
         */
        public function add($info){
            if(is_array($info)){
                $this->db->insert('site',$info);
                return $info['S_key'];
            }
            else{
                fb('参数错误',FirePHP::TRACE);
                show_error('input parm illegal');
            }
        }
        /**
         *
         * @param string $key
         * @return Stdclass 
         */
        public function select_info($key){
            if(is_string($key)){
                return $this->db->where('S_key',$key)->get('site')->row();
            }
            else{
                fb('参数错误',FirePHP::TRACE);
                show_error('input parm illegal');
            }
        }
        /**
         *
         * @return array 
         */
        public function show(){
            return $this->db->get('site')->result();
        }
        
        /**
         *
         * @param string $key
         * @param array $info
         * @return int 
         */
        public function update_info($key,$info){
            if(is_string($key) && is_array($info)){
                $this->db->where('S_key',$key)->update('site',$info);
                return $this->db->affected_rows();
            }
            else{
                fb('参数错误',FirePHP::TRACE);
                show_error('input parm illegal');
            }
        }
        
        /**
         *
         * @param string $key
         * @return int 
         */
        public function delete_info($key){
            if(is_string($key)){
                $this->db->where('S_key',$key)->delete('site');
                return $this->db->affected_rows();
            }
            else{
                fb('参数错误',FirePHP::TRACE);
                show_error('input parm illegal');
            }
                
        }
        /**
         *
         * @param string $key
         * @return string 
         */
        public function value($key){
            if(is_string($key)){
                $row = $this->select_info($key);
                return $row->S_value;
            }
            else{
                fb('参数错误',FirePHP::TRACE);
                show_error('input parm illegal');
            }
        }
    }
?>
