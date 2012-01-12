<html>
    <head>
        <meta charset="UTF-8"></meta>
        <script type="text/javascript" src="<?=get_cji('jQuery_min.js')?>"></script>
        <script type="text/javascript" src="<?=get_cji('checkbox.js')?>"></script>
    </head>
    <body>
        <?=form_open(site_url('admin/process_delete'))?>
        <input type="text" name="object" value="adsence" hidden="TRUE"/>
        <input type="text" name="checkboxValue" id="checkboxValue" hidden="TRUE"/>
        <table border="1">
            <tr>
                <td colspan ="7">
                    亲，删除是不可逆的，你确定一定及其肯定?
                </td>
            </tr>
            <tr>
                <th>广告名称</th>
                <th>广告url</th>
                <th>广告图片</th>
                <th>排序权重</th>
                <th>添加者</th>
                <th>添加时间</th>
                <th>选择</th>
            </tr>
            <?foreach($adsences as $value):?>
                <tr>
                    <td><?=$value->A_name?></td>
                    <td><?=$value->A_url?></td>
                    <td><img width="400" height="150" src="<?=get_U($value->A_img)?>"/></td>
                    <td><?=$value->A_sort?></td>
                    <td><?=$value->A_adder?></td>
                    <td><?=date('Y-m-d H-i-s',$value->A_addtime)?></td>
                    <td>
                        <input type="checkbox" class="form_checkbox" value="<?=$value->A_id?>" checked="TRUE"/>
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
                    <td>
                        <a href="<?=site_url('admin/adsence_manage')?>" >返回</a>
                    </td>
                </tr>
        </table>
        </form>
    </body>
</html>