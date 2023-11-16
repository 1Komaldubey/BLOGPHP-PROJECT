<?php 
session_start();
error_reporting(0);
 include "dbconn.php";
if($_POST['register'])
{
 
  $filename= $_FILES["uploadfile"]["name"];
  $tempname = $_FILES["uploadfile"]["tmp_name"];
  $folder = "images/".$filename;
  move_uploaded_file($tempname,$folder);
  echo $folder;
  $images=$_POST['uploadfile'];
  $_SESSION['image']=$images;
$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
$cpassword=$_POST['cpassword'];
$choice=$_POST['choice'];
//echo $name,$email,$password,md5($cpassword),$choice;
$unique_email= "SELECT * FROM roles WHERE email='$email'";
$sql=mysqli_query($conn,$unique_email);
$rows = mysqli_num_rows($sql);
if($rows>0)
{
    echo '<script>
    alert("data altraedy exists");
    </script>';
}
else{

    // $query="INSERT INTO customers (first_name,last_name) VALUES('$FNAME','$LNAME')";
    $query="INSERT INTO roles (name,image,email,password,cpassword,choice) VALUES ('$name','$folder','$email','$password','$cpassword','$choice');";

    if($password===$cpassword){

    $inser_query=mysqli_query($conn,$query);
    $_SESSION['name']= $name;
    header("Location:login.php");
    }
    else{
        echo '<script>
    alert("password doesn not match");
    </script>';
    }
}

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
    
    .container{
        display:flex;
            justify-content:center;
            align-item:center;
        width:890px;
        margin-top:100px;
        margin-left:190px;
        
        padding-left:50px;
}
input{
    width:190px;
}

    
    .reg{
        margin-top:50px;
        font-size:30px;
        text-align:center;
    }
    .submit{
        width:100%;
        background-color: rgb(255,99,71);
        height:50px;
        font-weight:700;

    }
    p{
        text-align:center;
    }
</style>
</head>
<!-- <body>
<form action="" method='post'>
<h1>Registration form</h1>
    <label for="Name">Name</label>
    <input type="text" name='name'>
   <label for="email">email</label>
    <input type="text" name='email'>
     <label for="password">Password</label>
    <input type="password" name='password'>
    <label for="password">Confirm Password</label>
    <input type="password" name='cpassword'>
     <select name="choice">
        <option value="admin">Admin</option>
        <option value="manager">Manger</option>
        <option value="customer">Customer</option>
    </select>

    <input type="submit" value='Registration' name='register'>
    </form>
</body>
</html> -->



<body>
    
    
    <form action="register.php" method='post' enctype="multipart/form-data">
        
    <h3 class="reg">Register your account</h3>
        <div class="container" >
            
        
        <div class="col-xl-6 col-md-6 sign text-center">
                    <div>
                        <div class="text-center my-5">
                                                            <img src="https://demo.w3cms.in/cryptozone/public/storage/configuration-images/1673520377.image_2023_01_02T08_30_32_811Z.png">
                                <img width="150px" src="https://demo.w3cms.in/cryptozone/public/storage/configuration-images/1691144679.logo-text.png">
                                                    </div>
                        <img src="https://demo.w3cms.in/cryptozone/public/images/log.png" class="education-img w-100">
                    </div>  
                </div>
        <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name='name'>
    <div class="img">
        <input type="file" value='Image' name='uploadfile'>
    </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name='email'>
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name='password'>
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name='cpassword'>
</div>

<div class="mb-3">
<select class="form-select" aria-label="Default select example" name='choice'>
  <option selected>Select Your Roles</option>
  <option value="admin">Admin</option>
  <option value="manager">Manager</option>
  <option value="customer">Customer</option>
</select>
</div>
  <input type="submit" class="btn btn-primary submit" name='register' value='Registration'>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </div>
</form>

</div>
<p>Don't have an account? <a class="text-primary" href="login.php">Login</a></p>
</body>

</html>