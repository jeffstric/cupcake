<?php

/*
 * author cnbb.com.cn
 */
    class Login_model extends CI_Model{
        public function __construct() {
            parent::__construct();
        }
        /**
         * 增加登录信息
         * @param array $info
         * @return integer 
         */
        public function add($info){
            if(is_array($info) && is_string($info['L_unique']) && is_string($info['L_S_id'])){
                $info['L_time'] = time();
                $this->db->insert('login',$info);
                return $info['L_U_id'];
            }
            else{
                fb('参数类型必须为数组',FirePHP::TRACE);
                show_error('input parm illegal');
            }
        }
        /**
         * 获得指定ID的信息
         * @param integer $L_U_id
         * @return object 
         */
        public function select_info($L_U_id){
            if(is_numeric($L_U_id)){
                return $this->db->where('L_U_id',$L_U_id)->get('login')->row();
            }
            else{
                fb('输入类型必须为整数',FirePHP::TRACE);
                show_error('input parm illegal');
            }
        }
        /**
         * 获得所有登录信息
         */
        public function show(){
            return $this->db->get('login')->result();
        }
        /**
         * 修改指定ID的信息
         * @param integer $L_U_id
         * @param array $info
         * @return array 
         */
        public function update_info($L_U_id,$info){
            if(is_numeric($L_U_id) && is_array($info)){
                $this->db->where('L_U_id',$L_U_id)->update('login',$info);
                return $this->db->affected_rows();
            }
            else{
                fb('参数一类型为整数，参数二为数组',FirePHP::TRACE);
                show_error('input parm illegal');
            }
        }
        /**
         * 删除指定ID的信息
         * @param integer $L_U_id
         * @return integer 
         */
        public function delete_info($L_U_id){
            if(is_numeric($L_U_id)){
                $this->db->where('L_U_id',$L_U_id)->delete('login');
                return $this->db->affected_rows();
            }
            else{
                fb('输入类型必须为整数',FirePHP::TRACE);
                show_error('input parm illegal');
            }
        }
        /**
         * 验证会话内的钥匙与login对应信息的钥匙是否相同
         * @param integer $L_U_id
         * @param string $key 
         */
        public function check_S($L_U_id,$key){
            if(is_numeric($L_U_id) && is_string($key)){
                if($key == $this->select_info($L_U_id)->L_unique)
                    return TRUE;
                else
                    return FALSE;
            }
            else{
                fb('参数一输入类型必须为整数，参数二为字符串',FirePHP::TRACE);
                show_error('input parm illegal');
            }
        }
        /**
         * 验证登录是否过期
         * @param integer $L_U_id
         * @return bool 
         */
        public function Check_time($L_U_id){
            if(is_numeric($L_U_id)){
                if(time()-($this->select_info($L_U_id)->L_time) > 1440)
                        return FALSE;
                else
                        return TRUE;
            }
            else{
                fb('输入类型必须为整数',FirePHP::TRACE);
                show_error('input parm illegal');
            }
        }

        /**
         * 刷新激活时间
         * @param integer $L_U_id 
         * @return integer
         */
        public function Refresh($L_U_id){
            if(is_numeric($L_U_id)){
                $info = array('L_time'=>time());
                return $this->update_info($L_U_id, $info);
            }
            else{
                fb('输入类型错误或内容缺失',FirePHP::TRACE);
                show_error('input parm illegal');
            }
        }
    }
?>
