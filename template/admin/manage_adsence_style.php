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
                <th>广告位ID</th>
                <th>广告位名称</th>
                <th>广告位描述</th>
                <th>描述</th>
                <th>广告位包涵广告数量</th>
                <th>添加者</th>
                <th>添加时间</th>
                <th>操作</th>
            </tr>
            <?foreach($styles as $key=>$value):?>
            <tr>
                <td><?=$value->AS_id?></td>
                <td><?=$value->AS_name?></td>
                <td><?=$value->AS_keyname?></td>
                <td><?=$value->AS_des?></td>
                <td><?=$value->AS_default_num?></td>
                <td><?=$value->AS_adder?></td> 
                <td><?=date('Y-m-d H-i-s',$value->AS_addtime)?></td> 
                <td>
                    <a href="<?=site_url('admin/adsence_style_update/'.$value->AS_id)?>" >更新</a>
                </td> 
            </tr>
            <?endforeach;?>
         </table>
        </form>
    </body>
</html>