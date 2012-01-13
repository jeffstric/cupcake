
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
                     <th>父分类</th>
                     <th>分类添加者</th>
                     <th>分类添加时间</th>
                     <th>操作</th>
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
                        <a href="<?=site_url('admin/category_update/'.$value->C_id)?>" >更新</a> 
                        <a href="<?=site_url('admin/category_delete/'.$value->C_id)?>" >删除</a> 
                    </td>
                </tr>
               <?endforeach;?>
            <?endif;?>
        </table>
    </body>
</html>