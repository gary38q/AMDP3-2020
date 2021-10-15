<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Couriers Page</title>
    <link rel="stylesheet" type="text/css" href="bootstrap-4.5.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="index.css">
    <script src="bootstrap-4.5.3-dist/jquery.min.js"></script>
    <script src="bootstrap-4.5.3-dist/js/bootstrap.bundle.js"></script>

    <script>
        function Check_Cour(){

            let result = true

            let Name = document.getElementById('Name').value
            let Number = document.getElementById('Number').value

            let Name_Error = document.getElementById('Name_Error')
            let Number_Error = document.getElementById('Number_Error')

            if(Name.length <3){
                Name_Error.innerHTML = "Minimal 3 Huruf"
                result = false
            }
            else{
                Name_Error.innerHTML = ""
            }

            if(Number < 5000){
                Number_Error.innerHTML = "Minimal 5000"
                result = false
            }
            else{
                Number_Error.innerHTML = ""
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
</ul>   q
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

        <center><div style=width:80%>
            <h1 style=text-align:left;float:left;>Couriers</h1>
            
            <button style=background-color:#38b6ff;float:right; class="btn btn-primary"type="button" data-toggle="modal" data-target="#exampleModalCenter" ><h3>+ ADD</h3></button>
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Courier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
      <div class="modal-body">
          <form method="POST" onsubmit="return Check_Cour()" enctype="multipart/form-data">
                <div style=text-align:left;>
                    Name 
                    <span><input name="C_Name" type="text" placeholder="Courier Name" class="form-control input-sm" id="Name"  required></span>
                    <span class="error" id="Name_Error"></span>
                </div>
                <br>
                <div style=text-align:left;>
                    Cost
                    <span><input name="Cost" type="number" placeholder="5000" class="form-control input-sm" id="Number" name="Num" required></span>
                    <span class="error" id="Number_Error"></span>
                </div>
                <br>
                <div style=text-align:left;>
                    Icon
                    <span><input action="" type="file" name="PP"  class="form-control input-sm" accept=".png,.jpg,.jpeg,.gif,.svg"></span>
                    <span class="error" id="Image_Error"></span>
                </div><br>
            </div>  
            <div class="modal-footer">
                <button type="submit" name="Submit_COUR" class="btn btn-primary">Add Courier</button>
            </div>
        </form>
            </div>
        </div>
        </div>
                
             </center>
        <?php

        if(isset($_POST['Submit_COUR'])){
            if($_FILES["PP"]["size"] > 2097152 ){
                $message= "Image Max Size 2 MB";
                echo "<script type='text/javascript'>alert('$message');
                window.location.replace('Manage_Cour.php');
                </script>";
                die();
                }
            else{
                
                    $Name = $_POST['C_Name'];
                    $Cost = $_POST['Cost'];
                    $icon = $_FILES['PP']['tmp_name'];
                    $icon_name = $_FILES['PP']['name'];
                    if($icon == true){
                    $icon = base64_encode(file_get_contents(addslashes($icon)));
                    $AddCour = "INSERT INTO kurir (Nama, Cost, Icon, Icon_Name) VALUES (?,?,?,?)";
                    $stmt = $connect->prepare($AddCour);
                    $stmt->bind_param("siss", $Name, $Cost, $icon, $icon_name);
                    $stmt->execute();
                

                $message= "Courier Added Successfully";
                echo "<script type='text/javascript'>alert('$message');
                window.location.replace('Manage_Cour.php');
                </script>";
                }
            }
            }
                
            
            ?>
        
        <center><table class="table table-striped" style=border-color:#38b6ff;margin-top:5%;width:80%>
            <thead>
                <tr>
                <th scope="col" style=width:25%><h4>Name</h4></th>
                <th scope="col" style=width:25%><h4>Cost</h4></th>
                <th scope="col" style=width:35%><h4>Icon</h4></th>
                <th scope="col" style=width:15%><h4>Action</h4></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM kurir";
                $result = mysqli_query($connect,$query);
                while($row = mysqli_fetch_assoc($result)){
                    $name = $row['Nama'];
                    $id = $row['ID'];
                    $Cost = $row['Cost'];
                    $Icon_name = $row['Icon_Name'];
                    $Icon = $row['Icon'];

                    if(!empty($Icon)){
                        echo '<tr>
                        <th scope="row">'.$name.'</th>
                        <td>Rp.'.$Cost.'</td>
                        <td><img  height="30px" width="30px" src=data:Icon;base64,'.$Icon.'>'.$Icon_name.'</td>
                        <td><button type="button" data-toggle="modal" data-target="#exampleModalCenter2" style=background-color:transparent;border:none;>
                        <img  height="40px" width="40px" 
                            -moz-border-radius: 200px;margin-top:30px;" src=ChangeImage.png></button>
                            <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Change Courier</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                          <div class="modal-body">
                              <form method="POST" onsubmit="return"enctype="multipart/form-data">
                                    ID
                                    <h5>'.$row["ID"].'</h5>
                                    Name
                                    <span><input name="nama" type="text" placeholder="'.$row["Nama"].'" class="form-control input-sm" id="Name" ></span>
                                    <span class="error" id="Name_Error"></span>
                                    Cost
                                    <span><input name="nama" type="text" placeholder="'.$row["Cost"].'" class="form-control input-sm" id="Name" ></span>
                                    <span class="error" id="Name_Error"></span>
                                    Icon
                                    <span><input action="" type="file" name="PP" class="form-control input-sm" accept=".png,.jpg,.jpeg" ></span>
                                    <span class="error" id="Image_Error"></span><br>
                                    Last Update NOT DONE 
                                </div>  
                                <div class="modal-footer">
                                    <button type="submit" name="Submit_Image" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                                </div>
                            </div>
                            </div></td>
                      </tr>';
                    }
                }
                
                ?>
            </tbody>
        </table><center>
