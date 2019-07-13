<?php
	require_once 'config.php';
	if (isset($_POST['submit'])){
		$name=$_POST['name'];
        $pwd=$_POST['pwd'];
		$con=new mysqli(HOST,USER,PASS,DBNAME) or die("error");
		$sql="select * from member where name='$name' and password='$pwd'";
//		echo $sql;
		$res=$con->query($sql);
        $nums=$res->num_rows;
//        echo $nums;
        $obj=$res->fetch_array();
//        echo $obj['id'];
        if($nums==0)
            echo "用户名或密码错误<br/>";
        else{
            session_start();
            $_SESSION['name']=$name;
            $_SESSION['id']=$obj['id'];
            header('Location: http://localhost/TestTest/login_register/mainView.php');

        }
	}
?>

<form action="" method="post" >
	名字：<input type="text" name="name" value="test" /><br/>
    密码：<input type="text" name="pwd" value="test" /><br/>
	<input type="submit" name="submit" value="登录">
    <input type="button" onclick="window.location.href = 'registerView.php'" value="注册">
</form>
