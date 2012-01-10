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
                    <td colspan ="4">
                    <select name="action">
                        <option value="">请选择操作</option>
                        <option value="delete">删除</option>
                        <option value="update">更新</option>
                    </select>
                    </td>
                    <td colspan ="3">
                        <input type="submit" value="提交"/>
                    </td>
            </tr>
            <tr>
                <th>广告名称</th>
                <th>广告url</th>
                <th>广告图片</th>
                <th>排序权重</th>
                <th>添加者</th>
                <th>添加时间</th>
                <th>ID</th>
                <th>操作</th>
            </tr>
            <?foreach($adsences as $value):?>
                <tr>
                    <td><?=$value->A_name?></td>
                    <td><?=$value->A_url?></td>
                    <td><img src="<?=get_U($value->A_img)?>"/></td>
                    <td><?=$value->A_sort?></td>
                    <td><?=$value->A_adder?></td>
                    <td><?=date('Y-m-d H-i-s',$value->A_addtime)?></td>
                    <td><?=$value->A_id?></td>
                    <td><input type="checkbox" class="form_checkbox" value="<?=$value->A_id?>"/></td>
                </tr>
            <?endforeach;?>
        </table>
        </form>
    </body>
</html>