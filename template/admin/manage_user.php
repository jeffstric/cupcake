
<html>
    <head>
        <meta charset="UTF-8"></meta>
        <script type="tect/javascript" src="<?=get_cji('jQuery_min.js')?>"></script>
        <script type="tect/javascript" src="<?=get_cji('checkbox.js')?>"></script>
    </head>
    <body>
        <?=form_open(site_url('admin/user_manage'))?>
        <table border="1">
            <tr>
                <th>用户名</th>
                <th>添加者</th>
                <th>添加时间</th>
                <th>权限：用户管理</th>
                <th>权限：网站管理</th>
                <th>权限：商品管理</th>
                <th>权限：广告管理</th>
                <th>操作</th>
            </tr>
            <?if(isset($users)):?>
                <?fb($users)?>
                <?foreach($users as $value)?>
                <tr>
                    <td><?=$value->U_name?></td>
                    <td><?=$value->U_adder?></td>
                    <td><?=date('Y-m-d H:i:s',$value->U_addtime)?></td>
                    <td>
                      <?if(($value->U_right/2)):?>
                        拥有
                      <?else:?>
                        无
                      <?endif;?>
                    </td>
                    <td>
                      <?if(($value->U_right/2)%2):?>
                        拥有
                      <?else:?>
                        无
                      <?endif;?>
                    </td>
                    <td>
                      <?if(($value->U_right/4)%2):?>
                        拥有
                      <?else:?>
                        无
                      <?endif;?>
                    </td>
                    <td>
                      <?if(($value->U_right/8)%2):?>
                        拥有
                      <?else:?>
                        无
                      <?endif;?>
                    </td>
                    <td><input type="checkbox" value="<?=$value->U_id?>"</td>
                </tr>
            <?endif;?>
        </table>
            <input type ="submit" value="submit" />
        </form>
    </body>
</html>
    
