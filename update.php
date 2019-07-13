<?php
require_once 'config.php';
$q = isset($_GET["id"]) ? intval($_GET["id"]) : '';
$con=new mysqli(HOST,USER,PASS,DBNAME) or die("error");
// 设置编码，防止中文乱码
mysqli_set_charset($con, "utf8");

$sql="SELECT * FROM member WHERE id = '".$q."'";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result))
{
    $name=$row['name'];
    $pwd=$row['password'];
    $email=$row['email'];
    echo "
    <form method='post' action='updateView.php'>
    <input type=\"text\" name=\"id\"  hidden='true' value='$q'>
    name:<input type=\"text\" name=\"name\" placeholder=\"用户名\">--$name<br>
    password:<input type=\"password\" name=\"pwd\" placeholder=\"密码\">--$pwd<br>
    :mail:<input type=\"email\" name=\"email\" placeholder=\"邮箱\">--$email<br>
    <input type=\"submit\" name=\"update\" value=\"更改\">
    </form>";
}


mysqli_close($con);
?>