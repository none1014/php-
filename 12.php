<?php
    session_start(); //启动会话，以便在不同页面之间保存用户的登录状态。
    unset($_SESSION["id"]); //使用unset()函数删除会话变量$_SESSION["id"]，实现用户的登出功能。
    echo "登出成功...."; //输出登出成功的消息，提示用户已经成功登出。
    echo "<meta http-equiv=REFRESH content='3; url=2.login.html'>"; //使用HTML的meta标签实现页面自动跳转，3秒后跳转到登录页面“2.login.html”，让用户重新登录。
?>