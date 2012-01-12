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
                <th>广告位介绍</th>
                <th>广告位包含的广告</th>
                <th>添加者</th>
                <th>添加时间</th>
                <th>图片展示</th>
                <th>更新</th>
            </tr>
            <?foreach($styles as $key=>$value):?>
            <tr>
                <td><?=$value->AS_id?></td>
                <td><?=$value->AS_name?></td>
                <td><?=$value->AS_des?></td> 
                <td><?=$value->A_id?></td> 
                <td><?=$value->AS_adder?></td> 
                <td><?=date('Y-m-d H-i-s',$value->AS_addtime)?></td> 
                <td>
                   <?if(isset($img->$key)):?> 
                       <?foreach($img->$key as $V):?>
                        <img width="100" height="50" src="<?=get_U($V['img'])?>"/>
                       <?endforeach;?>
                   <?endif;?>
                </td>
                <td>
                    <a href="<?=site_url('admin/adsence_style_update/'.$value->AS_id)?>" >更新</a>
                </td> 
            </tr>
            <?endforeach;?>
         </table>
        </form>
    </body>
</html>