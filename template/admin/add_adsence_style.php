
<html>
    <head>
        <meta charset="UTF-8"></meta>
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
                
        <h5>广告位名称</h5>
        <input type="text" name="name" 
        value="<?if(isset($style->AS_name)):?><?=$style->AS_name?><?else:?><?=set_value('name')?><?endif;?>"/>
        
        <h5>广告索引名称(必须为英文或数字)</h5>
        <input type="text" name="keyname" 
         value="<?if(isset($style->AS_keyname)):?><?=$style->AS_keyname?><?else:?><?=set_value('keyname')?><?endif;?>"/>
        
        <h5>广告位描述(80个字符)</h5>
        <input type="text" name="des" style="width:500px" 
         value="<?if(isset($style->AS_des)):?><?=$style->AS_des?><?else:?><?=  set_value('des')?><?endif;?>" />
        
        <h5>广告位默认取出的广告个数(默认为1)</h5>
        <input type="text" name="default_num"  
        value="<?if(isset($style->AS_default_num)):?><?=$style->AS_default_num?><?else:?><?=set_value('default_num')?><?endif;?>"/>
        <div>
            <input type="submit" value="提交"/>
            <input type="reset" value="重置"/>
        </div>
        </form>
    </body>
</html>