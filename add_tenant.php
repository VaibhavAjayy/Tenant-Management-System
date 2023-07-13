<?php
session_start();
if(!isset($_SESSION['username']))
{
    header("location:login.php");
}
else if($_SESSION['usertype'] == 'user')
{
    header("location:login.php");
}
$host="localhost";
$user="root";
$password=""; 
$db="users";

$data=mysqli_connect($host,$user,$password,$db);
if(isset($_POST['add_tenant']))
{
    $username=$_POST['name'];
    $user_email=$_POST['email'];
    $user_phone=$_POST['phone'];
    $user_password=$_POST['password'];
    $usertype="user";

    $check="SELECT * FROM `login_details` WHERE username='$username'";
    $check_user=mysqli_query($data,$check);

    $row_count=mysqli_num_rows($check_user);
    if($row_count == 1)
    {
        echo "<script type='text/javascript'>
           alert('Username Already Exists!');
           </script>";
    }
    else
    {
       

       $sql="INSERT INTO `login_details` (`username`, `phone`, `email`, `usertype`, `password`) VALUES ('$username', '$user_phone', '$user_email', '$usertype', '$user_password')";
   
       $result=mysqli_query($data,$sql);
   
       if($result)
       {
           echo "<script type='text/javascript'>
           alert('Data Uploaded Successfully!');
           </script>";
       }
       else{
           echo"Data Upload Failed";
       }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN DASHBOARD</title>
    <style type="text/css">
        label{
            display:inline-block;
            text-align: right;
            width:100px;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        .div_des{
           background-color: aquamarine;
            width: 400px;
            padding-top: 70px;
            padding-bottom: 70px;
        }
    </style>
    <?php
    include'admin_css.php';
    ?>
</head>
<body>
    <?php
    include'admin_sidebar.php';
    ?>
    <div class="content">
        <center>
        <h1><b>ADD TENANT</b></h1>
        <div class="div_des">
            <form action="#" method="POST">
                <div>
                    <label>Username</label>
                    <input type="text" name="name">
                </div>
                <div>
                    <label>Email</label>
                    <input type="email" name="email">
                </div>
                <div>
                    <label>Phone</label>
                    <input type="number" name="phone">
                </div>
                <div>
                    <label>Password</label>
                    <input type="text" name="password">
                </div>
                <div>
                    <input type="submit" class="btn btn-primary" name="add_tenant" value="Add Tenant">
                </div>
            </form>
        </div>
        </center>
    </div>
</body>
</html>