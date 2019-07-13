<?php
require_once 'config.php';
if (isset($_POST['get'])){
    $con=new mysqli(HOST,USER,PASS,DBNAME) or die("error");
    $id=$_POST['id'];
    $sql="select * from member where id='$id'";
//        echo $sql;
    $res=$con->query($sql);
    $obj=$res->fetch_array();
    if (!empty($obj))
        echo $obj['id']."- -".$obj['name']."- -".$obj['password']."- -".$obj['email'];
    else
        echo "NAN";
}
?>

<form   method="post" action="">
    <input type="text" name="id" placeholder="要查找的用户ID"><br>
    <input type="submit" name="get" value="搜索">
</form>
