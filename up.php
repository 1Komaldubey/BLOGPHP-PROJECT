<?php
include "dbconn.php";
 $id= $_GET['id'];

$query= "SELECT * FROM roles WHERE id = '$id'";
$data = mysqli_query($conn,$query);
$results = mysqli_fetch_assoc($data);


if(isset($_POST["update"]))
{
   $name = $_POST['name'];
   $email = $_POST['email'];

$update_query = "UPDATE roles SET name = '$name' , email = '$email' WHERE id = '$id'";
$queryrun= mysqli_query($conn,$update_query);
$_SESSION['email']=$emails;

if($queryrun)
{
    echo '<p class="text-success">Updated Successfully..</p>';
    header("Location:admin.php");
}
}
else{
    echo '<p class="text-info">Please Update Your Data..</p>';
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
        .text-dark{
            margin-left:150px;
            font-size:28px;
            margin-top:59px;
        }
    </style>

</head>




<body>


    <!-- <form action="" method='post'>
    <label for="name" >Name</label>
   <input type="text" name='name'   value="<?php echo $results['name']?>">
   <label for="email">EMAIL</label>
   <input type="text" name='email' value="<?php echo $results['email']?>">

<input type="submit" value='UPDATE' name='update'>
</form> -->
  
<p class="text-dark ">Update form</p>
<div class="container w-200 p-3 my-5" style="background-color: #eee; height:300px;" >

<form action='' method='post'>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    <input type="text" value="<?php echo $results['name']?>"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name='name'>
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Email</label>
    <input type="email"  value="<?php echo $results['email']?>" class="form-control" id="exampleInputPassword1" name='email'>
  </div>
  
  <button type="submit" class="btn btn-primary" name='update'>Update</button>
</form>
</div>



</body> 

</html> 







