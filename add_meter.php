
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
if(isset($_POST['add_meter']))
{
    $username=$_POST['name'];
    $type=$_POST['type'];
    $source1=$_POST['source1'];
    $ca1=$_POST['ca1'];
    $source2=$_POST['source2'];
    $ca2=$_POST['ca2'];

    $sql="INSERT INTO `meter_details`(`name`, `type`, `Source1`, `ca_1`, `Source2`, `ca_2`) VALUES('$username','$type','$source1','$ca1','$source2','$ca2')";
 
    $result=mysqli_query($data,$sql);
    if($result)
    {
        header('location:add_meter.php');
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
    include'admin_css.php';
    ?>
    <style type="text/css">
        .div_des{
           background-color: aquamarine;
            width: 400px;
            padding-top: 70px;
            padding-bottom: 50px;
        }
    </style>
</head>
<body>
    <?php
    include'admin_sidebar.php';
    ?>
    <div class="content">
        <center>
        <h1><b>ADD METER DETAILS</b></h1>
        <div class="div_des">
            <form action="#" method="POST" enctype="multipart/form-data">
                <div>
                    <label>Property Name:</label>
                    <input type="text" name="name">
                </div>
                <br>
                <div>
                    <label>Meter Type:</label>
                    <input type="text" name="type">
                </div>
                <br>
                <div>
                    <label>Source:</label>
                    <input type="text" name="source1">
                </div>
                <br>
                <div>
                    <label>CA No:</label>
                    <input type="text" name="ca1">
                </div>
                <br>
                <div>
                    <label>Source:</label>
                    <input type="text" name="source2">
                </div>
                <br>
                <div>
                    <label>CA No:</label>
                    <input type="text" name="ca2">
                </div>
                <br>
                <div>
                    <input type="submit" class="btn btn-primary" name="add_meter" value="Add Meter">
                </div>
            </form>
        </div>
        </center>
    </div>
</body>
</html>