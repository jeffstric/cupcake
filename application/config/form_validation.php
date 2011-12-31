<?php
    $config = array(
       'login'=> array( 
                      array(
                             'field'   => 'name',
                             'label'   => '用户名',
                             'rules'   => 'required|min_length(2)|callback_namepw_check'
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
                       )
                 );
?>
