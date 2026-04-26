<?php  
   $conn=mysqli_connect("120.105.96.90", "immust", "immustimmust", "immust"); //连接到MySQL数据库服务器，使用主机地址“
   $result=mysqli_query($conn, "select * from user"); //执行SQL查询，查询“user”表中的所有记录，并将结果存储在$result变量中。
   $login=FALSE; //初始化一个变量$login为FALSE，用于标记登录状态。
   while ($row=mysqli_fetch_array($result)) { //使用mysqli_fetch_array()函数从查询结果中逐行获取数据，并将每行数据存储在$row数组中。
     if (($_POST["id"]==$row["id"]) && ($_POST["pwd"]==$row["pwd"])) { //检查用户提交的账号和密码是否与数据库中的记录匹配。
       $login=TRUE; //如果账号和密码匹配，将$login变量设置为TRUE，表示登录成功。
       break; //跳出循环，不再继续检查其他记录。
     }
   } 
   if ($login==TRUE) { //如果登录成功，执行以下代码：
    session_start(); //启动会话，以便在不同页面之间保存用户的登录状态。
    $_SESSION["id"]=$_POST["id"]; //将用户的账号存储在会话变量$_SESSION["id"]中，以便在其他页面中使用。
    echo "登入成功"; //输出登录成功的消息。
    echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>";//使用HTML的meta标签实现页面自动跳转，3秒后跳转到“11.bulletin.php”页面。
   }

  else{ //如果登录失败，执行以下代码：
    echo "帳號/密碼 錯誤"; //输出登录失败的消息，提示用户账号或密码错误。
    echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>"; //使用HTML的meta标签实现页面自动跳转，3秒后跳转回登录页面“2.login.html”，让用户重新尝试登录。
  }
?>