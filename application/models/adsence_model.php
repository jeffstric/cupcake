<?php

/*
 * author cnbb.com.cn
 */
    class Adsence_model extends CI_Model{
        public function __construct() {
            parent::__construct();
        }
        /**
         * 增加广告信息
         * @param type $info
         * @return integer 
         */
        public function add($info){
            if(is_array($info) && isset($info['A_name']) && isset($info['A_adder']) ){
                if(!isset($info['A_sort'])){
                    $max_sort =$this->db->select_max('A_sort')->get('adsence')->row()->A_sort;
                    fb('A_sort_max',$max_sort);
                    $info['A_sort']=$max_sort+1;
                }
                $info['A_addtime']=time();    
                $this->db->insert('adsence',$info);
                return $this->db->insert_id();
            }
            else{
                fb('参数错误，检查输入类型',FirePHP::TRACE);
                show_error('input parm illegal');
            }
        }
        /**
         * 获得指定ID的信息
         * @param integer $A_id
         * @return stdClass
         */
        public function select_info($A_id){
            if(is_numeric($A_id)){
                return $this->db->where('A_id',$A_id)->get('adsence')->row();
            }
            else{
                fb('参数错误，检查输入类型',FirePHP::TRACE);
                show_error('input parm illegal');
            }
        }
        /**
         * 获得所有广告信息
         * @return array
         */
        public function show(){
            return $this->db->get('adsence')->result();
        }
        /**
         * 修改指定ID的信息
         * @param integer $A_id
         * @param type $info
         * @return integer
         */
        public function update_info($A_id,$info){
            if(is_numeric($A_id) && is_array($info)){
                if(isset($info['A_adder']))
                    unset($info['A_adder']);
                if(isset($info['A_addtime']))
                    unset($info['A_addtime']);
                if(count($info)>0){
                    $this->db->where('A_id',$A_id)->update('adsence',$info);
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
         * @param integer $A_id
         * @return integer 
         */
        public function delete_info($A_id){
            if(is_numeric($A_id)){
                $this->db->where('A_id',$A_id)->delete('adsence');
                return $this->db->affected_rows();
            }
            else{
                fb('参数错误，检查输入类型',FirePHP::TRACE);
                show_error('input parm illegal');
            }
        }
        /**
         * 获得指定ID的广告信息
         * @param integer $A_id
         * @return array
         */
        public function get_adsence($A_id){
            if(is_numeric($A_id)){
                $info =$this->select_info($A_id);
                return array($info->A_img,$info->A_name);
            }
            else{
                fb('参数错误，检查输入类型',FirePHP::TRACE);
                show_error('input parm illegal');
            }
        }
    }
?>
