<html>
    <head>
        <meta charset="utf-8" /> //设置网页的字符编码为UTF-8，以确保正确显示中文字符。
        <title>登入範例</title> //设置网页的标题为“登入範例”。
    </head>
    <body>
        <form method=post action="2.login.php"> //创建一个表单，使用POST方法提交数据，提交地址为“2.login.php”。
            帳號：<input type=text name="id"><br /> //创建一个文本输入框，名称为“id”，用于输入账号。
            密碼：<input type=password name="pwd"><p></p> //创建一个密码输入框，名称为“pwd”，用于输入密码。
            <input type=submit value="登入"> <input type=reset value="清除"> //创建一个提交按钮，显示文本为“登入”，以及一个重置按钮，显示文本为“清除”。
            
        </form>
    </body>
</html>