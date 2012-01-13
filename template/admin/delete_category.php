
<html>
    <head>
        <meta charset="UTF-8"></meta>
        <script type="text/javascript" src="<?=get_cji('jQuery_min.js')?>"></script>
        <script type="text/javascript" src="<?=get_cji('checkbox.js')?>"></script>
    </head>
    <body>
        <?=form_open(site_url('admin/process_delete'))?>
        <input type="text" name="object" value="category" hidden="TRUE"/>
        <input type="text" name="checkboxValue" id="checkboxValue" hidden="TRUE" />
        <table border="1">
            <tr>
                <td colspan ="6">
                    亲，删除是不可逆的，你确定一定及其肯定?
                </td>
            </tr>
            <?if(isset($categories)):?>
               <?foreach($categories as $value):?> 
                <tr>
                    <td><?=$value->C_name?></td>
                    <td><?=$value->C_des?></td>
                    <td>
                        <?if(isset($C[$value->C_parent])):?>
                            <?=$C[$value->C_parent]?>
                        <?endif;?>
                    </td>
                    <td><?=$value->C_adder?></td>
                    <td><?=date('Y-m-d H:i:s',$value->C_addtime)?></td>
                    <td>
                        <input type="checkbox" class="form_checkbox" value="<?=$value->C_id?>" checked="TRUE"/>
                    </td>
                </tr>
               <?endforeach;?>
                <tr>
                    <td colspan ="2">
                        <input type="submit" value="提交"/>
                    </td>
                    <td colspan ="2">
                        <input type="reset" value="重置"/>
                    </td>
                    <td colspan ="2">
                        <a href="<?=site_url('admin/category_manage')?>" >返回</a>
                    </td>
                </tr>
            <?endif;?>
        </table>
    </body>
</html>