
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
        <h5>分类名称</h5>
        <input type="text" name="name" 
        value="<?if(isset ($category->C_name)):?><?=$category->C_name?><?else:?><?=set_value('name')?><?endif;?>"/>
        <h5>父分类</h5>
        <select name="parent">
                    <?if(isset ($category->C_parent)):?>
                        <option value="<?=$category->C_id?>"><?=$categories[$category->C_parent]?></option>
                    <?else:?>
                        <option value="">请选择分类</option>
                    <?endif;?>
                
                    <?foreach($categories as $key=>$value):?>
                        <option value="<?=$key?>"><?=$value?></option>
                    <?endforeach;?>
        </select>
        <h5>分类描述</h5>
        <input type="text" name="des" 
         value="<?if(isset($category->C_des)):?><?=$category->C_des?><?else:?><?=set_value('des')?><?endif;?>"/>
        <div>
            <input type="submit" value="提交"/>
            <input type="reset" value="重置"/>
        </div>
        </form>
    </body>
</html>