<?php
    session_start();
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $salt = "Garam";
    $password = md5($salt.$password);
   
    if($_COOKIE["CookEmail"] != NULL & $_COOKIE["CookPass"]!= NULL){
        $_SESSION["ID"] = $_COOKIE["CookID"];
        $_SESSION["Email"] = $_COOKIE["CookEmail"];  
        $_SESSION["Password"] = $_COOKIE["CookPass"];
        $message = "Login Successful";
        echo "<script type='text/javascript'>alert('$message');
        window.location.replace('index.php');
        </script>";
    }
    else if(!isset($email)) {
        echo "<script type='text/javascript'>
        window.location.replace('Login.html');
        </script>";
    }
    include('Connect.php');
    if(!$connect)
    {
        die ("tidak bisa connect").mysqli_error($connect);
    }
    mysqli_select_db($connect,'juststore') or die("cannot select DB");
    $query=mysqli_query($connect,"SELECT * FROM data_user WHERE email='".$email."' AND password='".$password."'");  
    $numrows=mysqli_num_rows($query);
    
    if($numrows!=0)  
    {  
    while($row=mysqli_fetch_assoc($query))    
    {  
    $IDUser = $row['ID'];
    $DataEmail=$row['Email'];  
    $DataPassword=$row['Password'];  
    }

    if($DataEmail == $email && $DataPassword == $password)  
    {  
  
    $_SESSION["ID"] = $IDUser;
    $_SESSION["Email"] = $email;  
    $_SESSION["Password"] = $password;
    if($_POST["Remember"] == "ingat"){
        $hour = time() + 3600;
        setcookie('CookEmail',$email,$hour);
        setcookie('CookPass',$password,$hour);
        setcookie("CookID",$IDUser,$hour);
    }
    else {
        
    }
    $message = "Login Successful";
                echo "<script type='text/javascript'>alert('$message');
                window.location.replace('index.php');
                </script>";
                          
        
                
    }
    else {
        $message = "Email/Password Invalid";
        echo "<script type='text/javascript'>alert('$message');
        window.location.replace('Login.html');
        </script>";
    }
    }
    else {
        $message = "Email/Password Invalid";
        echo "<script type='text/javascript'>alert('$message');
        window.location.replace('Login.html');
        </script>";
    }
?>