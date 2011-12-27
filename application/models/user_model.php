<?php

/*
 * author cnbb.com.cn
 */
    class User_model extends CI_Model{
        public function __construct() {
            parent::__construct();
        }
        /**
         * 增加用户信息
         */
        public function add($info){
            if(is_array($info) && isset($info['U_name']) && isset($info['U_pw'])
             && isset($info['U_right']) && isset($info['U_adder']) ){
                
                $info['U_pw']=$this->encrypt_pw($info['U_pw']);
                $info['U_addtime']=time();
                $this->db->insert('user',$info);
                return $this->db->insert_id();
            }
            else{
                fb('输入类型错误或内容缺失',FirePHP::TRACE);
                show_error('input parm illegal');
            }
        }
        /**
         * 获得指定ID的信息
         */
        public function select_info($U_id){
            if(is_numeric($U_id)){
                return $this->db->where('U_id',$U_id)->get('user')->row();
            }
            else{
                fb('输入类型必须是整数',FirePHP::TRACE);
                show_error('input parm illegal');
            }
        }
        /**
         * 获得所有用户信息
         */
        public function show(){
            return $this->db->get('user')->result();
        }
        /**
         * 修改指定ID的信息
         */
        public function update_info($U_id,$info){
            if(is_numeric($U_id) && is_array($info)){
                if(isset($info['U_pw']))
                    $info['U_pw']=$this->encrypt_pw($info['U_pw']);
                if(isset ($info['U_name']))
                    unset ($info['U_name']);
                
                $this->db->where('U_id',$U_id)->update('user',$info);
                return $this->db->affected_rows();
            }
            else{
                fb('参数一输入类型必须是整数，参数二输入类型必须是数组',FirePHP::TRACE);
                show_error('input parm illegal');
            }
        }
        /**
         * 删除指定ID的信息
         */
        public function delete_info($U_id){
            if(is_numeric($U_id)){
                $this->db->where('U_id',$U_id)->delete('user');
                return $this->db->affected_rows();
            }
            else{
                fb('输入类型必须是整数',FirePHP::TRACE);
                show_error('input parm illegal');
            }
        }
        /**
         * 验证用户名与密码
         */
        public function name_pw_check($name,$pw){
            if(is_string($name) && is_string($pw)){
                if($this->encrypt_pw($pw) == $this->db->select('U_pw')
                        ->where('U_name',$name)->get('user')->row()->U_pw)
                    return TRUE;
                else
                    return FALSE;
            }
            else{
                fb('参数一,参数二输入类型必须是字符串',FirePHP::TRACE);
                show_error('input parm illegal');
            }
        }
        /**
         * 修改密码
         */
        public function pw_change($U_id,$pw){
            if(is_numeric($U_id) && is_string($pw)){
                $info = array('U_pw'=>  $this->encrypt_pw($pw));
                $this->db->where('U_id',$U_id)->update('user',$info);
                return $this->db->affected_rows();
            }
            else{
                fb('参数一输入类型必须是整数，参数二为字符串',FirePHP::TRACE);
                show_error('input parm illegal');
            }
        }
        
        private function encrypt_pw($pw){
            return md5($pw);
        }
    }
?>
