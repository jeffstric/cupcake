
<html>
    <head>
        <meta charset="UTF-8"></meta>
    </head>
    <body>
        <?=form_open('admin/'.$destination)?>
        <input type="text" name="id" value="<?=$style->AS_id?>" hidden="TRUE"/>
        <div>
            <?=validation_errors()?>
            <?if(isset ($errors)):?>
                <?=$errors?>
            <?endif;?>
        </div>
        <h5>广告位图片(填写广告ID，英文逗号分割)(<?=$style->A_id?>)</h5>
          <a href="<?=site_url('admin/adsence_manage/')?>" target="_blank">查看广告位ID</a>
          <input type="text" name="A_id"/>
          <br/>
          <?if(isset($img->result) && $img->result != NULL):?>
            <?foreach($img->result as $value):?>
                <img src="<?=get_U($value['img'])?>" href="<?=$value['url']?>"/>
            <?endforeach;?>
          <?endif;?>
        <h5>广告位名称（<?=$style->AS_name?>）</h5>
        <input type="text" name="name"/>
        <h5>广告位描述(<?=$style->AS_des?>)</h5>
        <input type="text" name="des"/>
        <div>
            <input type="submit" value="submit"/>
            <input type="reset" value="reset"/>
        </div>
        </form>
    </body>
</html>