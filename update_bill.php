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
$id=$_GET['bill_id'];
if($id){
    $sql="SELECT * FROM `bill` WHERE id='$id'";
    $result=mysqli_query($data,$sql);
    $info=$result->fetch_assoc();
}

if(isset($_POST['update']))
{
    $property=$_POST['prop'];
    $floor=$_POST['floor'];
    $room=$_POST['room'];
    $e_bill=$_POST['electric'];
    $w_bill=$_POST['water'];
    $rent=$_POST['rent'];
    $total=$_POST['total'];
    
    $query= "UPDATE `bill` SET `property`='$property',`floor`='$floor',`room`='$room',`ebill`='$e_bill',`wbill`='$w_bill',`rent`='$rent',`total`='$total' WHERE id='$id'";

    $result2=mysqli_query($data,$query);
    if($result2)
    {
        header("location:view_bill.php");
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
        label{
            display:inline-block;
            text-align: right;
            width:100px;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        .dev_des{
           background-color: aquamarine;
            width: 400px;
            padding-top: 70px;
            padding-bottom: 70px;
        }
    </style> 
</head>
<body>
    <?php
    include'admin_sidebar.php';
    ?>
    <div class="content">
        <center>
        <h1><b>UPDATE BILL</b></h1>
        <div class="dev_des">
            <form action="#" method="POST" enctype="multipart/form-data">
                <div>
                    <label>Property:</label>
                    <input type="text" name="prop" value="<?php echo "{$info['property']}";?>">
                </div>
                <div>
                    <label>Floor No.</label>
                    <input type="text" name="floor" value="<?php echo "{$info['floor']}";?>">
                </div>
                <div>
                    <label>Room No.</label>
                    <input type="text" name="room" value="<?php echo "{$info['room']}";?>">
                </div>
                <div>
                    <label>Electricity Bill:</label>
                    <input type="text" name="electric" value="<?php echo "{$info['ebill']}";?>">
                </div>
                <div>
                    <label>Water Bill:</label>
                    <input type="text" name="water" value="<?php echo "{$info['wbill']}";?>">
                </div>
                <div>
                    <label>Rent:</label>
                    <input type="text" name="rent" value="<?php echo "{$info['rent']}";?>">
                </div>             
                <div>
                    <label>Total:</label>
                    <input type="text" name="total" value="<?php echo "{$info['total']}";?>">
                </div>             
                
                <div>
                    <input type="submit" class="btn btn-success" name="update" value="Update">
                </div>
            </form>
        </div>
        </center>
    </div>
</body>
</html>