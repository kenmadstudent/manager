<?php
session_start() ;
if($_POST)
{
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    //neu dang nhap dung
    if($username == 'admin' && $password == 'admin')
    {
    	$_SESSION['username'] = $username ;
    }


 else{
        //neu dang nhap sai
        echo 'false';
    }
}
?>