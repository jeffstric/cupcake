<html>
    <head>
        <meta charset="UTF-8"></meta>
    </head>
    <body>
       <?=form_open('admin/add_user')?>
        <h5>用户名</h5>
        <input type="text" name="name" ></input>
        <h5>密码</h5>
        <input type="password" name="pw"></input>
        <h5>密码确认</h5>
        <input type="password" name="pw_submit"></input>
        <h5>权限</h5>
        <table>
            <tr>
                <th>广告</th>
                <th>商品</th>
                <th>网站</th>
                <th>用户</th>
            </tr>
            <tr>
                <td>
                    <input type="checkbox" name="adsence"/>
                </td>
                <td>
                    <input type="checkbox" name="user"/>
                </td>
                <td>
                    <input type="checkbox" name="web"/>
                </td>
                <td>
                    <input type="checkbox" name="product"/>
                </td>
            </tr>
        </table>
        <input type="submit" value="submit"/>
        </form>
    </body>
</html>