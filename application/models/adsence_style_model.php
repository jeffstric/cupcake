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
        
        public function get_adsence($info){
            $result = NULL;
            foreach($info as $key=>$value){
                if( is_numeric($value) ){
                    $this->load->model('adsence_model','A_M');
                    $A_info =  @$this->select_info($value)->A_id;
                    if($A_info !=NULL){
                        $A_id =explode(',',$A_info);
                        foreach($A_id as $V ){
                             $this->db->or_where('A_id',$V);
                        }
                        $R = $this->db->select('A_id as id,A_img as img,A_name as name,A_url as url')
                                  ->order_by('A_sort')->get('adsence')
                                  ->result_array();
                        
                        $result->$key = $R;
                    }
                }
            }
            return $result;
        }
        
    }
?>
