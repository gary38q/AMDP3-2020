<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History Page</title>
    <link rel="stylesheet" type="text/css" href="bootstrap-4.5.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="index.css">
    <script src="bootstrap-4.5.3-dist/jquery.min.js"></script>
    <script src="bootstrap-4.5.3-dist/js/bootstrap.bundle.js"></script>
</head>
<body >
    
<?php
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
     <li><a style=color:black;text-decoration:none; href="#">&nbsp Shopping History</a></li>
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
     <li><a style=color:black;text-decoration:none; href="#">&nbsp Shopping History</a></li>
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
     <li><a style=color:black;text-decoration:none; href="#">&nbsp Shopping History</a></li>
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
<h1>History page</h1>
<h1>MASIH TIDAK ADA PRODUK</h1>