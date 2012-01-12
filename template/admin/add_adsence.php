<html>
    <head>
        <meta charset="UTF-8"></meta>
    </head>
    <body>
        <?=form_open_multipart('admin/'.$destination)?>
        <?if(isset($id)):?>
            <input type="text" name="A_id" value="<?=$id?>" hidden="TRUE"/>
        <?endif;?>
        <div>
            <?=validation_errors()?>
            <?if(isset ($errors)):?>
                <?=$errors?>
            <?endif;?>
        </div>
        <h5>广告名称
         <?if(isset($adsence->A_name)):?>
            (原名称:<?=$adsence->A_name?>)
         <?endif;?>
        </h5>
        <input type="text" name="name" value="<?=set_value('name')?>"/>
        <h5>指向链接
            <?if(isset($adsence->A_url)):?>
            (原链接:<?=$adsence->A_url?>)
            <?endif;?>
        </h5>
        <input type="text" name="url" value="<?=set_value('url')?>" style="width:420px;"/> 
        <h5>广告图片(幻灯片:900px*376px 全局:300px*171px)
            <?if(isset($adsence->A_img)):?>
            <br/>(原图片:<img width="400px" height="150px" src="<?=get_U($adsence->A_img)?>"/>)
            <?endif;?>
        </h5>
        <input type="file" name="img"/>
        <h5>排序权重（留空为默认）
            <?if(isset($adsence->A_sort)):?>
            (原权重:<?=$adsence->A_sort?>)
            <?endif;?>
         <input type="text" name="sort"/>
        </h5>
        
        <div>
            <input type="submit" value="提交"/>
            <input type="reset" value="重置"/>
        </div>
        </form>
    </body>    
</html>
        
       