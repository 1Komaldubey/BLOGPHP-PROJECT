<?php
include "dbconn.php"; 
session_start();
error_reporting(0);
echo '<h1>'.$_SESSION['name']."   ". "WELCOME TO LOGIN PAGE</h1>".'</h1>';


$a = "SELECT * FROM roles";
$b = mysqli_query($conn,$a);
$count = mysqli_num_rows($b);
echo $count;

if($_POST['login'])
{
$email=$_POST['email'];
$password=$_POST['password'];
  


    $query = "SELECT email , password ,choice FROM roles WHERE email = '$email' AND password = '$password'";
    $choice = "SELECT choice FROM roles WHERE email = '$email'";
    $query_run = mysqli_query($conn,$query);
    $_SESSION['email']=$email;
    header("Location:side.php");
    // $choice_run = mysqli_query($conn,$choice);
    $data = mysqli_fetch_assoc($query_run);
    // $data_choice = mysqli_fetch_assoc($choice_run);
    // echo $data_choice['choice'];
    
    echo "email".$data['email'];
    echo "password".$data['password'];
    echo "choice".$data['choice'];
    
    if($data['email']==$email && $data['password'] == $password)
    {

        if($data['choice']==="admin")
        {
      header("Location:admin.php");
    }
    if($data['choice']==="manager")
    {
    header("Location:manager.php");
    }
    
    if($data['choice']==="customer")
    {
    header("Location:customer.php");
    }
    else{
        echo "email or passwrod does noit match";
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
            width:700px;
        }
        h1{
            font-size:30px;
            text-align:center;
            text-transform: uppercase;
            color:red;
        }
        
    </style>
</head>
<body>

    <form action="" method='post'>
<h1>LOGIN form</h1>
    

    
    <!-- <label for="email">email</label>
    <input type="text" name='email'>

    
    <label for="password">Password</label>
    <input type="password" name='password'>

    <input type="submit" value='Login' name='login'>
    </form> -->




     <!-- <h1><?php   echo $_SESSION['name']."WELCOME TO LOGIN PAGE" ?></h1> -->
    <div class="container">
    <div class="col-xl-12">
                    <div class="auth-form">
                        <div class="text-center mb-3">
                            <img src="https://demo.w3cms.in/cryptozone/public/storage/configuration-images/1673520377.image_2023_01_02T08_30_32_811Z.png">
                                <img width="150px" src="https://demo.w3cms.in/cryptozone/public/storage/configuration-images/1691144679.logo-text.png">
                                                    </div>
                        <h4 class="text-center mb-4">Register your account.</h4>
                        <form  action="https://demo.w3cms.in/cryptozone/register" method="post">
                            <input type="hidden" name="_token" value="NnvYbQuCb9qJqz51wVTqyOUH8PTwi968eEwRu8js">
                            <div class="form-group">
                                <label for="name" class="mb-1"><strong>Name</strong></label>
                                <input id="name" type="text" class="form-control " name="name" value="" placeholder="Full Name" required="" fdprocessedid="9s3hh">

                                                            </div>

                            <div class="form-group ">
                                <label for="login_email" class="mb-1"><strong>E-Mail</strong></label>
                                <input id="login_email" type="email" class="form-control " name="email" value="" placeholder="E-Mail Address" required="" fdprocessedid="jnfsor">

                                                            </div>
                            <div class="row">

                                <div class="form-group col-md-12">
                                    <label for="password" class="mb-1"><strong>Password</strong></label>
                                    <input id="password" type="password" class="form-control"  name="password" placeholder="Password" required="" fdprocessedid="fmt1l" >

                                </div>

                            <div class="text-center mt-4">
                                <input type="submit" class="btn btn-primary btn-block" fdprocessedid="u5fufn" value='Login' name='login'>
                            </div>
                        </form>
                        <div class="new-account mt-3">
                            <p>Dont't have an account. <a class="text-primary" href="register.php">Register</a></p>
                        </div>
                    </div>
                </div>
                </div>
    </body>
    </html> 

<!-- 
<body>
    
    <form>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html> -->
