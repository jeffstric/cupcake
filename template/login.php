<html>
    <head>
        <meta charset="UTF-8" />
    </head>
    
    <body>
        <?=form_open('login/index')?>
        <table style="text-align: center;width:300px;diaplay:block;margin:0 auto;margin-top: 170px;">
            <tr>
                <td colspan="2">
                    <img src="<?=get_cji('logo.gif')?>"/>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    欢迎光临cupcupcake后台管理系统
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <?=validation_errors()?>
                </td>
            </tr>
            <tr>
                <td>
                    用户名
                </td>
                <td>
                    <input type="text" name="name" value="<?=set_value('name')?>" />
                </td>
            </tr>
            <tr>
                <td>
                    密码
                </td>
                <td>
                    <input type="password" name="pw" /> 
                </td>
            </tr>
            <tr>
                <td>
                    验证码
                </td>
                <td>
                    <img id="captcha" src="<?=substr(site_url(),0,strlen(site_url())-9)?>captcha/code.php">
                </td>
            </tr>
            <tr>
                <td>
                    <a href="#" onclick=" document.getElementById('captcha').src = document.getElementById('captcha').src + '?' + (new Date()).getMilliseconds()">换一张</a> 
                </td>
                <td>
                    <input type="text" name="check_code" />
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="确认"/>
                </td>
                <td>
                    <input type="reset" value="取消"/>
                </td>
            </tr>
        </table>
        </form>
    </body>
</html>