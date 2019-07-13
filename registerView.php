<?php
require_once 'config.php';
if (isset($_POST['register'])){
    if($_POST['name2']==''){
        echo "请输入用户名<br/>";
    }
    elseif($_POST['pwd2']==''){
        echo "请输入密码<br/>";
    }
    elseif($_POST['email']==''){
        echo "请输入联系邮箱<br/>";
    }
    else{
        $name2=$_POST['name2'];
        $pwd2=$_POST['pwd2'];
        $email=$_POST['email'];
        $con=new mysqli(HOST,USER,PASS,DBNAME) or die("error");
        $sql="select count(password) from member where name='$name2'";
//    echo $sql;
//    echo "<br>";
        $res=$con->query($sql);
//    var_dump($res);
//    echo "<br>";
        $obj=$res->fetch_array();
//    echo $obj[0];
//    echo "<br>";
        if($obj[0]==0){
            session_start();
            $_SESSION['name']=$name2;
            $sql="insert into member(name,password,email) values('$name2','$pwd2','$email')";
            $res=$con->query($sql);
            if ($res)
                header('Location: http://localhost/TestTest/mainView.php');
            else
                echo "注册失败";

        }
        else
            echo "用户已存在";
    }

}
?>

<form action="registerView.php" method="post" >
    名字：<input type="text" name="name2" placeholder="登录时用户名" /><br/>
    密码：<input type="text" name="pwd2" placeholder="用户的密码" /><br/>
    邮箱：<input type="text" name="email"  placeholder="联系邮箱"/><br/>
    <input type="submit" name="register" value="注册">
</form>
