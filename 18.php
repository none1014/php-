<html>
    <head><title>使用者管理</title></head>
    <body>
    <?php
        error_reporting(0); //关闭错误报告，防止在页面上显示错误信息。
        session_start();  //启动会话，以便在不同页面之间保存用户的登录状态。
        if (!$_SESSION["id"]) { //检查用户是否已经登录，如果没有登录，执行以下代码：
            echo "請登入帳號"; //输出提示消息，要求用户登录账号。
            echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>"; //使用HTML的meta标签实现页面自动跳转，3秒后跳转到登录页面“2.login.html”，让用户先登录。
        }
        else{   
            echo "<h1>使用者管理</h1> //输出页面标题“使用者管理”。
                [<a href=14.user_add_form.php>新增使用者</a>] [<a href=11.bulletin.php>回佈告欄列表</a>]<br> //输出两个链接，一个指向“14.user_add_form.php”页面，用于新增使用者，另一个指向“11.bulletin.php”页面，用于返回佈告欄列表。
                <table border=1> //输出一个HTML表格，设置边框为1。
                    <tr><td></td><td>帳號</td><td>密碼</td></tr>"; //输出表格的标题行，包含列标题：帳號和密碼。
            
            $conn=mysqli_connect("120.105.96.90", "immust", "immustimmust", "immust"); //连接到MySQL数据库服务器，使用主机地址“
            $result=mysqli_query($conn, "select * from user"); //执行SQL查询，查询“user”表中的所有记录，并将结果存储在$result变量中。
            while ($row=mysqli_fetch_array($result)){ //使用mysqli_fetch_array()函数从查询结果中逐行获取数据，并将每行数据存储在$row数组中。
                echo "<tr><td><a href=19.user_edit_form.php?id={$row['id']}>修改</a>||<a href=17.user_delete.php?id={$row['id']}>刪除</a></td><td>{$row['id']}</td><td>{$row['pwd']}</td></tr>"; //输出一个表格行，包含用户的账号和密码，并提供修改和删除的链接。修改链接指向“19.user_edit_form.php”页面，并传递当前记录的账号（id）作为参数；删除链接指向“17.user_delete.php”页面，并传递当前记录的账号（id）作为参数。
            }
            echo "</table>";
        }
    ?> 
    </body>
</html>