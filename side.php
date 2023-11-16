<?php
session_start();
error_reporting(0);
 include "dbconn.php";
$emails=$_SESSION['email'];
echo "emails=".$emails;

$query = "SELECT * FROM roles WHERE email = '$emails'";
$results=mysqli_query($conn,$query);
$data=mysqli_fetch_assoc($results);
//  $dp-image=$data['image'];



$filename= $_FILES["uploadfile"]["name"];
  $tempname = $_FILES["uploadfile"]["tmp_name"];
  $folder = "images/".$filename;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=h1, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>

    <script>
        $(document).ready(function(){
            $(".sub-btn").click(function(){
                $(this).next(".sub-menu").slideToggle();
            });
        });
        </script>
</head>
<style>
    .dp{
        position: relative;
        width:100px;
        height:100px;
        border-radius:10px;
        bottom:0px;
        left:90px;
        border:3px solid black;
    }
</style>
<body>
    
    <div class="side-bar">
        <div class="menu">
            <div class="item">
                <img src="<?php echo $data['image'];?>" alt="not found" class="dp"/>
                <div class="item">
                    <a href="dash.php">
                        <i class="fas fa-desktop"></i>
                        Dasboard
                    </a>
                </div>
                <div class="item">
                    <a class="sub-btn">
                        <i class="fas fa-table"></i>
                        Users
                        <i class="fas fa-angle-right dropdown"></i>
                        <div class="sub-menu">
                            <a href="add-user.php" class="sub-item">all user</a>
                            <a href="all-user.php" class="sub-item">add user</a>
                        
                        </div>
                    </a>
                </div>
                <div class="item"><a href="#"><i class="fas fa-th"></i>Forms</a></div>
                <div class="item">
                    <a class="sub-btn">
                        <i class="fas fa-cogs"></i>
                        Roles
                        <i class="fas fa-angle-right dropdown"></i>
                        <div class="sub-menu">
                            <a href="add.php" class="sub-item">add Roles </a>
                            <a href ='add-user.php' class="sub-item" name='add'>all users</a>
                            
                            
                        
                        </div>
                    </a>
                </div>
                <div class="item"><a href="#"><i class="fas fa-info-circle"></i>About</a></div>
            </div>
        </div>
    </div>