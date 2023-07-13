<?php
session_start();
if(!isset($_SESSION['username']))
{
    header("location:login.php");
}
else if($_SESSION['usertype'] == 'admin')
{
    header("location:login.php");
}
$host="localhost";
$user="root";
$password=""; 
$db="users";

$data=mysqli_connect($host,$user,$password,$db);
$name=$_SESSION['username'];
$sql="SELECT * FROM `login_details` WHERE username='$name'";
$result=mysqli_query($data,$sql);
$info=mysqli_fetch_assoc($result);
if(isset($_POST['update_profile']))
{
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $password=$_POST['password'];
    $query="UPDATE `login_details` SET email='$email',phone='$phone',password='$password' WHERE username='$name'";
    $result2=mysqli_query($data,$query);
    if($result2)
    {
        header("location:tenant_profile.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN DASHBOARD</title>
    <?php
    include 'user_css.php';
    ?>
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
</head>
<body>
    <?php
    include 'user_sidebar.php';
    ?>
    <div class="content">
        <center>
            <h1><b>UPDATE PROFILE</b></h1>
            <br>
        <form action="#" method="POST">
            <div class="div_des">
            
            <div>
                <label>Email</label>
                <input type="email" name="email"
                value="<?php echo "{$info['email']}";?>">
            </div>
            <div>
                <label>Phone</label>
                <input type="number" name="phone"
                value="<?php echo "{$info['phone']}";?>">
            </div>
            <div>
                <label>Password</label>
                <input type="text" name="password"
                value="<?php echo "{$info['password']}";?>">
            </div>
            <div>
                <input type="submit" class="btn btn-success" name="update_profile" value="Update">
            </div>
            </div>
        </form>
        </center>
    </div>
</body>
</html>