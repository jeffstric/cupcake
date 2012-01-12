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
            if(is_array($info)&& isset($info['C_name']) && isset($info['C_adder']) ){
                if(!isset($info['C_addtime']))
                    $info['C_addtime'] = time();
                if(!isset($info['C_parent']))
                    $info['C_parent'] = 0;
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
         *  显示指定ID的信息
         * @param array $ids 
         * @return array
         */
        public function show_ids($ids){
            if(is_array($ids)){
                foreach($ids as $value)
                    $this->db->or_where('C_id',$value);
                return $this->show();
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
         * 获得所有分类的名称与ID
         **/
        public function name_id(){
            return $this->db->select('C_name,C_id')->get('category')->result();
        }
        
        public function id2name(){
            $result = $this->name_id();
            $return = array();
            foreach($result as $value){
                $return[$value->C_id]= $value->C_name;
            }
            unset ($result);
            return $return;
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
                if(isset($info['C_parent']) && !is_numeric($info['C_parent']))
                    unset($info['C_parent']);
                    
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
         * 删除多个ID的信息
         * @param array $ids
         * @return tint 
         */
        public function delete($ids){
            if(is_array($ids)){
                foreach($ids as $value){
                    if(is_numeric($value))
                        $this->db->or_where('C_id',$value);
                }
                $this->db->delete('category');
                return $this->db->affected_rows();
            }
        }
        /**
         * 获得导航信息
         */
        public function get_nav($C_id){
            if(is_numeric($C_id)){
                //还需筛选出URL和名称
                $result = $this->select_info($C_id);
                if(count($result)>0){
                    return  array(
                        'name'=>$result->C_name,
                        'url'=>site_url('cakes/category/'.$result->C_id)
                                 );
                }
                else
                    return FALSE;
            }
            else{
                fb('参数类型必须是是整数',FirePHP::TRACE);
                show_error('input parm illegal');
            }
        }
        
        public function get_all(){
            $show =$this->show();
            foreach($show as $value){
                $result[]=array(
                    'name'=>$value->C_name,
                     'url'=>  site_url('cakes/category/'.$value->C_id)
                );
            }
            return $result;
        }
        /**
         *  通过递归获得输入分类下的所有子分类
         * @param int $P_id
         * @param array $result 
         * @return $array $result 仅包含子分类ID
         */
        public function child_id($P_id,$result = NULL){
               
            if(!is_array($result))
                $result = array();
            
            $query = $this->db->select('C_id')->where('C_parent',$P_id)->get('category')->result();
            
            foreach ($query as  $value) {
                array_push($result,$value->C_id );
                $result = $this->child_id($value->C_id, $result);
            }
            return $result;
        }
        /**
         *  递归获得分类 
         * @param int $parent_id
         * @param array $treelist
         * @param array $floor 与show()返回类型相同 
         */
        public function get_menulist($parent_id,&$treelist,$floor = 0){
            if($treelist == NULL)
                $treelist = array();
            $result = $this->db->where('C_parent',$parent_id)->get('category')->result();
            foreach($result as $value){
                for($i = 0 ; $i < $floor ; $i++)
                    $value->C_name='　'.$value->C_name;
                
                array_push($treelist,$value);
                
                $this->get_menulist($value->C_id,$treelist,$floor+1);
            }
        }
        
    }
?>
