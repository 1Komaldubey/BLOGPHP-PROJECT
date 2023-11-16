<?php    include 'dbconn.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="add.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>

        <style>
   .containers{
    margin-left:350px;
    padding: 10px;
    border:100px solid gray

   }
   p{
    font-size:100px;
   }
            </style>
</head>
<body>
    
    <?php 
    include "side.php";
    error_reporting(0);

    ?>
    <div class="containers">
        <div class="up">
            <h5>All Users</h5>
            

        </div>
        <table border='1'>
            <thead>
                <tr>
                    <th>S.NO</th>
                    <th>PROFILE</th>
                    <th>NAME</th>
                    <th>E-MAIL</th>
                    <th>ROLE</th>
                    <th>CREATED</th>
                    <th>ACTIONS</th>
                </tr>
            </thead>
            <?php 
            $read= "SELECT * FROM roles";
            $query= mysqli_query($conn,$read);
            $rows = mysqli_num_rows($query);
            while($results=mysqli_fetch_assoc($query))
            {
                ?>
                <tbody>
                <tr>
                    <td><?php   echo $results['id']?></td>
                    <td>
                        <img src="<?php echo $results['image']?>" alt="" width='50px' height='30px'>
                    </td>
                    <td><?php   echo $results['name'];?></td>
                    <td><?php   echo $results['email'];?></td>
                    <td><?php   echo $results['choice'];?></td>
                    <td><?php   echo $results['date'];?></td>
                    <td>
                        <a href="up.php?id=<?php echo $results['id']; ?>">UPDATE</a>
                        <a href="add-user.php?id=<?php echo $results['id'];?>">DELETE</a>
                    </td>
                </tr>
            </tbody>
           
<?php 
            }
            ?>
    
                
        </table>
    </div>
    
    </script>
    </div>
</body>
</html>
<?php


$delete_id=$_GET['id'];
$delete_query="DELETE FROM roles WHERE id='$delete_id'";
$data=mysqli_query($conn,$delete_query);
?>


