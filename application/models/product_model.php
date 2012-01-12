<?php

/*
 * author cnbb.com.cn
 */
    class Product_model extends CI_Model{
        public function __construct() {
            parent::__construct();
        }
        /**
         * 增加商品信息
         */
        public function add($info){
            if(is_array($info) && isset($info['P_C_id']) && is_numeric($info['P_C_id'])
               && isset($info['P_name']) && isset($info['P_adder']) ){
                if(!isset($info['P_addtime']))
                    $info['P_addtime'] = time();
                if( isset($info['P_img']))
                    $info['P_img'] = trim($info['P_img']);
                if( isset($info['P_tmb']))
                    $info['P_tmb'] = trim($info['P_tmb']);
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
         *
         * @param int $C_id 分类ID，输入0获得所有分类
         * @param int $page 第几页 输入NULL获得所有page
         * @param string $order 排序方式 输入非sort可以按照ID排序
         * @return array 
         */
        public function product_get($C_id = 0,$page = NULL,$order='sort'){
            if(is_numeric($C_id) && $C_id > 0 ){
                $this->load->model('category_model','C_M');
                $child = $this->C_M->child_id($C_id);
                
                $this->db->or_where('P_C_id',$C_id);
                foreach($child as $value)
                    $this->db->or_where('P_C_id',$value);
            }
            if(is_numeric($page) && $page >0)
                $this->db->limit(9,($page-1)*9);
            if($order == 'sort')
                $this->db->order_by('P_sort','asc');
             return $this->output($this->show());
        }
        /**
         * 获得首页展示的商品信息
         */
        public function index_product($num=3){
            if(is_numeric($num)){
                $this->db->where('P_index',1)->limit($num);
                return $this->output($this->show());
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
        public function delete($ids){
            if(is_array($ids)){
                foreach($ids as $value){
                    if(is_numeric($value))
                        $this->db->or_where('P_id',$value);
                }
                $this->db->delete('product');
                return $this->db->affected_rows();
            }
        }
        /**
         * 
         */
        public function product_show($P_id){
            if(is_numeric($P_id)){
                $P = $this->select_info($P_id);
                return array(
                        'name'=>$P->P_name,
                        'url'=>site_url('cake_info/index/'.$P->P_id),
                        'img'=>$P->P_img,
                        'des'=>$P->P_des
                 );
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
                $this->load->model('Category_model','C_M');
                $product =$this->select_info($P_id);
                if(count($product)>0){
                    return array(
                        'product'=>array(
                            'name'=>$product->P_name,
                            'url'=>site_url('cake_info/index/'.$product->P_id)),
                        'category'=>$this->C_M->get_nav($product->P_C_id)
                                );
                }
                else
                    return FALSE;
            }
            else{
               fb('参数类型必须整数',FirePHP::TRACE);
               show_error('input parm illegal'); 
            }
        }
        /**
         * 获得产品的页数 9个产品一页 
         */
        public function page_num($P_C_id = 0){
            if(is_numeric($P_C_id) && $P_C_id > 0)
                $this->db->where('P_C_id',$P_C_id);
            return floor(($this->db->count_all_results('product')-1)/9)+1;
        }
        public function max_id(){
            return $this->db->select_max('P_id')->get('product')->row()->P_id;
        }
        /**
         *处理show()的输出
         */
        private function output($show){
                $this->load->helper('text_helper');
                foreach ($show as $value){
                    $result[] = array(
                       'name'=>$value->P_name,
                        'url'=>site_url('cake_info/index/'.$value->P_id),
                        'img'=>$value->P_img,
                        'tmb'=>$value->P_tmb,
                        'des'=>utf8Substr($value->P_des,0,32)//显示32个中文字
                    );
                }
                unset($show);
                if(isset ($result))
                    return $result;
                else
                    return NULL;
        }
        
    }
?>
