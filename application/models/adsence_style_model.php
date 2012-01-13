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
            if(is_array($info) && isset($info['AS_adder'])){
                
                if(!isset($info['AS_addtime']))
                    $info['AS_addtime']=time();
                if(!isset($info['AS_default_num']) || $info['AS_default_num']<1)
                    $info['AS_default_num'] = 1;
                
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
         *  显示指定ID的信息
         * @param array $ids 
         * @return array
         */
        public function show_ids($ids){
            if(is_array($ids)){
                foreach($ids as $value)
                    $this->db->or_where('AS_id',$value);
                return $this->show();
            }
            else{
                fb('输入类型必须是数组',FirePHP::TRACE);
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
        public function delete($ids){
            if(is_array($ids)){
                foreach($ids as $value){
                    $this->db->or_where('AS_id',$value);
                }
                $this->db->delete('adsence_style');
                return $this->db->affected_rows();
            }
            else{
                fb('参数错误，检查输入类型',FirePHP::TRACE);
                show_error('input parm illegal');
            }
        }
        protected function get_adsence_style($key){
            $row = $this->db->select('AS_id as id,AS_default_num as num')->where('AS_keyname',$key)->get('adsence_style')->row();
             return $row;
        }
        public function get_adsence($key){
            $row = $this->get_adsence_style($key);
            $AS_id = $row->id;
            $limit = $row->num;
            return  $this->db->select('A_name as name,A_img as img,A_url as url')->where('AS_id',$AS_id)->where('A_active',1)
                        ->where('A_start <',date('Y:m:d H:i:s',time())) 
                        ->where('A_end >',date('Y:m:d H:i:s',time()))
                        ->group_by('A_sort')->limit($limit)
                        ->get('adsence')->result();
                    
        }
        public function count_adsence($key){
            $row = $this->get_adsence_style($key);
            return $row->num;
        }
        public function name_id(){
            return $this->db->select('AS_name,AS_id')->get('adsence_style')->result();
        }
        
        public function id2name(){
            $result = $this->name_id();
            $return = array();
            foreach($result as $value){
                $return[$value->AS_id]= $value->AS_name;
            }
            unset ($result);
            return $return;
        }
        public function count(){
            return $this->db->count_all('adsence_style');
        }
        
    }
?>
