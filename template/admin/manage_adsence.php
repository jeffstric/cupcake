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
                <th>广告名称</th>
                <th>广告url</th>
                <th>所属广告位</th>
                <th>广告图片</th>
                <th>开启</th>
                <th>开始时间</th>
                <th>结束时间</th>
                <th>排序权重</th>
                <th>添加者</th>
                <th>添加时间</th>
                <th style="width:40px">操作</th>
            </tr>
            <?foreach($adsences as $value):?>
                <tr>
                    <td><?=$value->A_name?></td>
                    <td><?=$value->A_url?></td>
                    <td><?=$styles[$value->AS_id]?></td>
                    <td><img width="200" height="80" src="<?=get_U($value->A_img)?>"/></td>
                    <td>
                            <?if($value->A_active):?>
                                    是
                            <?else:?>
                                    否
                            <?endif;?>       
                    </td>
                    <td><?=$value->A_start?></td>
                    <td><?=$value->A_end?></td>
                    <td><?=$value->A_sort?></td>
                    <td><?=$value->A_adder?></td>
                    <td><?=date('Y-m-d H-i-s',$value->A_addtime)?></td>
                    <td>
                        <a href="<?=site_url('admin/adsence_update/'.$value->A_id)?>" >更新</a><br/>
                        <a href="<?=site_url('admin/adsence_delete/'.$value->A_id)?>" >删除</a>
                    </td>
                </tr>
            <?endforeach;?>
        </table>
        </form>
    </body>
</html>