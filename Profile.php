<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" type="text/css" href="bootstrap-4.5.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="index.css">
    <script src="bootstrap-4.5.3-dist/jquery.min.js"></script>
    <script src="bootstrap-4.5.3-dist/js/bootstrap.bundle.js"></script>
    <script>function CHECK_Data(){  

let result = true

let Name = document.getElementById('Name').value
let Address = document.getElementById('Address').value
let Number = document.getElementById('Number').value

let Name_Error = document.getElementById('Name_Error')
let Address_Error = document.getElementById('Address_Error')
let Number_Error = document.getElementById('Number_Error')


if(Name == 0){
    Name_Error.innerHTML = ""
}
else if(Name.length <3){
    Name_Error.innerHTML = "Minimal 3 Huruf"
    result = false
}
else{
    Name_Error.innerHTML = ""
}

if(Address == 0){
    Address_Error.innerHTML = ""
}
else if(Address.length < 10){
    Address_Error.innerHTML = "Minimal 10 Karakter"
    result = false
}
else{
    Address_Error.innerHTML = ""
}

if(Number == 0){
    Number_Error.innerHTML = ""
}
else if(Number.length < 10){
    Number_Error.innerHTML = "Minimal 10 Karakter"
    result = false
}
else{
    Number_Error.innerHTML = ""
}

return result
}</script>

<script>
function Change(){
    
    let result = true

    let Cu_Password = document.getElementById('Cu_Password').value
    let N_Password = document.getElementById('N_Password').value
    let Co_Password = document.getElementById('Co_Password').value

    let Cu_Pass_Error = document.getElementById('Cu_Pass_Error')
    let N_Pass_Error = document.getElementById('N_Pass_Error')
    let Co_Pass_Error = document.getElementById('Co_Pass_Error')

    if(Cu_Password.length <6){
        Cu_Pass_Error.innerHTML = "Minimal 6 Karakter"
        result = false
    }
    else{
        Cu_Pass_Error.innerHTML = ""
    }

    if(N_Password.length <6){
        N_Pass_Error.innerHTML = "Minimal 6 Karakter"
        result = false
    }
    else{
        N_Pass_Error.innerHTML = ""
    }

    if(Co_Password != N_Password){
        Co_Pass_Error.innerHTML = "Harus Sesuai dengan Password"
        result = false
    }
    else{
        Co_Pass_Error.innerHTML = ""
    }
    return result
}
</script>
</head>
<body >
    
<?php
// Start Navbar

include('Connect.php');
session_start();
if($_SESSION !=NULL){
$query = "SELECT * FROM data_user WHERE ID=".$_SESSION["ID"];
$result = mysqli_query($connect,$query);
$row = mysqli_fetch_array($result);

switch ($row['Role']) {
    case 'USER':?>
<a href="index.php"><img src="Logo JustStore.png" class="Gambar_Utama" style="margin-top: 15px;"></a>

<form action="#" >
    <input type="text" placeholder="Search" id="Pencari" style="margin-left: 10px; margin-top: 15px; height: 30px;width:60%;">
    <button type="submit" id="Tombol_Pencari" class="Tombol_Pencari" style="margin-left: 5px;margin-top: 15px;">
        <img src="Icon Search.png" ></button>
</form>

<a href="Cart.php"><img src="shopping-cart.png" style="float:left;width: 30px;margin-top: 15px;margin-left: 10px;"></a>

<div class="dropdown" style= float:right;margin-top:5px;margin-right:10px>
<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" 
data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style=background-color:white;color:black;border:0px>
<?php
if(empty($row['Image'])){
    echo '<img  height="40px" width="40px" style= "border-radius: 200px;-webkit-border-radius: 200px;
-moz-border-radius: 200px;" src=PP_Facebook.png>';
}
else{
echo '<img  height="40px" width="40px" style= "border-radius: 200px;-webkit-border-radius: 200px;
-moz-border-radius: 200px;" src=data:Image;base64,'.$row['Image'].'>';}
echo "&nbsp";
echo ($row['Nama'])?>
</button>
<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
<li><a style=color:black;text-decoration:none; href="History.php">&nbsp Shopping History</a></li>
<li><a style=color:black;text-decoration:none; href="Profile.php">&nbsp My Profile</a></li>
<li><a style=color:black;text-decoration:none; href="Logout.php">&nbsp Logout</a></li>
</ul>
</div>  
<?php
        break;
        // STAFF NAVBAR
        case 'STAFF':?>
<a href="index.php"><img src="Logo JustStore.png" class="Gambar_Utama" style="margin-top: 15px;"></a>

<form action="#" >
    <input type="text" placeholder="Search" id="Pencari" style="margin-left: 10px; margin-top: 15px; height: 30px;width:60%;">
    <button type="submit" id="Tombol_Pencari" class="Tombol_Pencari" style="margin-left: 5px;margin-top: 15px;">
        <img src="Icon Search.png" ></button>
</form>

<a href="Cart.php"><img src="shopping-cart.png" style="float:left;width: 30px;margin-top: 15px;margin-left: 10px;"></a>

<div class="dropdown" style=float:left;margin-top:5px;margin-left:3%>
<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" 
data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style=background-color:white;color:black;border:0px>
<img height="40px" width="50px" src="Menu_Tambahan.PNG" style="margin-top: 10px;">
</button>
<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
<li><a style=color:black;text-decoration:none; href="Manage_Cour.php">&nbsp Manage Couriers</a></li>
<li><a style=color:black;text-decoration:none; href="#">&nbsp Manage Categories</a></li>
<li><a style=color:black;text-decoration:none; href="#">&nbsp Manage Product</a></li>
</ul>
</div> 

<div class="dropdown" style= float:right;margin-top:5px;margin-right:10px>
<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" 
data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style=background-color:white;color:black;border:0px>
<?php

if(empty($row['Image'])){
    echo '<img  height="40px" width="40px" style= "border-radius: 200px;-webkit-border-radius: 200px;
-moz-border-radius: 200px;" src=PP_Facebook.png>';
}
else{
echo '<img  height="40px" width="40px" style= "border-radius: 200px;-webkit-border-radius: 200px;
-moz-border-radius: 200px;" src=data:Image;base64,'.$row['Image'].'>';}
echo "&nbsp";
echo ($row['Nama'])?>
</button>
<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
<li><a style=color:black;text-decoration:none; href="History.php">&nbsp Shopping History</a></li>
<li><a style=color:black;text-decoration:none; href="Profile.php">&nbsp My Profile</a></li>
<li><a style=color:black;text-decoration:none; href="Logout.php">&nbsp Logout</a></li>
</ul>
</div>  
<?php
        break;
        // ADMIN NAVBAR
        case 'ADMIN':?>
<a href="index.php"><img src="Logo JustStore.png" class="Gambar_Utama" style="margin-top: 15px;"></a>

<form action="#" >
    <input type="text" placeholder="Search" id="Pencari" style="margin-left: 10px; margin-top: 15px; height: 30px;width:60%;">
    <button type="submit" id="Tombol_Pencari" class="Tombol_Pencari" style="margin-left: 5px;margin-top: 15px;">
        <img src="Icon Search.png" ></button>
</form>

<a href="Cart.php"><img src="shopping-cart.png" style="float:left;width: 30px;margin-top: 15px;margin-left: 10px;"></a>

<div class="dropdown" style=float:left;margin-top:5px;margin-left:3%>
<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" 
data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style=background-color:white;color:black;border:0px>
<img height="40px" width="50px" src="Menu_Tambahan.PNG" style="margin-top: 10px;">
</button>
<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
<li><a style=color:black;text-decoration:none; href="See_Staff.php">&nbsp Manage Staff/Admin</a></li>
<li><a style=color:black;text-decoration:none; href="#">&nbsp Manage Slider</a></li>
<div class="dropdown-divider" style=border-color:#38b6ff></div>
<li><a style=color:black;text-decoration:none; href="Manage_Cour.php">&nbsp Manage Couriers</a></li>
<li><a style=color:black;text-decoration:none; href="#">&nbsp Manage Categories</a></li>
<li><a style=color:black;text-decoration:none; href="#">&nbsp Manage Product</a></li>
</ul>
</div> 

<div class="dropdown" style= float:right;margin-top:5px;margin-right:10px>
<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" 
data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style=background-color:white;color:black;border:0px>
<?php
if(empty($row['Image'])){
    echo '<img  height="40px" width="40px" style= "border-radius: 200px;-webkit-border-radius: 200px;
-moz-border-radius: 200px;" src=PP_Facebook.png>';
}
else{
echo '<img  height="40px" width="40px" style= "border-radius: 200px;-webkit-border-radius: 200px;
-moz-border-radius: 200px;" src=data:Image;base64,'.$row['Image'].'>';}
echo "&nbsp";
echo ($row['Nama'])?>
</button>
<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
<li><a style=color:black;text-decoration:none; href="History.php">&nbsp Shopping History</a></li>
<li><a style=color:black;text-decoration:none; href="Profile.php">&nbsp My Profile</a></li>
<li><a style=color:black;text-decoration:none; href="Logout.php">&nbsp Logout</a></li>
</ul>
</div>  
<?php
        break;
}
}
else{   
        ?>
        <a href="index.php"><img src="Logo JustStore.png" class="Gambar_Utama" style="margin-top: 15px;"></a>

    <form action="#" >
        <input type="text" placeholder="Search" id="Pencari" style="margin-left: 10px; margin-top: 15px; height: 30px;width:60%;">
        <button type="submit" id="Tombol_Pencari" class="Tombol_Pencari" style="margin-left: 5px;margin-top: 15px;">
            <img src="Icon Search.png" ></button>
    </form>
        <a class="Regis_Link" style=margin-top:10px;text-decoration:none; href="Signup.html">Register</a>
        <a class="Login_Link" style=margin-top:10px;text-decoration:none; href="Login.php">Login</a>
        <?php
    }


?><br><br><br>
   <center> <div style=width:200px;height:150px;>
    <?php
    //Start Profile
    
        if(empty($row['Image'])){
            echo '<img  height="200px" width="200px" style= "border-radius: 200px;-webkit-border-radius: 200px;
        -moz-border-radius: 200px;margin-top:30px;" src=PP_Facebook.png>';
        }
        else{
        echo '<img  height="200px" width="200px" style= "border-radius: 200px;-webkit-border-radius: 200px;
        -moz-border-radius: 200px;margin-top:30px;" src=data:Image;base64,'.$row['Image'].'>';}
    ?>
    </div>
    <button type="button" data-toggle="modal" data-target="#exampleModalCenter" style=background-color:transparent;border:none;>
    <img  height="40px" width="40px" style= "margin-left:150px;border-radius: 200px;-webkit-border-radius: 200px;
        -moz-border-radius: 200px;margin-top:30px;" src=ChangeImage.png></button>
<!-- PopUP -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Change Profile Picture</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
      <div class="modal-body">
          <form method="POST" onsubmit="return"enctype="multipart/form-data">
                <span><input action="" type="file" name="PP" class="form-control input-sm" accept=".png,.jpg,.jpeg" ></span>
                <span class="error" id="Image_Error"></span>
            </div>  
            <div class="modal-footer">
                <button type="submit" name="Submit_Image" class="btn btn-primary">Save changes</button>
            </div>
        </form>
            </div>
        </div>
        </div>
        <?php
            if(isset($_POST['Submit_Image'])){
                if($_FILES["PP"]["size"] > 2097152 ){
                    $message= "Image Max Size 2 MB";
                    echo "<script type='text/javascript'>alert('$message');
                    window.location.replace('Profile.php');
                    </script>";
                    die();
                    }
                else{
                    $UpdateImage = "UPDATE data_user SET Image = (?) WHERE ID = ". $_SESSION['ID'];
                    $imgData = $_FILES['PP']['tmp_name'];
                    if($imgData == true){
                    $imgData = base64_encode(file_get_contents(addslashes($imgData)));
                    $stmt = $connect->prepare($UpdateImage);
                    $stmt->bind_param("s", $imgData);
                    $stmt->execute();
                    if(mysqli_affected_rows($connect) > 0 ){
                        $message= "Image Updated";
                    echo "<script type='text/javascript'>alert('$message');
                    window.location.replace('Profile.php');
                    </script>";
                    }
                }
                    }
                }
                ?>


        <br><br>
    <hr style=border-color:#38b6ff;width:50%>
    <form action="#" method="POST" style=width:50%;text-align:left; onsubmit="return CHECK_Data()" class="RegisForm" >
                <div>
                    Nama 
                    <?php
                    echo '<span><input name="nama" type="text" placeholder="'.$row["Nama"].'" class="form-control input-sm" id="Name" ></span>'
                    ?>
                    <span class="error" id="Name_Error"></span>
                </div>
                <br>
                <div>
                    Gender<br>
                    <?php
                    if($row["Gender"]=="Male"){
                    echo'
                    <span><input type="radio" name="Radio" checked="checked" id="RadioM" value="Male">Male 
                    <input type="radio" name="Radio" id="RadioF" value="Female">Female</span><br>';}
                    else{
                    echo'
                    <span><input type="radio" name="Radio" id="RadioM" value="Male">Male 
                    <input type="radio" name="Radio" checked="checked" id="RadioF" value="Female">Female</span><br>';
                    }
                    ?>
                </div>
                <br>
                <div>
                    Address<br>
                    <?php
                    echo '<span><textarea name="Add" placeholder="'.$row["Address"].'" class="form-control input-sm" id="Address"></textarea></span>';
                    ?>
                    <span class="error" id="Address_Error"></span>
                </div>
                <br>
                <div>
                    Phone
                    <?php
                    echo'<span><input name="Num" type="number" placeholder='.$row["Phone"].' class="form-control input-sm" id="Number" name="Num" ></span>';
                    ?>
                    <span class="error" id="Number_Error"></span>
                </div>
                <br>
                <div>
                    Email<br>
                    <?php
                    echo '<h4>'.$row["Email"].'</h4>';
                    ?>
                </div>
                <br>
                <center>
                <button type="submit" name="Update" class="btn btn-primary" >Update</button><br><br>

                <?php
                
                // UPDATE Profile
                if(isset($_POST['Update'])){
                if(!empty($_POST['nama'])){
                    
                    $Name = $_POST['nama'];
                    $UpdateName = "UPDATE data_user SET Nama = (?) WHERE ID = ". $_SESSION['ID'];
                    $stmt = $connect->prepare($UpdateName);
                    $stmt->bind_param("s", $Name);
                    $stmt->execute();
                }

                if(!empty($_POST['Radio'])){
                    $Gender = $_POST['Radio'];
                    $UpdateRadio = "UPDATE data_user SET Gender = (?) WHERE ID = ". $_SESSION['ID'];
                    $stmt = $connect->prepare($UpdateRadio);
                    $stmt->bind_param("s", $Gender);
                    $stmt->execute();
                }

                if(!empty($_POST['Add'])){
                    $Address = $_POST['Add'];
                    $UpdateAdd = "UPDATE data_user SET Address = (?) WHERE ID = ". $_SESSION['ID'];
                    $stmt = $connect->prepare($UpdateAdd);
                    $stmt->bind_param("s", $Address);
                    $stmt->execute();
                }

                if(!empty($_POST['Num'])){
                    $Phone = $_POST['Num'];
                    $UpdateNum = "UPDATE data_user SET Phone = (?) WHERE ID = ". $_SESSION['ID'];
                    $stmt = $connect->prepare($UpdateNum);
                    $stmt->bind_param("i", $Phone);
                    $stmt->execute();
                }

                $message= "Profile Updated";
                echo "<script type='text/javascript'>alert('$message');
                window.location.replace('Profile.php');
                </script>";
            }
                
                ?>
                </form>

                <button class="btn btn-outline-primary"type="button" data-toggle="modal" data-target="#exampleModalCenter1" >Change Password</button>
                        <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Change Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
      <div class="modal-body">
          <form action="#" method="POST" onsubmit="return Change()">
                <div style=text-align:left;>
                    Current Password
                    <span><input type="password" name="Cu_Password" placeholder="Current Password" class="form-control input-sm" id="Cu_Password" required></span>
                    <span class="error" id="Cu_Pass_Error"></span>
                </div>
                <br>
                <div style=text-align:left;>
                    New Password
                    <span><input type="password" name="N_Password" placeholder="New Password" class="form-control input-sm" id="N_Password" required></span>
                    <span class="error" id="N_Pass_Error"></span>
                </div>
                <br>
                <div style=text-align:left;>
                    Confirm Password
                    <span><input type="password" name="Co_Password" placeholder="Confirm New Password" class="form-control input-sm" id="Co_Password" required></span>
                    <span class="error" id="Co_Pass_Error"></span>
                </div><br>
            </div>  
            <div class="modal-footer">
                <button type="submit" name="Submit_Pass" class="btn btn-primary">Save changes</button>
            </div>

            <?php
            if(isset($_POST['Submit_Pass'])){
                if(!empty($_POST['N_Password'])){
                $salt = "Garam";
                $password = $_POST['N_Password'];
                $password = md5($salt.$password);
                $Cu_password = $_POST['Cu_Password'];
                $Cu_password = md5($salt.$Cu_password);
                
                
                if($_SESSION["Password"] == $Cu_password){
                $UpdatePass = "UPDATE data_user SET Password = (?) WHERE ID = ". $_SESSION['ID'];
                $stmt = $connect->prepare($UpdatePass);
                $stmt->bind_param("s", $password);
                $stmt->execute();
                }
            }
            }
            ?>

        </form>
            </div>
        </div>
        </div>
                </center>

            <br>
            
        </div>

    </center>
</body>
</html>