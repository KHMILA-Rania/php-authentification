<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>
<?php
include "../conn.php";
session_start();
if (!isset($_SESSION['user'])){



    header("Location: ../index.php");
}
$user=$_SESSION['user'];
?>
<body>
    <h2>Home Page</h2>
    <p>Hello <?php  echo $user ?>!</p>
    <a href="../Login-Reg/logout.php" >Click here to log out</a>
    <form method="post" action="add.php">
        Add more to list : <input type="text" name="details"
/><br>
    Public post ? : <input type="checkbox" name="public[]" value="yes"
 /> <br>
 <input type="submit" name="submit" value="Add to list" />
   </form>

   <h2 >My list</h2>
   <table style="border: 1px solid ;width: 100%;">
    <tr>
        <th>Id</th>
        <th>Details</th>
        
        <th>Edit</th>
        <th>Delete</th>
        <th>Public post</th>
    </tr>    

<?php  
$q=mysqli_query($con,"select * from list");
while($rows=mysqli_fetch_assoc($q)){
    ?>
<tr>
     <td><?php 
      echo $rows['id']; ?></td> 
    <td><?php echo $rows['details']; ?></td> 
    
    <td><a href="edit.php">edit</a></td>   
    <td><a href="delete.php">delete</a></td>                    
    <td><?php echo $rows['public']; ?></td> 


<?php
}
			       



?>
</table>
</body>
</html>