<html>
    <head>
        <meta charset="UTF-8"></meta>
        <script type="text/javascript" src="<?=get_cji('jQuery_min.js')?>"></script>
        <script type="text/javascript" src="<?=get_cji('checkbox.js')?>"></script>
    </head>
    <body>
       <?=form_open(site_url('admin/product_action'))?>
            <input type="text" name="checkboxValue" id="checkboxValue"/>
             <table border="1">
                <tr>
                    <td colspan ="5">
                        <select name="action">
                            <option value="">请选择操作</option>
                            <option value="delete">删除</option>
                            <option value="update">更新</option>
                        </select>
                    </td>
                    <td colspan ="5">
                        <input type="submit" value="提交"/>
                    </td>
                </tr>
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
                        <td><img src=" <?=get_U($value->P_img)?>"/></td>
                        <td><img src=" <?=get_U($value->P_tmb)?>"/></td>
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
                        <td><input type="checkbox" class="form_checkbox" value="<?=$value->P_id?>"/></td>
                       </tr>
                    <?endforeach;?>
             </table>
       </form>
    </body>
</html>