
<html>
    <head>
        <meta charset="UTF-8"></meta>
        <script type="text/javascript" src="<?=get_cji('jQuery_min.js')?>"></script>
        <script type="text/javascript" src="<?=get_cji('checkbox.js')?>"></script>
    </head>
    <body>
        <?=form_open(site_url('admin/action'))?>
        <input type="text" name="object" value="<?=$object?>" hidden="TRUE"/>
        <input type="text" name="checkboxValue" id="checkboxValue" hidden="TRUE"/>
        <table border="1">
            <tr>
                <th>分类名称</th>
                <th>分类描述</th>
                <th>添加者</th>
                <th>添加时间</th>
                <th>操作</th>
            </tr>
            <?if(isset($categories)):?>
               <?foreach($categories as $value):?> 
                <tr>
                    <td><?=$value->C_name?></td>
                    <td><?=$value->C_des?></td>
                    <td><?=$value->C_adder?></td>
                    <td><?=date('Y-m-d H:i:s',$value->C_addtime)?></td>
                    <td><input type="checkbox" class="form_checkbox" value="<?=$value->C_id?>"/></td>
                </tr>
               <?endforeach;?>
                <tr>
                    <td colspan ="3">
                    <select name="action">
                        <option value="">请选择操作</option>
                        <option value="delete">删除</option>
                        <option value="update">更新</option>
                    </select>
                    </td>
                    <td colspan ="2">
                        <input type="submit" value="提交"/>
                    </td>
                </tr>
            <?endif;?>
        </table>
    </body>
</html>