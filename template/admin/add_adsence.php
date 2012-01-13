<html>
    <head>
        <meta charset="UTF-8"></meta>
        <script type="text/javascript" src="<?=base_url('My97/WdatePicker.js')?>"></script>
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
        </h5>
        <input type="text" name="name"
           value="<?if(isset($adsence->A_name)):?><?=$adsence->A_name?><?else:?><?=set_value('name')?><?endif;?>"/>
        
        <h5>指向链接
            <?if(isset($adsence->A_url)):?>
            (原链接:<?=$adsence->A_url?>)
            <?endif;?>
        </h5>
        <input type="text" name="url"  style="width:420px;" 
               value="<?if(isset($adsence->A_url)):?><?=$adsence->A_url?><?else:?><?=set_value('url')?><?endif;?>"/> 
        
        <h5>所属广告分类</h5>
        <select name="style">
            <?if(isset($adsence->AS_id)):?>
            <option value="<?=$adsence->AS_id?>"><?=$styles[$adsence->AS_id]?></option>
            <?endif;?>
            <?foreach($styles as $key=>$value):?>
                <option value="<?=$key?>" ><?=$value?></option>
            <?endforeach;?>
        </select>
        
            
        <h5>广告图片(幻灯片:900px*376px 全局:300px*171px)
            <?if(isset($adsence->A_img)):?>
            <br/>(原图片:<img width="400px" height="150px" src="<?=get_U($adsence->A_img)?>"/>)
            <?endif;?>
        </h5>
        <input type="file" name="img"/>
        
        <h5>是否开启</h5>
        <select name="active">
            <?if(isset($adsence->A_active)):?>
                <?if($adsence->A_active):?>
                    <option value="1"/>开启</option>
                <?else:?>
                    <option value="0"/>关闭</option>
                <?endif;?>
            <?endif;?>
            <option value="0" <?= set_select('active', '0') ?>/>关闭</option>
            <option value="1" <?= set_select('active', '1') ?>/>开启</option>
        </select>
        
        <h5>开始时间(默认为此时此刻)
         <input type="text" name="start"  onClick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})" readOnly="TRUE" 
                value="<?if(isset($adsence->A_start)):?><?=$adsence->A_start?><?endif;?>"/>
        </h5>
        <h5>结束时间(默认为永不结束)
         <input type="text" name="end"  onClick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})" readOnly="TRUE"
                 value="<?if(isset($adsence->A_end)):?><?=$adsence->A_end?><?endif;?>"/>
        </h5>
        
        <h5>排序权重（留空为默认）
         <input type="text" name="sort" 
            value="<?if(isset($adsence->A_sort)):?><?=$adsence->A_sort?><?else:?><?=set_value('sort')?><?endif;?>"/>
        </h5>
        
        <div>
            <input type="submit" value="提交"/>
            <input type="reset" value="重置"/>
        </div>
        </form>
    </body>    
</html>
        
       