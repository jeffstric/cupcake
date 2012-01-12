
<html>
    <head>
        <meta charset="UTF-8"></meta>
        <script type="text/javascript" src="<?=get_cji('jQuery_min.js')?>"></script>
        <script type="text/javascript" src="<?=get_cji('checkbox.js')?>"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('#adsence_button').bind('click',adsenceToggle);
                $('#adsence_clear').bind('click',adsenceClear)
                function adsenceToggle(){
                    if($('#adsence_button').val()=='显示广告'){
                        $('#adsence_button').val('隐藏广告');
                        $('#adsencesM').show('fast');
                    }
                    else{
                        $('#adsence_button').val('显示广告');
                        $('#adsencesM').hide('fast');
                    }
                }
                function adsenceClear(){
                    $('#checkboxValue').val('');
                }
            });
        </script>
    </head>
    <body>
        <?=form_open('admin/'.$destination)?>
        <?if(isset($style)):?>
            <input type="text" name="id" value="<?=$style->AS_id?>" hidden="TRUE"/>
        <?endif;?>
        <div>
            <?=validation_errors()?>
            <?if(isset ($errors)):?>
                <?=$errors?>
            <?endif;?>
        </div>
        <h5>广告位图片(填写广告ID，英文逗号分割)
            <?if(isset($style)):?>
            (<?=$style->A_id?>)
            <?endif;?>
        </h5>
        <div id="adsencesM" style="display:none">
                <table border="1">
                    <tr>
                        <th colspan="8">请选择</th>
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
                            <td><img width="400" height="150" src="<?=get_U($value->A_img)?>"/></td>
                            <td><?=$value->A_sort?></td>
                            <td><?=$value->A_adder?></td>
                            <td><?=date('Y-m-d H-i-s',$value->A_addtime)?></td>
                            <td><?=$value->A_id?></td>
                            <td><input type="checkbox" class="form_checkbox" value="<?=$value->A_id?>"/></td>
                        </tr>
                    <?endforeach;?>
                </table>
          </div>
          <input type="button" id="adsence_button" value="显示广告">
          <input type="text" name="A_id" id="checkboxValue" value="
            <?if(isset($style)):?>
                <?=$style->A_id?>
            <?endif;?>
          "/>
          <input type="button" id="adsence_clear" value="清空广告"/>
          <br/>
          <?if(isset($img->result) && $img->result != NULL):?>
            <?foreach($img->result as $value):?>
                <img width="100" width="50" src="<?=get_U($value['img'])?>" href="<?=$value['url']?>"/>
            <?endforeach;?>
          <?endif;?>
        <h5>广告位名称
            <?if(isset($style)):?>
            （<?=$style->AS_name?>）
            <?endif;?>
        </h5>
        <input type="text" name="name"/>
        <h5>广告位描述(80个字符)
            <?if(isset($style)):?>
            (<?=$style->AS_des?>)
            <?endif;?>
        </h5>
        <input type="text" name="des" style="width:500px"/>
        <div>
            <input type="submit" value="提交"/>
            <input type="reset" value="重置"/>
        </div>
        </form>
    </body>
</html>