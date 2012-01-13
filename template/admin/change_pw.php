<html>
    <head>
        <meta charset="UTF-8"></meta>
    </head>
    <body>
       <?=form_open('admin/pw_change')?>
        <div>
            <?=validation_errors()?>
            <?if(isset ($errors)):?>
                <?=$errors?>
            <?endif;?>
        </div>
        <h5>原密码</h5>
        <input type="password" name="pw"></input>
        <h5>新密码</h5>
        <input type="password" name="pw_new"></input>
        <h5>密码确认</h5>
        <input type="password" name="pw_submit"></input>
        <div>
            <input type="submit" value="提交"/>
            <input type="reset" value="重置"/>
        </div>
    </form>
    </body>
</html>