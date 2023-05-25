<html>
    <head>
        <title>My first PHP Website</title>
    </head>
    <body>
        <h2>Registration Page</h2>
        <a href="../index.php">Click here to go back<br/><br/></a>
        <form  method="POST">
           Enter Username: <input type="text" 
           name="username" required="required" /> <br/>
           Enter password: <input type="password" 
           name="password" required="required" /> <br/>
           <input name='submit' type="submit" value="Register"/>
        </form>
    </body>
</html>

<?php
include "../conn.php";


if(isset($_POST['submit'])){
    $username=($_POST['username']);
    $password=($_POST['password']);
    echo $username;
    echo $password;
    $bool=true;
    $q=mysqli_query($con,"insert into users (username,password) values('$username','$password')");
    if(!$q){
        echo "Error";
    }
    else{
        echo"success";
    }

}
