<?php

/*
 * author cnbb.com.cn
 */
    class Category_model extends CI_Model{
        public function __construct() {
            parent::__construct();
        }
        
        /**
         * 增加分类信息
         */
        public function add($info){
            if(is_array($info)&& isset($info['C_name']) && isset($info['C_url']) && isset($info['C_adder']) ){
                $info['C_addtime'] = time();
                $this->db->insert('category',$info);
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
        public function select_info($C_id){
            if(is_numeric($C_id)){
                return $this->db->where('C_id',$C_id)->get('category')->row();
            }
            else{
                fb('输入类型必须是数组',FirePHP::TRACE);
                show_error('input parm illegal');
            }
        }
        /**
         * 获得所有分类信息
         */
        public function show(){
            return $this->db->get('category')->result();
        }
        /**
         * 修改指定ID的信息
         */
        public function update_info($C_id,$info){
            if(is_array($info)&&  is_numeric($C_id)){
                if(isset($info['C_adder']))
                    unset($info['C_adder']);
                if(isset($info['C_addtime']))
                    unset($info['C_addtime']);
                if(count($info)>0){
                    $this->db->where('C_id',$C_id)->update('category',$info);
                    return $this->db->affected_rows();
                }
                else
                    return 0;
            }
            else{
                fb('参数一类型必须是数组,参数二类型必须是整数',FirePHP::TRACE);
                show_error('input parm illegal');
            }
        }
        /**
         * 删除指定ID的信息
         */
        public function delete_info($C_id){
            if(is_numeric($C_id)){
                $this->db->where('C_id',$C_id)->delete('category');
                return $this->db->affected_rows();
            }
            else{
                fb('参数类型必须是是整数',FirePHP::TRACE);
                show_error('input parm illegal');
            }
        }
        /**
         * 获得导航信息
         */
        public function get_nav($C_id){
            if(is_numeric($C_id)){
                //还需筛选出URL和名称
                $result = $this->select_info($C_id);
                return  array('name'=>$result->C_name,'url'=>  site_url('category/'.$result->C_id));
            }
            else{
                fb('参数类型必须是是整数',FirePHP::TRACE);
                show_error('input parm illegal');
            }
        }
    }
?>
