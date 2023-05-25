<?php
include "../conn.php";
session_start();

$username=$_POST["username"];
$password=$_POST["password"];

$q=mysqli_query($con,"select * from users where username='$username' ");

$exists=mysqli_num_rows($q);

$table_password='';

$table_users='';
if($exists>0){

    while($row=mysqli_fetch_assoc($q)){
    
    $table_users=$row['username'];
    $table_password=$row['password'];
    
    }
    if(($username==$table_users) && ($password==$table_password)){
        $_SESSION['user']=$username;
        header('Location: ../Home/home.php');

    }
    else{
        echo "incorrect username  or password";
        header("location: https://www.google.com/");

    }
   
} else{
 echo "user does not exist";       
}







?>