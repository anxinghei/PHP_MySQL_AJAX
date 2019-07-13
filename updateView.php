<?php
require_once 'config.php';
if (isset($_POST['update'])){
    $con=new mysqli(HOST,USER,PASS,DBNAME) or die("error");
    $id=$_POST['id'];
    $name=$_POST['name'];
    $pwd=$_POST['pwd'];
    $email=$_POST['email'];
    $sql="UPDATE member SET name='$name',password = '$pwd',email='$email' WHERE id = '$id'";
        echo $sql;
    $res=$con->query($sql);
    if ($res)
        header('Location: http://localhost/TestTest/login_register/mainView.php');
    else
        echo "error";
}
?>

    ID:<input type="text" name="id" placeholder="回车以确认" onchange="show(this.value)" ><br>
    <div id="txtHint">------</div>
<!--    name:<input type="text" name="name" placeholder="用户名"><br>-->
<!--    password:<input type="password" name="pwd" placeholder="密码"><br>-->
<!--    email:<input type="email" name="email" placeholder="邮箱"><br>-->
<!--    <input type="submit" name="update" value="更改">-->

<script type="text/javascript">
    function show(id)
    {
        if (window.XMLHttpRequest)
        {
            // IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
            xmlhttp=new XMLHttpRequest();
        }
        else
        {
            // IE6, IE5 浏览器执行代码
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","update.php?id="+id,true);
        xmlhttp.send();
    }
</script>