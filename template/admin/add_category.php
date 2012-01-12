
<html>
    <head>
        <meta charset="UTF-8"></meta>
    </head>
    <body>
        <?=form_open('admin/'.$destination)?>
        <?if(isset($category->C_id)):?>
            <input type="text" name="C_id" value="<?=$category->C_id?>" hidden="TRUE"/>
        <?endif;?>
        <div>
            <?=validation_errors()?>
            <?if(isset ($errors)):?>
                <?=$errors?>
            <?endif;?>
        </div>
        <h5>分类名称
          <?if(isset ($category->C_name)):?>
            (原名称:<?=$category->C_name?>)
          <?endif;?>
        </h5>
        <input type="text" name="name" value="<?=set_value('name')?>"/>
        <h5>父分类
          <?if(isset ($category->C_parent)):?>
            (原父分类:<?=$categories[$category->C_parent]?>)
          <?endif;?>
        </h5>
        <select name="parent">
                <option value="">请选择分类</option>
                    <?foreach($categories as $key=>$value):?>
                        <option value="<?=$key?>"><?=$value?></option>
                    <?endforeach;?>
        </select>
        <h5>分类描述
          <?if(isset($category->C_des)):?>
            (原描述:<?=$category->C_des?>)
          <?endif;?>
        </h5>
        <input type="text" name="des" value="<?=set_value('des')?>"/>
        <div>
            <input type="submit" value="提交"/>
            <input type="reset" value="重置"/>
        </div>
        </form>
    </body>
</html>