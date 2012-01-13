<?php
    $config = array(
       'login'=> array( 
                      array(
                             'field'   => 'name',
                             'label'   => '用户名',
                             'rules'   => 'required|trim|min_length(2)|callback_namepw_check'
                          ),
                       array(
                             'field'   => 'pw',
                             'label'   => '密码',
                             'rules'   => 'required|min_length(7)'
                          ),
                       array(
                             'field'   => 'check_code',
                             'label'   => '验证码',
                             'rules'   => 'required|min_length(4)|callback_checkcode_check'
                          )
                       ),
     'add_user'=>array(
                       array(
                                'field' => 'name',
                                'label' => '用户名',
                                'rules' => 'required|trim|min_length(2)|alpha_numeric'
                            ),
                       array(
                                'field' => 'pw',
                                'label' => '密码',
                                'rules' => 'required|minlength(7)'
                            ),
                       array(
                                'field' =>'pw_submit',
                                'label' =>'密码确认',
                                'rules' =>'required|matches(pw)'
                            )
                       ),
  'add_category'=>array(
                       array(
                                'field' =>'name',
                                'label' =>'分类名',
                                'rules' =>'required|trim|min_length(1)'
                            ), 
                       array(
                                'field' =>'des',
                                'label' =>'分类描述',
                                'rules' =>''
                            )
                        ),
   'add_product'=>array(
                        array(
                                'field' =>'name',
                                'label' =>'商品名',
                                'rules' =>'required|trim|min_length(1)'
                            ), 
                        array(
                                'field' =>'category',
                                'label' =>'分类',
                                'rules' =>'required|numeric'
                            )
                        ),
   'add_adsence'=>array(
                        array(
                                'field' =>'name',
                                'label' =>'广告名称',
                                'rules' =>'required|trim|min_length(1)'
                            )
                       ),
'add_adsence_style'=>array(
                        array(
                                'field' =>'name',
                                'label' =>'广告位名称',
                                'rules' =>'required|trim|min_length(1)'
                            ), 
                        array(
                                'field' =>'keyname',
                                'label' =>'广告位索引',
                                'rules' =>'required|min_length(1)|alpha_numeric'
                            ), 
                        array(
                                'field' =>'des',
                                'label' =>'广告位描述',
                                'rules' =>'trim'
                            ),
                        array(
                                'field' =>'active',
                                'label' =>'是否激活',
                                'rules' =>'numeric'
                            ),
                        array(
                                'field' =>'default_num',
                                'label' =>'默认取出广告数',
                                'rules' =>'trim|numeric'
                            )
                        ),
        'chang_pw'=>array(
                        array(
                                'field' =>'pw',
                                'label' =>'原密码',
                                'rules' =>'required|minlength(7)|callback_namepw_check'
                            ),
                         array(
                                'field' =>'pw_new',
                                'label' =>'新密码',
                                'rules' =>'required|minlength(7)'
                            ),
                        array(
                                'field' =>'pw_submit',
                                'label' =>'密码确认',
                                'rules' =>'required|minlength(7)|matches[pw_new]'
                            )
                       )
                 );
?>
