<?php
    error_reporting(0); //关闭错误报告，防止在页面上显示错误信息。
    session_start(); //启动会话，以便在不同页面之间保存用户的登录状态。
    if (!$_SESSION["id"]) {
        echo "請先登入";
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>"; //使用HTML的meta标签实现页面自动跳转，3秒后跳转到登录页面“2.login.html”，让用户先登录。
    }
    else{
        echo "歡迎, ".$_SESSION["id"]."[<a href=12.logout.php>登出</a>] [<a href=18.user.php>管理使用者</a>] [<a href=22.bulletin_add_form.php>新增佈告</a>]<br>"; //输出欢迎消息，显示用户的账号，并提供登出、管理使用者和新增佈告的链接。
        $conn=mysqli_connect("120.105.96.90", "immust", "immustimmust", "immust"); //连接到MySQL数据库服务器，使用主机地址“
        $result=mysqli_query($conn, "select * from bulletin"); //执行SQL查询，查询“bulletin”表中的所有记录，并将结果存储在$result变量中。
        echo "<table border=2><tr><td></td><td>佈告編號</td><td>佈告類別</td><td>標題</td><td>佈告內容</td><td>發佈時間</td></tr>"; //输出一个HTML表格的标题行，包含列标题：佈告編號、佈告類別、標題、佈告內容和發佈時間。
        while ($row=mysqli_fetch_array($result)){ //使用mysqli_fetch_array()函数从查询结果中逐行获取数据，并将每行数据存储在$row数组中。
            echo "<tr><td><a href=26.bulletin_edit_form.php?bid={$row["bid"]}>修改</a>  //输出一个链接，指向“26.bulletin_edit_form.php”页面，并传递当前记录的佈告编号（bid）作为参数，用于修改该佈告。
            <a href=28.bulletin_delete.php?bid={$row["bid"]}>刪除</a></td><td>"; //输出一个链接，指向“28.bulletin_delete.php”页面，并传递当前记录的佈告编号（bid）作为参数，用于删除该佈告。
            echo $row["bid"]; //输出当前记录的佈告编号（bid）。
            echo "</td><td>"; //输出一个表格单元格的结束标签，并开始下一个单元格。
            echo $row["type"]; //输出当前记录的佈告類別（type）。
            echo "</td><td>"; 
            echo $row["title"]; //输出当前记录的标题（title）。
            echo "</td><td>";
            echo $row["content"]; //输出当前记录的佈告內容（content）。
            echo "</td><td>";
            echo $row["time"]; //输出当前记录的發佈時間（time）。
            echo "</td></tr>";
        }
        echo "</table>"; //输出表格的结束标签。
    
    }

?>