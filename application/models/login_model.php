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
        public function select_byS($L_S_id){
            if(is_string($L_S_id)){
                return $this->db->where('L_S_id',$L_S_id)->get('login')->row();
            }
            else{
                fb('输入类型必须为字符形',FirePHP::TRACE);
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
         * 登陆系统
         * @param int $L_U_id
         * @return string 
         */
        public function login($L_U_id){
            //删除数据
            $this->delete_info($L_U_id);
            //生成钥匙    
            $unique_key = uniqid(rand(0, 999),true);
            //将钥匙存入会话
            $this->session->set_userdata(array('unique'=>$unique_key));
            
            $info = array(
                    'L_U_id'=>$L_U_id,
                    'L_S_id'=>$this->session->userdata('session_id'),
                  'L_unique'=>$unique_key,
                    'L_time'=>time()
                );
            //将信息存入login表
            $this->add($info);
            
            return date('Y-m-d H:i:s',(time()+$this->config->config['sess_expiration']) );
        }
        /**
         * 注销登陆
         * @return int 
         */
        public function sign_out(){
            $this->load->library('session');
            $L_U_id = @$this->select_byS($this->session->userdata('session_id'))->L_U_id;
            //删除CI会话中的数据
            $this->session->sess_destroy();
            //删除login表中的数据
            if($L_U_id != FALSE)    
                return $this->delete_info($L_U_id);
            return 0;
        }
        /**
         * 验证会话内的钥匙与login对应信息的钥匙是否相同
         * @param integer $L_U_id
         * @param string $key 
         */
        public function check_S(){
            $this->load->library('session');
            $L_S_id = $this->session->userdata('session_id');
            $key = $this->session->userdata('unique');
            if( is_string($key) ){
                if($key == $this->select_byS($L_S_id)->L_unique)
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
                //登陆过期时间与配置文件中会话过期时间一致
                if(time()-($this->select_info($L_U_id)->L_time) > 
                    $this->config->config['sess_expiration']      
                  )
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
