<html>
    <head>
        <meta charset="UTF-8"></meta>
    </head>
    <body>
        <?=form_open_multipart('admin/'.$destination)?> 
        <?if(isset($P_id)):?>
                <div>
                    <input type="text" name="P_id" value="<?=$P_id?>" hidden="TRUE"/>
                </div>
        <?endif;?>
        <div>
            <?=validation_errors()?>
            <?if(isset ($errors)):?>
                <?=$errors?>
            <?endif;?>
        </div>
        <h5>商品名称</h5>
        <div>
            <input type="text" name="name" 
                   value="<?if(isset($product->P_name)):?><?=$product->P_name?><?else:?><?endif;?>"/>
        </div>
        <h5>商品分类</h5>
        <div>
            <select name="category">
                <?if(isset($product->P_C_name) && isset($product->P_C_id)):?>
                    <option value="<?=$product->P_C_id?>"><?=$product->P_C_name?></option>
               <?else:?>
                    <option value="">请选择分类</option>
               <?endif;?>
                <?foreach($categories as $key=>$value):?>
                    <option value="<?=$key?>"><?=$value?></option>
                <?endforeach;?>
            </select>
        </div>
        <h5>商品描述</h5>
        <div>
            <?php
                $con = isset($product->P_des)?$product->P_des:'';
            
                include_once "./ckeditor/ckeditor.php";
                $CKEditor = new CKEditor();
                // Path to the CKEditor directory.
                $CKEditor->basePath = base_url().'ckeditor/';
                $CKEditor->config['width'] = 750;
                $CKEditor->editor("des",$con);
            ?>

            </textarea>
        </div>
        <h5>产品图片(360px*282px)
             <?if(isset($product->P_des)):?>
                (原图片:<img src=" <?=get_U($product->P_img)?>"/>)
             <?endif;?>
        </h5>
        <div>
            <input type="file" name="img"/>
        </div>
        <h5>产品缩略图(180px*140px)
             <?if(isset($product->P_des)):?>
                (原图片:<img src=" <?=get_U($product->P_tmb)?>"/>)
             <?endif;?>
        </h5>
        <div>
            <input type="file" name="tmb"/>
        </div>
        <div>
            <h5>排序权重(留空表示默认)
             <input type="text" name="sort" 
             value="<?if(isset($product->P_sort)):?><?=$product->P_sort?><?else:?><?=set_value('sort')?><?endif;?>"/>
            </h5>
        </div>
        <div>
            <h5>首页显示
                <input type ="checkbox" name="indexpage"  value="on"
                       <?if(isset($product->P_index) &&$product->P_index ):?>
                            checked="TRUE"
                       <?else:?>
                            <?=set_checkbox('indexpage', 'on'); ?>
                       <?endif;?>
                 />
             (当首页显示的商品数超过3个后，按照权重选取3个)
            </h5>
        </div>
        <div>
            <input type="submit" value="提交"/>
            <input type="reset" value="重置"/>
        </div>
        </form>    
    </body>
</html>