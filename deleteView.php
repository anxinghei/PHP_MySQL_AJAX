<?php
        require_once 'config.php';
    if (isset($_POST['delete'])){
        $con=new mysqli(HOST,USER,PASS,DBNAME) or die("error");
        $id=$_POST['id'];
        $sql="delete from member where id='$id'";
//        echo $sql;
        $res=$con->query($sql);
        if ($res)
            header('Location: http://localhost/TestTest/login_register/mainView.php');
        else
            echo "error";
    }
?>

<form   method="post" action="">
    <input type="text" name="id" placeholder="要删除的用户ID"><br>
    <input type="submit" name="delete" value="确认删除">
</form>
