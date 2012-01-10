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
        <input type="text" name="action" value ="update" hidden="TRUE" />
        <table border="1">
            <tr>
                    <td colspan ="3">
                    请选择要更新的项目
                    </td>
                    <td colspan ="3">
                        <input type="submit" value="提交"/>
                    </td>
            </tr>
            <tr>
                <th>广告位名称</th>
                <th>广告位介绍</th>
                <th>广告位包含的广告</th>
                <th>添加者</th>
                <th>添加时间</th>
                <th>图片展示</th>
                <th>更新</th>
            </tr>
            <?foreach($styles as $key=>$value):?>
            <tr>
                <td><?=$value->AS_name?></td>
                <td><?=$value->AS_des?></td> 
                <td><?=$value->A_id?></td> 
                <td><?=$value->AS_adder?></td> 
                <td><?=date('Y-m-d H-i-s',$value->AS_addtime)?></td> 
                <td>
                   <?foreach($img->$key as $V):?>
                    <img src="<?=get_U($V['img'])?>"/>
                   <?endforeach;?>
                </td>
                <td><input type="checkbox" class="form_checkbox" value="<?=$value->AS_id?>"/></td> 
            </tr>
            <?endforeach;?>
         </table>
        </form>
    </body>
</html>