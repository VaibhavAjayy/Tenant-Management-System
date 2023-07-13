
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
if(isset($_POST['add_bill']))
{
    $property=$_POST['prop'];
    $floor=$_POST['floor'];
    $room=$_POST['room'];
    $e_bill=$_POST['electric'];
    $w_bill=$_POST['water'];
    $rent=$_POST['rent'];
    $total=$_POST['total'];
    

    $sql="INSERT INTO `bill`(`property`, `floor`, `room`, `ebill`, `wbill`, `rent`,`total`) VALUES('$property','$floor','$room','$e_bill','$w_bill','$rent','$total')";
 
    $result=mysqli_query($data,$sql);
    if($result)
    {
        header('location:add_bill.php');
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
        <h1><b>ADD BILL DETAILS</b></h1>
        <div class="div_des">
            <form action="#" method="POST" enctype="multipart/form-data">
                <div>
                    <label>Property Name:</label>
                    <input type="text" name="prop">
                </div>
                <br>
                <div>
                    <label>Floor No:</label>
                    <input type="text" name="floor">
                </div>
                <br>
                <div>
                    <label>Room No:</label>
                    <input type="text" name="room">
                </div>
                <br>
                <div>
                    <label>Electricity  Bill:</label>
                    <input type="text" name="electric">
                </div>
                <br>
                <div>
                    <label>Water  Bill:</label>
                    <input type="text" name="water">
                </div>
                <br>
                <div>
                    <label>Rent:</label>
                    <input type="text" name="rent">
                </div>
                <br>
                <div>
                    <label>Total Amount:</label>
                    <input type="text" name="total">
                </div>
                <br>
                <div>
                    <input type="submit" class="btn btn-primary" name="add_bill" value="Add Bill">
                </div>
            </form>
        </div>
        </center>
    </div>
</body>
</html>