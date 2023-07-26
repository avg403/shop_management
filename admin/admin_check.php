<?php
include("connection.php");

$username=$_POST['name'];
$pass= $_POST['password'];

$sql = "SELECT * FROM ADMIN WHERE ADMIN_NAME='$username'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $res=mysqli_fetch_array($result);
    $username = $res['ADMIN_NAME'];
    $encpass = $res['A_PASSWORD'];
}
else{
    header ('location:index2.php?WAR=1');
    
}

if (mysqli_num_rows($result) > 0) {

    if(md5($pass) == $encpass){

        session_start();
        $SESSION['user']=$username;
        header ('location:admin.php');
    }
    else{
        header ('location:index2.php?WAR=2');
        }
    }
