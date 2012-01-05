<html>
    <head>
        <meta charset="UTF-8"></meta>
    </head>
    <body>
        <?=form_open_multipart('admin/'.$destination)?> 
        <div>
            <?=validation_errors()?>
            <?if(isset ($errors)):?>
                <?=$errors?>
            <?endif;?>
        </div>
        <h5>商品名称
            <?if(isset($product->P_name)):?>
                (原名称:<?=$product->P_name?>)
            <?endif;?>
        </h5>
        <div>
            <input type="text" name="name"/>
        </div>
        <h5>商品分类
            <?if(isset($product->P_C_name)):?>
                (原分类:<?=$product->P_C_name?>)
            <?endif;?>
        </h5>
        <div>
            <select name="category">
                <option value="">请选择分类</option>
                <?foreach($categories as $key=>$value):?>
                    <option value="<?=$key?>"><?=$value?></option>
                <?endforeach;?>
            </select>
        </div>
        <h5>商品描述</h5>
        <?if(isset($product->P_des)):?>
                (原描述:<div><?=$product->P_des?></div>)
        <?endif;?>
        <div>
            <?php
                include_once "./ckeditor/ckeditor.php";
                $CKEditor = new CKEditor();
                // Path to the CKEditor directory.
                $CKEditor->basePath = base_url().'ckeditor/';
                $CKEditor->config['width'] = 750;
                $CKEditor->editor("des");
            ?>

            </textarea>
        </div>
        <h5>产品图片
             <?if(isset($product->P_des)):?>
                (原图片:<img src=" <?=get_U($product->P_img)?>"/>)
             <?endif;?>
        </h5>
        <div>
            <input type="file" name="img"/>
        </div>
        <h5>产品缩略图
             <?if(isset($product->P_des)):?>
                (原图片:<img src=" <?=get_U($product->P_tmb)?>"/>)
             <?endif;?>
        </h5>
        <div>
            <input type="file" name="tmb"/>
        </div>
        <h5>排序权重(留空表示默认)
         <?if(isset($product->P_des)):?>
                (原权重:<?=$product->P_sort?>)
         <?endif;?>
        </h5>
        <div>
            <input type="text" name="sort"/>
        </div>
        <h5>首页显示(超过3个按照权重顺序)
         <?if(isset($product->P_des)):?>
                (原值:
             <?if($product->P_index):?>
                是
             <?else:?>
                否
             <?endif;?>
                )
         <?endif;?>
        </h5>
        <div>
           <?if(isset($product->P_des)):?>
            <select name="indexpage_change">
                <option value="nochange">不做修改</option>
                <option value="1">首页显示</option>
                <option value="0">首页不显示</option>
            </select>
           <?else:?>    
            <input type ="checkbox" name="indexpage" />
           <?endif;?>
        </div>
            <?if(isset($P_id)):?>
                <div>
                    <input type="text" name="P_id" value="<?=$P_id?>"/>
                </div>
            <?endif;?>
        <div>
            <input type="submit" value="submit"/>
            <input type="reset" value="reset"/>
        </div>
        </form>    
    </body>
</html>