<?php 
include "../conn.php";
session_start();
if(!isset($_SESSION['user'])){
    header("Location: ../index.php");
    exit;
}
if(isset($_POST['submit'])){

    

$details=$_POST['details'];
$decision="no";

    if(isset($_POST['public'])){
    
    $details="yes";
    
    }

    $stmt = mysqli_prepare($con, "INSERT INTO list (details, public) VALUES (?, ?)");
    mysqli_stmt_bind_param($stmt, "ss", $details, $decision);
    mysqli_stmt_execute($stmt);
    if ($stmt->affected_rows > 0) {
        echo "New record created successfully.";
        header("Location: listBlog.php");
    } else {
        echo "Error: " . $stmt->error;
    }

/*mysqli_query($con,"insert into list (details,public) values (?,?)");
*/
header("location: home.php");
exit;}
else{
    header("location: https://www.google.com");
    exit;
}
?>