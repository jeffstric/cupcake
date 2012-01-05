
<html>
    <head>
        <meta charset="UTF-8"></meta>
    </head>
    <body>
        <?=form_open('admin/'.$destination)?> 
        <div>
            <?=validation_errors()?>
        </div>
        <h5>分类名称
          <?if(isset ($name_pre)):?>
            (原名称:<?=$name_pre?>)
          <?endif;?>
        </h5>
        <input type="text" name="name" value="<?=set_value('name')?>"/>
        <h5>分类描述
          <?if(isset ($des_pre)):?>
            (原描述:<?=$des_pre?>)
          <?endif;?>
        </h5>
        <input type="text" name="des" value="<?=set_value('des')?>"/>
        <?if(isset($C_id)):?>
            <input type="text" name="C_id" value="<?=$C_id?>"/>
        <?endif;?>
        <div>
            <input type="submit" value="submit"/>
            <input type="reset" value="reset"/>
        </div>
        </form>
    </body>
</html>