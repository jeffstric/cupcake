<?php

/*
 * author cnbb.com.cn
 */
    class Product_model extends CI_Controller{
        public function __construct() {
            parent::__construct();
        }
        /**
         * 增加商品信息
         */
        public function add($info){
            if(is_array($info) && isset($info['P_C_id']) && is_numeric($info['P_C_id'])
               && isset($info['P_name']) && isset($info['P_adder']) ){
                $info['P_addtime'] = time();
                if(!isset ($info['P_sort']))
                    $info['P_sort'] =$this->db->select_max('P_sort')->get('product')->row()->P_sort+1;
                $this->db->insert('product',$info);
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
        public function select_info($P_id){
            if(is_numeric($P_id)){
                return $this->db->where('P_id',$P_id)->get('product')->row();
            }
            else{
                fb('参数类型必须整数',FirePHP::TRACE);
                show_error('input parm illegal');
            }
        }
        /**
         * 获得所有商品信息
         */
        public function show(){
            return $this->db->get('product')->result();
        }
        /**
         * 获得对应分类的N个商品信息
         */
        public function product_get($C_id = NULL,$num = NULL,$order='sort'){
            if(is_numeric($C_id))
                $this->db->where('P_C_id',$C_id);
            if(is_numeric($num))
                $this->db->limit($num);
            if($order == 'sort')
                $this->db->order_by('P_sort','asc');
            return $this->show();
        }
        /**
         * 获得首页展示的商品信息
         */
        public function index_product($num=3){
            if(is_numeric($num)){
                $this->db->where('P_index',1)->limit($num);
                return $this->show();
            }
            else{
               fb('参数类型必须整数',FirePHP::TRACE);
               show_error('input parm illegal'); 
            }
        }
        /**
         * 修改指定ID的信息
         */
        public function update_info($P_id,$info){
            if(is_numeric($P_id)){
                if(isset($info['P_adder']))
                    unset($info['P_adder']);
                if(isset($info['P_addtime']))
                    unset($info['P_addtime']);
                if(count($info)>0){
                    $this->db->where('P_id',$P_id)->update('product',$info);
                    return $this->db->affected_rows();
                }
                else {
                    return 0;
                }
            }
            else{
               fb('参数类型必须整数',FirePHP::TRACE);
               show_error('input parm illegal'); 
            }
        }
        /**
         * 修改指定ID的排序权重
         */
        public function update_sort($P_id,$sort){
            if(is_numeric($P_id) && is_numeric($sort)){
                $info = array('P_index'=>$sort);
                return $this->update_info($P_id, $info);
            }
            else{
               fb('参数一、参数二类型必须整数',FirePHP::TRACE);
               show_error('input parm illegal'); 
            }
        }
        /**
         * 删除指定ID的信息
         */
        public function delete_info($P_id){
            if(is_numeric($P_id)){
                $this->db->where('P_id',$P_id)->delete('product');
                return $this->db->affected_rows();
            }
            else{
               fb('参数类型必须整数',FirePHP::TRACE);
               show_error('input parm illegal'); 
            }
        }
        /**
         * 获得导航信息
         */
        public function get_nav($P_id){
            if(is_numeric($P_id)){
                $product =$this->select_info($P_id);
                $category = array_pop($this->db->where('C_id',$product->P_C_id)->get('category')->result());
                return array(
                    'product'=>array(
                        'name'=>$product->P_name,'url'=>site_url('product/'.$product->P_id)),
                    'category'=>array(
                        'name'=>$category->C_name,
                        'url'=>site_url('category/'.$category->C_id))
                            );
            }
            else{
               fb('参数类型必须整数',FirePHP::TRACE);
               show_error('input parm illegal'); 
            }
        }
        
    }
?>
