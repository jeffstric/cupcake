<?php

/*
 * author cnbb.com.cn
 */
    class Admin extends CI_Controller{
        public function __construct() {
            parent::__construct();
            $this->load->model('login_model','L_G');
            //验证登陆
            $this->check();
            $this->load->library( array('right_manage','session','form_validation')  );
            $this->load->helper('form');
            //注册权限信息
            $this->right_manage->init($this->U->U_right);
        }
        protected function check(){
            $result = $this->L_G->check_S();
            if($result == FALSE)
                header('Location:'.site_url ('login'));
            else
                $this->U = $result;
        }
        protected function right_check($N){
            if($this->right_manage->result_R()->$N)
                return TRUE;
            else
                show_error('抱歉，没有权限');
        }
        protected function right_change($N,$bool=NULL){
            if(!is_bool($bool))
                $bool = NULL;
            return $this->right_manage->update_R($N,$bool);
        }

        /**
         * 权限ID 0
         */
        public function user_manage(){
            $this->right_check(0);
            $this->load->model('user_model','U_M');
            $info['users'] = $this->U_M->show();
            $this->load->view('admin/user_manage',$info);
        }
        public function add_user(){
            $this->right_check(0);
            if($this->form_validation->run('add_user')==FALSE){
                $this->load->view('admin/add_user');
            }
            else{
                die('施工中，勿打扰');
                $info = array(
                  'U_name'=>$this->input->post('name'),
                  'U_pw'  =>$this->input->post('pw'),
                'U_right' =>'',
                 'U_adder'=>$this->U->U_name,
               'U_addtime'=>time()  
                             );
            }
        }
        /**
         * 权限ID 1
         */
        public function b(){
            
        }
        /***
         * 分类管理开始
         ***/
        /**
         *  权限 ID 3
         **/
        public function category_add(){
            if($this->form_validation->run('add_category')){
                $this->load->model('category_model','C_M');
                $info = array(
                    'C_name'=>$this->input->post('name'),
                    'C_des'=>$this->input->post('des'),
                    'C_addtime'=>time(),
                    'C_adder'=>$this->U->U_name
                );
                var_dump($this->C_M->add($info));
            }
            else{
                $info['destination'] = __FUNCTION__;
                $this->load->view('admin/add_category',$info);
            }
        }
        public function category_manage(){
            $this->load->model('category_model','C_M');
            $info['categories'] = $this->C_M->show();
            $this->load->view('admin/manage_category',$info);
        }
        public function category_action(){
            $action = $this->input->post('action');
            $CBvalue = $this->input->post('checkboxValue');
            if( in_array($action, array('delete','update')) && $CBvalue != FALSE && $CBvalue !=''){
                if($action == 'delete'){
                    $this->category_delete(explode(',', $CBvalue));
                }
                else{
                    $CBvalue = array_pop(explode(',',$CBvalue) );
                    if(is_numeric($CBvalue))
                       $this->category_update($CBvalue);
                    else{
                        fb('输入的ID非整数',  FirePHP::TRACE);
                        $this->error_show('错误','category_manage');
                    }
                }
            }
            else{
                $this->error_show('没有选择操作或者未选择分类','category_manage');
            }
        }
        protected function category_delete($ids){
            if(is_array($ids)){
                $this->load->model('category_model','L_M');
                $this->L_M->delete($ids);
                header('Location:'.site_url('admin/category_manage'));
            }
            else{
                fb('参数类型错误',  FirePHP::TRACE);
                show_error('输入类型错误');
            }
        }
        public function category_update($id){
            if(is_numeric($id)){
                $this->load->model('category_model','C_M');
                $C = $this->C_M->select_info($id);
                $info = array(
                 'destination'=>'category_update_process',
                    'name_pre'=>$C->C_name,
                    'des_pre' =>$C->C_des,
                    'C_id'    =>$C->C_id
                );
                $this->load->view('admin/add_category',$info);
            }
            else{
                fb('参数类型错误',  FirePHP::TRACE);
                show_error('输入类型错误');
            }
        }
        public function category_update_process(){
            $name = $this->input->post('name');
            $des = $this->input->post('des');
            $C_id = $this->input->post('C_id');
            if(is_numeric($C_id)){
                if(is_string($name) && $name != FALSE)
                    $info['C_name'] = $name;
                if(is_string($des) && $des != FALSE)
                    $info['C_des'] = $des;
                if(count(@$info)>0){
                    $this->load->model('category_model','C_M');
                    $this->C_M->update_info($C_id,$info);
                    header('Location:'.site_url('admin/category_manage'));
                }
                else
                    $this->error_show ('什么都没填啊，亲', 'category_update/'.$C_id);
            }
            else{
                fb('参数类型错误',  FirePHP::TRACE);
                show_error('输入类型错误');
            }
        }
        /***
         * 分类管理结束
         ***/
        /***
         * 商品管理开始
         ***/
        public function product_manage(){
            $cat_name = $this->get_category_name();
            $this->load->model('product_model','P_M');
            $products = $this->P_M->show();
            foreach($products as $value){
                $value->P_C_name = $cat_name[$value->P_C_id];
            }
            $info['products']= $products;
            $this->load->view('admin/manage_product',$info);
        }
        public function product_action(){
            $action = $this->input->post('action');
            $CBvalue = $this->input->post('checkboxValue');
            if( in_array($action, array('delete','update')) && $CBvalue != FALSE && $CBvalue !=''){
                if($action == 'delete'){
                    $this->product_delete(explode(',', $CBvalue));
                }
                else{
                    $CBvalue = array_pop(explode(',',$CBvalue) );
                    if(is_numeric($CBvalue))
                       $this->product_update($CBvalue);
                    else{
                        fb('输入的ID非整数',  FirePHP::TRACE);
                        $this->error_show('错误','category_manage');
                    }
                }
            }
            else{
                $this->error_show('没有选择操作或者未选择分类','category_manage');
            }
        }
        public function product_delete($ids){
            if(is_array($ids)){
                $this->load->model('product_model','P_M');
                $this->P_M->delete($ids);
                header('Location:'.site_url('admin/product_manage'));
            }
            else{
                fb('参数类型错误',  FirePHP::TRACE);
                show_error('输入类型错误');
            }
        }
        public function product_update($id){
            $cat = $this->get_category_name();
            $info = array(
                    'categories'=>$cat,
                   'destination'=>'product_update_process',
                    'P_id'      =>$id
                );
            $this->load->model('product_model','P_M');
            $product = $this->P_M->select_info($id);
            
            $this->load->model('product_model','P_M');
            $info['product'] =   $this->P_M->select_info($id);
            
            $cat_name = $cat;
            $info['product']->P_C_name = $cat_name[$info['product']->P_C_id];
            $this->load->view('admin/add_product',$info);
        }
        public function product_update_process(){
            $info = array();
            if($this->input->post('name'))
                $info['P_name']=$this->input->post('name');
            if($this->input->post('category'))
                $info['P_C_id']=$this->input->post('category');
            if($this->input->post('des'))
                $info['P_des']=$this->input->post('des');
            if($this->input->post('sort')&& is_numeric($this->input->post('sort')))
                $info['P_sort']=$this->input->post('sort');
            if($this->input->post('indexpage_change')!= 'nochange')
                $info['P_index']=$this->input->post('indexpage_change');
            
            $img = $this->img_upload('img');
            $tmb = $this->img_upload('tmb');
            if($img->result){
                if($img->upload !='default.jpg')
                    $info['P_img'] = $img->upload;
            }
            else{
                $this->error_show($img->upload, product_manage);
            }
            if($tmb->result){
                if($tmb->upload !='default.jpg')
                    $info['P_tmb'] = $tmb->upload;
            }
            else{
                $this->error_show($tmb->upload, product_manage);
            }
            
            $this->load->model('product_model','P_M');
            if(is_numeric($this->input->post('P_id')) ){
               $this->P_M->update_info($this->input->post('P_id'),$info);
               header('Location:'.site_url('admin/product_manage'));
            }
            else{
                fb('参数类型错误',  FirePHP::TRACE);
                show_error('输入类型错误');
            }
            fb($info);
            die();
        }
        public function product_add(){
               if($this->form_validation->run('add_product')){
                   
                   $img = $this->img_upload('img');
                   $tmb = $this->img_upload('tmb');
                   
                   //插入数据库
                   if($img->result && $tmb->result){
                      $this->load->model('product_model','P_M');
                      
                      if(!$this->input->post('sort')){
                        $sort = $this->P_M->max_id()+1;
                      }
                      else
                          $sort = $this->input->post('sort');
                      
                      if($this->input->post('indexpage')){
                          $index_page = 0;
                      }
                      else
                          $index_page = 1;
                      
                      if( is_numeric($this->input->post('category')) && is_string($this->input->post('name')) ){
                          $info = array(
                        'P_C_id'=>$this->input->post('category'),
                        'P_name'=>$this->input->post('name'),
                         'P_des'=>$this->input->post('des'),
                         'P_img'=>$img->upload,
                         'P_tmb'=>$tmb->upload,
                        'P_sort'=>$sort,
                       'P_index'=>$index_page,     
                       'P_adder'=>$this->U->U_name,    
                     'P_addtime'=>time()
                          );
                          
                         $this->P_M->add($info);  
                          
                       }
                       else{
                            fb('参数类型错误',  FirePHP::TRACE);
                            show_error('输入类型错误');
                       }
                      
                   }
                   else{
                       $errors = '';
                       if(!$img_boolen)
                           $errors .= $img->upload;
                       if(!$tmb_boolen)
                           $errors .= $tmb->upload;
                       $this->show_product_add($errors);
                   }
                }
                else
                    $this->show_product_add();
            
        }
        private function show_product_add($errors = NULL){
                $info = array(
                    'categories'=>$this->get_category_name(),
                   'destination'=>'product_add'
                );
                if(isset ($errors))
                    $info['errors'] = $errors;
                $this->load->view('admin/add_product',$info);
        }
        /**
         * 温柔地上传照片，如果你不填那么就返回默认值
         * @param string $name
         * @return stdClass 
         */
        private function img_upload($name){
                   $img_upload = '';
                   $img_boolen = FALSE;
                   if($_FILES[$name]['error'] == 0 ){
                       $img_upload = $this->upload_file($name);
                       if(is_array($img_upload) ){
                            $img_upload = $img_upload['file_name'];
                            $img_boolen = TRUE;
                       }
                       else{
                            $img_upload = '<br/>商品图片上传失败:'.$img_upload;
                       }
                   }
                   elseif($_FILES[$name]['error'] == 4){
                       $img_boolen = TRUE;
                       $img_upload = 'default.jpg';
                   }
                   else{
                       $img_upload = '<br/>商品图片上传服务器失败';
                   }
                   $result->result = $img_boolen;
                   $result->upload = $img_upload;
                   return $result;
        }
        
        /***
         * 商品管理结束
         ***/
        /**
         * 无权限
         **/
        public function error_show($error,$fun){
            echo '<b>'.$error.'</b><br/><a href="'.site_url('admin/'.$fun).'">返回</a>';
        }
        
        /***
         * 辅助函数
         ***/
        /**
         * 获得分类的名称与ID
         * @return array 
         */
        
        protected function get_category_name(){
            $this->load->model('category_model');
            return $this->category_model->id2name();
        }


        protected function upload_file($name){
            $config['upload_path'] = './upload/image/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size'] = '120';
            $config['max_width'] = '500';
            $config['max_height'] = '400';
            $config['file_name'] = time().rand(100, 999);
            $this->load->library('upload', $config);
            if($this->upload->do_upload($name))
                 return $this->upload->data();
            else
                 return $this->upload->display_errors('','');
        }
    }
?>
