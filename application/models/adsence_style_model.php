<?php

/*
 * author cnbb.com.cn
 */
    class Adsence_style_model extends CI_Model{
        private $adsence;
        public function __construct() {
            parent::__construct();
        }
        /**
         * 增加广告样式信息
         * @param array $info
         * @return integer 
         */
        public function add($info){
            if(is_array($info) && isset($info['A_id']) && isset($info['AS_adder'])){
                $info['AS_addtime']=time();
                $this->db->insert('adsence_style',$info);
                return $this->db->insert_id();
            }
            else{
                fb('参数错误，检查输入类型',FirePHP::TRACE);
                show_error('input parm illegal');
            }
        }
        /**
         * 获得指定ID的信息
         * @param integer $AS_id
         * @return stdClass
         */
        public function select_info($AS_id){
            if(is_numeric($AS_id)){
                return $this->db->where('AS_id',$AS_id)->get('adsence_style')->row();
            }
            else{
                fb('参数错误，检查输入类型',FirePHP::TRACE);
                show_error('input parm illegal');
            }
        }
        /**
         * 获得所有广告样式信息
         * @return array
         */
        public function show(){
            return $this->db->get('adsence_style')->result();
        }
        /**
         * 修改指定ID的信息
         * @param integer $AS_id
         * @param array $info
         * @return integer
         */
        public function update_info($AS_id,$info){
            if(is_numeric($AS_id) && is_array($info)){
                if(isset($info['AS_adder']))
                    unset($info['AS_adder']);
                if(isset($info['AS_addtime']))
                    unset($info['AS_addtime']);
                if(count($info)>0){
                    $this->db->where('AS_id',$AS_id)->update('adsence_style',$info);
                    return $this->db->affected_rows();
                }
                else
                    return 0;
            }
            else{
                fb('参数错误，检查输入类型',FirePHP::TRACE);
                show_error('input parm illegal');
            }
        }
        /**
         * 删除指定ID的信息
         * @param integer $AS_id
         * @return integer 
         */
        public function delete_info($AS_id){
            if(is_numeric($AS_id)){
                $this->db->where('AS_id',$AS_id)->delete('adsence_style');
                return $this->db->affected_rows();
            }
            else{
                fb('参数错误，检查输入类型',FirePHP::TRACE);
                show_error('input parm illegal');
            }
                
        }
        /**
         * 获得指定ID广告样式引用的广告信息
         * @param integer $AS_id
         * @return array 
         */
        public function get_adsence($AS_id){
            if(is_numeric($AS_id)){
                $this->load->model('adsence_model','A_M');
                $A_id =$this->select_info($AS_id)->A_id;
                return $this->A_M->get_adsence($A_id);
            }
        }
    }
?>
