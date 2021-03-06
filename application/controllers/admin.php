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
        
        public function index(){
            $this->load_view();
        }
        
        public function pw_change(){
            $info = array();
            if($this->form_validation->run('chang_pw')){
                $this->load->model('user_model','U_M');
                $this->U_M->pw_change($this->U->U_id,$this->input->post('pw_new'));
                $info['errors'] = '密码修改成功';
            }
            $this->load->view('admin/change_pw',$info);
            
        }
        /***
         * 分类管理开始
         ***/
        public function category_add(){
            $info = array();
            if($this->form_validation->run('add_category')){
                $this->load->model('category_model','C_M');
                $info = array(
                    'C_name'=>$this->input->post('name'),
                     'C_des'=>$this->input->post('des'),
                 'C_addtime'=>time(),
                   'C_adder'=>$this->U->U_name
                );
                if( is_numeric($this->input->post('parent')) && $this->input->post('parent') > 0 )
                        $info['C_parent'] = $this->input->post('parent');
                $info['errors'] = '添加成功，插入ID为'.$this->C_M->add($info);
            }
            $info = $info + array(
                  'destination' => __FUNCTION__,
                    'categories'=>$this->get_category_name()
            );
            $this->load->view('admin/add_category',$info);
        }
        public function category_manage(){
            $info = array(
                'categories' => $this->category_tree(),
                         'C' =>$this->get_category_name(),
                'object'     => 'category'
                         );
            $this->load->view('admin/manage_category',$info);
        }
        public function category_delete($ids){
            if(is_numeric($ids) )
                $ids = array($ids);
            if(is_array($ids)){
                $this->load->model('category_model','C_M');
                $info = array(
                    'categories'=>$this->C_M->show_ids($ids),
                                 'C' =>$this->get_category_name()
                 );
                $this->load->view('admin/delete_category',$info);
            }
            else{
                fb('参数类型错误',  FirePHP::TRACE);
                show_error('输入类型错误');
            }
        }
        public function category_update($id){
            if(is_numeric($id)){
                $this->load->model('category_model','C_M');
                $info = array(
                 'destination'=>'category_update_process',
                    'category'=>$this->C_M->select_info($id),
                  'categories'=>$this->get_category_name()
                );
                $this->load->view('admin/add_category',$info);
            }
            else{
                fb('参数类型错误',  FirePHP::TRACE);
                show_error('输入类型错误');
            }
        }
        public function category_update_process(){
            $C_id = $this->input->post('C_id');
            if(is_numeric($C_id)){
                if($this->form_validation->run('add_category')){
                        $info = array();

                        if(is_string($name) && $name != FALSE)
                            $info['C_name'] = $this->input->post('name');
                        if(is_string($des) && $des != FALSE)
                            $info['C_des'] = $this->input->post('des');
                        if(is_numeric($this->input->post('parent') ) && $this->input->post('parent')!=$C_id )
                            $info['C_parent']=$this->input->post('parent');
                        
                        $this->load->model('category_model','C_M');
                        $this->C_M->update_info($C_id,$info);
                        header('Location:'.site_url('admin/category_manage'));
                }
                else
                    $this->product_manage ($C_id);
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
            $info = array(
                'products'=> $products,
                'object'  => 'product'
                    );
            $this->load->view('admin/manage_product',$info);
        }
        public function product_delete($ids){
            if(is_numeric($ids) )
                $ids = array($ids);
            if(is_array($ids)){
                $cat_name = $this->get_category_name();
                $this->load->model('product_model','P_M');
                $products=$this->P_M->show_ids($ids);
                foreach($products as $value){
                    $value->P_C_name = $cat_name[$value->P_C_id];
                }
                $info = array(
                      'products'=>$products
                 );
                $this->load->view('admin/delete_product',$info);
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
            $info['product'] =   $this->P_M->select_info($id);
            
            $info['product']->P_C_name = $cat[$info['product']->P_C_id];
            $this->load->view('admin/add_product',$info);
        }
        public function product_update_process(){
            $id = $this->input->post('P_id');
            if(is_numeric($id) ){
                 if($this->form_validation->run('add_product')){
                        $info = array();

                        $img = $this->img_upload('img');
                        $tmb = $this->img_upload('tmb');
                        if($img->result &&$tmb->result ){
                            if($img->upload !='default.jpg')
                                $info['P_img'] = $img->upload;
                            if($tmb->upload !='default.jpg')
                                $info['P_tmb'] = $tmb->upload;
                            
                            if($this->input->post('name')!=FALSE)
                                $info['P_name']=$this->input->post('name');
                            if($this->input->post('category'))
                                $info['P_C_id']=$this->input->post('category');
                            if($this->input->post('des')!=FALSE)
                                $info['P_des']=$this->input->post('des');
                            if($this->input->post('sort')!=FALSE && is_numeric($this->input->post('sort')))
                                $info['P_sort']=$this->input->post('sort');
                            if($this->input->post('indexpage')== 'on')
                                $info['P_index']=1;
                            else
                                $info['P_index']=0;

                           $this->load->model('product_model','P_M');
                           $this->P_M->update_info($id,$info);
                           header('Location:'.site_url('admin/product_manage'));
                        }
                        else{
                            if(!$img->result)
                                $this->error_show($img->upload, product_manage);
                            else
                                $this->error_show($tmb->upload, product_manage);
                        }
                 }
                 else
                     $this->product($id);
            }
            else{
                fb('参数类型错误',  FirePHP::TRACE);
                show_error('输入类型错误');
            }
            
        }
        public function product_add(){
               if($this->form_validation->run('add_product')){
                   
                   $img = $this->img_upload('img');
                   $tmb = $this->img_upload('tmb');
                   
                   //插入数据库
                   if($img->result && $tmb->result){
                      $this->load->model('product_model','P_M');
                      
                      if($this->input->post('sort') == FALSE){
                        $sort = $this->P_M->max_id()+1;
                      }
                      else
                          $sort = $this->input->post('sort');
                      
                      if($this->input->post('indexpage') == 'on'){
                          $index_page = 1;
                      }
                      else
                          $index_page = 0;
                      
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
                          
                         $this->show_product_add('插入成功，插入ID为:'.$this->P_M->add($info));  
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
        
        /***
         * 商品管理结束
         ***/
        /***
         * 广告管理开始
         ***/
        public function adsence_add(){
            if($this->form_validation->run('add_adsence')){
                $adsence_img = $this->img_upload('img','2.gif');
                if($adsence_img->result == FALSE)
                    $info = array('errors' => $adsence_img->upload);
                else{
                    $info['A_img'] = $adsence_img->upload;
                    $info['A_name'] = $this->input->post('name');
                    if($this->input->post('url')!=FALSE && is_string($this->input->post('url')) )
                            $info['A_url'] = $this->input->post('url');
                    if($this->input->post('sort')!=FALSE && is_numeric($this->input->post('sort')))
                            $info['A_sort'] = $this->input->post('sort');
                    if($this->input->post('start'))
                            $info['A_start'] = $this->input->post('start');
                    if($this->input->post('end'))
                            $info['A_end'] = $this->input->post('end');
                    if(is_numeric($this->input->post('style')) && $this->input->post('style')>0)
                            $info['AS_id'] = $this->input->post('style');
                    if(is_numeric($this->input->post('active')) && $this->input->post('active'))
                            $info['A_active'] = $this->input->post('active');
                    $info=array_merge($info,array(
                         'A_adder'=>$this->U->U_name,
                      'A_addtime'=>time()
                    ));
                    $this->load->model('adsence_model','A_M');
                    $insert_id = $this->A_M->add($info);
                    $info = array('errors' =>'插入成功，ID为'.$insert_id);
                }
            }
                $info['destination'] = __FUNCTION__;
                $info['styles']=$this->get_adsence_style_name();
                $this->load->view('admin/add_adsence',$info);
        }
        
        public function adsence_manage(){
            $this->load->model('adsence_model','A_M');
            $info = array(
                'adsences' => $this->A_M->show(),
                'object'   => 'adsence',
                'styles'   =>$this->get_adsence_style_name()
                    );
            $this->load->view('admin/manage_adsence',$info);
        }
        public function adsence_delete($ids){
            if(is_numeric($ids) )
                $ids = array($ids);
            if(is_array($ids)){
               $this->load->model('adsence_model','A_M');
               $info = array(
                'adsences' => $this->A_M->show_ids($ids),
                );
                $this->load->view('admin/delete_adsence',$info);
            }
            else{
                fb('参数类型错误',  FirePHP::TRACE);
                show_error('输入类型错误');
            }
        }
        public function adsence_update($id,$errors = NULL){
            $this->load->model('adsence_model','A_M');
            $info = array(
                'adsence' => $this->A_M->select_info($id),
                     'id'      => $id,
             'destination'=> 'adsence_upload_process',
                  'styles'   =>$this->get_adsence_style_name()
                        );
            if(is_string($errors))
                $info['errors'] = $errors;
            $this->load->view('admin/add_adsence',$info);
        }
        public function adsence_upload_process(){
            $id = $this->input->post('A_id');
            if( $id!= FALSE && is_numeric($id)){
                    if($this->form_validation->run('add_adsence')){
                            $adsence_img = $this->img_upload('img','2.gif');
                            if($adsence_img->result){
                                    $info = array();
                                    if($adsence_img->upload != '2.gif')
                                        $info['A_img']=$adsence_img->upload;
                                    if($this->input->post('name')!=FALSE && is_string($this->input->post('name')))
                                        $info['A_name'] = $this->input->post('name');
                                    if($this->input->post('url')!=FALSE && is_string($this->input->post('url')))
                                        $info['A_url'] = $this->input->post('url');
                                    if($this->input->post('end')!=FALSE )
                                        $info['A_end'] = $this->input->post('end');
                                    if($this->input->post('start')!=FALSE)
                                        $info['A_start'] = $this->input->post('start');
                                    if($this->input->post('style')!=FALSE)
                                        $info['AS_id'] = $this->input->post('style');
                                    if(is_numeric($this->input->post('active')))
                                            $info['A_active'] = $this->input->post('active');
                                    if($this->input->post('sort')!= FALSE && is_numeric($this->input->post('sort')))
                                        $info['A_sort'] = $this->input->post('sort');
                                    
                                    if(count($info)>0){
                                        $this->load->model('adsence_model','A_M');
                                        $this->A_M->update_info($id,$info);
                                     }
                                     header('Location:'.site_url('admin/adsence_manage'));
                            }
                            else{
                                 $this->adsence_update($id, $adsence_img->upload);
                            }
                    }
                    else {
                            $this->adsence_update($id);
                    }
            }
            else{
                fb('参数类型错误',  FirePHP::TRACE);
                show_error('输入类型错误');
            }
        }
        /***
         * 广告管理结束
         ***/
        
        /***
         * 广告位管理开始
         ***/
        public function adsence_style_manage(){
            $this->load->model('adsence_style_model','AS_M');
            
            $num = $this->AS_M->count();
            $img = array();
            for($i = 0 ; $i < $num ; $i++){
                $img[]=($i+1);
            }
            
            $info = array(
                'styles' => $this->AS_M->show(),
                'object' => 'adsence_style'
            );
            $this->load->view('admin/manage_adsence_style',$info);
        }
        public function adsence_style_update($id,$errors = NULL){
            $this->load->model('adsence_style_model','AS_M');
            $info = array(
                  'style' => $this->AS_M->select_info($id),
                     'id' => $id,
             'destination'=> 'adsence_style_upload_process'
                        );
            if(is_string($errors))
                $info['errors'] = $errors;
            $this->load->view('admin/add_adsence_style',$info);
        }
        public function adsence_style_upload_process(){
            $id = $this->input->post('id');
            if( $id && is_numeric($id)){ 
                    if($this->form_validation->run('add_adsence_style')){
                           $info = array();
                           if($this->input->post('name')){
                               $info['AS_name'] = $this->input->post('name');
                           }
                           if($this->input->post('des')){
                               $info['AS_des']=$this->input->post('des');
                           }
                           if($this->input->post('keyname')){
                               $info['AS_keyname']=$this->input->post('keyname');
                           }
                           if($this->input->post('keyname')){
                               $info['AS_keyname']=$this->input->post('keyname');
                           }
                           if(count($info)>0){
                               $this->load->model('adsence_style_model','AS_M');
                               $this->AS_M->update_info($id,$info);
                               header('Location:'.site_url('admin/adsence_style_manage'));
                           }
                    }
                    else{
                          $this->adsence_style_update($id);
                    }
            }
            else{
                       fb('输入的ID非整数',  FirePHP::TRACE);
                       $this->error_show('错误',$object.'_manage');
            }
            
        }
        public function adsence_style_add(){
            $info = array();
            if($this->form_validation->run('add_adsence_style')){
                $this->load->model('adsence_style_model','AS_M');
                $insert = array(
                    'AS_name' => $this->input->post('name'),
                      'AS_des'  => $this->input->post('des'),
              'AS_keyname'  => $this->input->post('keyname'),
           'AS_default_num'=> $this->input->post('default_num')?$this->input->post('default_num'):1,        
                     'AS_adder'=> $this->U->U_name
                );
                $insert_id = $this->AS_M->add($insert);
                $info = array('errors' =>'插入成功，ID为'.$insert_id);
            }
            $this->load->model('adsence_model','A_M');
                $info = array_merge($info,array(
                    'adsences' => $this->A_M->show(),
                  'destination'=> __FUNCTION__
             ));
            $this->load->view('admin/add_adsence_style',$info);
        }
        public function adsence_style_delete($ids){
            $this->process_delete('adsence_style', $ids);
        }
        /***
         * 广告管理结束
         ***/
        
        /***
         * 公共函数开始
         ***/
        public function error_show($error,$fun){
            header('Content-type:text/html;charset=UTF-8');
            echo '<b>'.$error.'</b><br/><a href="'.site_url('admin/'.$fun).'">返回</a>';
        }
        public function action(){
            $object = $this->input->post('object');
            $action = $this->input->post('action');
            $CBvalue = $this->input->post('checkboxValue');
            if( in_array($action, array('delete','update')) && $CBvalue != FALSE && $CBvalue !=''){
                if($action == 'delete'){
                    $this->{$object.'_delete'}(explode(',', $CBvalue));
                }
                else{
                    $CBvalue = array_pop(explode(',',$CBvalue) );
                    if(is_numeric($CBvalue))
                       $this->{$object.'_update'}($CBvalue);
                    else{
                        fb('输入的ID非整数',  FirePHP::TRACE);
                        $this->error_show('错误',$object.'_manage');
                    }
                }
            }
            else{
                $this->error_show('没有选择操作或者未选择分类',$object.'_manage');
            }
        }
         public function process_delete(){
            if(@$object == NULL && @$ids == NULL){
                $object = $this->input->post('object');
                $ids = $this->input->post('checkboxValue');
            }
            if(is_string($object)&&  in_array($object, array('product','category','adsence','adsence_style') )){
                if($ids !=FALSE && is_string($ids)){
                    $ids = explode(',',$ids);
                    $model = $object.'_model';
                    $this->load->model($model,'M');
                    if($this->M->delete($ids,$error_db)){
                        header('Location:'.site_url('admin/'.$object.'_manage'));
                    }
                    else{
                        $this->error_show($error_db,$object.'_manage');die();
                    }
                }
            }
            fb('参数错误',  FirePHP::TRACE);
            $this->error_show('错误',$object.'_manage');
        }
         /***
         * 公共函数结束
         ***/
        
        /***
         * 辅助函数开始
         ***/
        
        /**
         * 获得分类的名称与ID
         * @return array 
         */
        protected function get_category_name(){
            $this->load->model('category_model');
            $result = $this->category_model->id2name();
            return $result;
        }
        protected  function get_adsence_style_name(){
            $this->load->model('adsence_style_model','AS_M');
            $result = $this->AS_M->id2name();
            return $result;
        }
        protected function category_tree(){
             $this->load->model('category_model','C_M');
             $this->C_M->get_menulist(0,$treelist);
             
             return $treelist;
        }

                /**
         * 温柔地上传照片，如果你不填那么就返回默认值
         * @param string $name 表单中<input>的name
         * @param string $default 设置的默认值
         * @return stdClass 
         */
        private function img_upload($name,$default = NULL){
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
                   /*尼马，不传文件*/
                   elseif($_FILES[$name]['error'] == 4){
                       $img_boolen = TRUE;
                       if($default == NULL)
                            $img_upload = 'default.jpg';
                       else 
                            $img_upload = $default;
                   }
                   else{
                       $img_upload = '<br/>商品图片上传服务器失败';
                   }
                   $result->result = $img_boolen;
                   $result->upload = $img_upload;
                   return $result;
        }


        protected function upload_file($name){
            $config['upload_path'] = './upload/image/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size'] = '120';
            $config['file_name'] = time().rand(100, 999);
            $this->load->library('upload', $config);
            if($this->upload->do_upload($name))
                 return $this->upload->data();
            else
                 return $this->upload->display_errors('','');
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
        public function namepw_check($pw){
            $this->load->model('user_model');
            if($this->user_model->name_pw_check($this->U->U_name,$pw))
                return TRUE;
            else{
                $this->form_validation->set_message('namepw_check', '密码错误');
                return FALSE;
            }
        }
        
        /***
         * 辅助函数结束
         ***/
        
        /***
         * 视图函数开始
         ***/
         public function hello(){
             $this->load->view('admin/hello');
         }
         public function V_header(){
             $info['user'] = $this->U->U_name;
             $this->load->view('admin/header',$info);
         }
         public function V_left(){
             $this->load->view('admin/left');
         }
         public function V_right($which = NULL){
             $info = array();
             if($which !=NULL)
                $info['which'] = $which;
             $this->load->view('admin/right',$info);
         }
         public function V_menu(){
             $this->load->view('admin/menu');
         }
         public function V_footer(){
             $this->load->view('admin/footer');
         }
         public function load_view($which = NULL){
             $this->V_header();
             $this->V_left();
             $this->V_right($which);
             $this->V_footer();
         }
        /***
         * 视图函数结束
         ***/
    }
?>
