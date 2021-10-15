<?php
    $Name = $_POST['nama'];
    $Gender = $_POST['Radio'];
    $Address = $_POST['Add'];
    $Number = $_POST['Num'];
    $email = $_POST['email'];
    $password = $_POST['Password'];
    $Role = "USER";
    $salt = "Garam";
    $password = md5($salt.$password);
    
    include('Connect.php');
    if(!$connect)
    {
        die ("tidak bisa connect").mysqli_error($connect);
    }

    $SELECT = "SELECT email From data_user Where email = ? Limit 1";
    $INSERT = "INSERT INTO data_user (Email, Nama, Gender, Address, Phone, Password, Role) 
    VALUES (?,?,?,?,?,?,?)";
    $INSERTImage = "INSERT INTO data_user (Email, Nama, Gender, Address, Phone, Password, Image, Role) VALUES(?,?,?,?,?,?,?,?)";
    

    $stmt = $connect->prepare($SELECT);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($email);
    $stmt->store_result();
    $rnum = $stmt->num_rows;

        if($_FILES["PP"]["size"] > 2097152 ){
            $message= "Image Max Size 2 MB";
        echo "<script type='text/javascript'>alert('$message');
        window.location.replace('Signup.html')
        </script>";
        die();
        }

    if ($rnum==0) {
        if (getimagesize($_FILES['PP']['tmp_name']) == false){
            $stmt->close();
            $stmt = $connect->prepare($INSERT);
            $stmt->bind_param ("ssssiss" , $email, $Name, $Gender, $Address, $Number, $password, $Role);
            $stmt->execute();
            
            $message = "Register Successful";
            echo "<script type='text/javascript'>alert('$message');
            window.location.replace('Login.html');
            </script>";
        }
        else{
            $imgData = $_FILES['PP']['tmp_name'];
            $imgData = base64_encode(file_get_contents(addslashes($imgData)));

            $stmt->close();
            $stmt = $connect->prepare($INSERTImage);
            $stmt->bind_param("ssssisss", $email, $Name, $Gender, $Address, $Number, $password, $imgData, $Role);
            $stmt->execute();
        $message = "Register Successful";
            echo "<script type='text/javascript'>alert('$message');
            window.location.replace('Login.html');
            </script>";
            
       }
    }
        else {
            $message = "Someone already use this Email or Username";
            echo "<script type='text/javascript'>alert('$message');
            window.location.replace('Signup.html');
            </script>";
            
       }

       $stmt->close();
       $connect->close();

?>