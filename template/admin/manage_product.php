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
                    <th>产品名称</th>
                    <th>分类</th>
                    <th>产品描述</th>
                    <th>产品图片</th>
                    <th>产品缩略图</th>
                    <th>产品排序权重</th>
                    <th>首页展示</th>
                    <th>添加者</th>
                    <th>添加时间</th>
                    <th>操作</th>
                </tr>
                    <?foreach($products as $value):?>
                      <tr>
                        <td><?=$value->P_name?></td>
                        <td><?=$value->P_C_name?></td>
                        <td><?=$value->P_des?></td>
                        <td><img width="181" height="142" src=" <?=get_U($value->P_img)?>"/></td>
                        <td><img width="181" height="142" src=" <?=get_U($value->P_tmb)?>"/></td>
                        <td><?=$value->P_sort?></td>
                        <td>
                            <?if($value->P_index):?>
                                是
                            <?else:?>
                                否
                            <?endif;?>
                        </td>
                        <td><?=$value->P_adder?></td>
                        <td><?=date('Y-m-d H:i:s',$value->P_addtime)?></td>
                        <td>
                            <div>
                                <a href="<?=site_url('admin/product_update/'.$value->P_id)?>" >更新</a>
                            </div>
                            <div>
                                <a href="<?=site_url('admin/product_delete/'.$value->P_id)?>" >删除</a> 
                            </div>
                            
                        </td>
                       </tr>
                    <?endforeach;?>
             </table>
       </form>
    </body>
</html>