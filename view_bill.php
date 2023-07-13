<?php
session_start();
error_reporting(0);
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
$sql="SELECT * FROM `bill`";
$result=mysqli_query($data,$sql);

if($_GET['bill_id'])
{
    $bId=$_GET['bill_id'];
    $query="DELETE  FROM `bill` WHERE id = '$bId'";
    $result2=mysqli_query($data,$query);

    if($result2)
    {
        $_SESSION['message']='Data deleted Successfully!';
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
    .table_th{
        padding:20px; 
        font-size: 15px;
    }
    .table_td{
        padding: 20px;
        background-color: aquamarine;
        font-size: 15px;
    }
    </style>
</head>
<body>
    <?php
    include'admin_sidebar.php';
    ?>
    <div class="content">
        <center>
        <h1><b>BILL DATA</b></h1>
        <table border="2px">
            <tr>
                <th class="table_th">Property Name</th>
                <th class="table_th">Floor No.</th>
                <th class="table_th">Room No.</th>
                <th class="table_th">Electricity Bill</th>
                <th class="table_th">Water Bill</th>
                <th class="table_th">Rent</th>
                <th class="table_th">Total</th>
                <th class="table_th">Delete</th>
                <th class="table_th">Update</th>
            </tr>
            <?php
            while($info=$result->fetch_assoc())
            {
            ?>
            <tr>
                                
                <td class="table_td">
                    <?php echo"{$info['property']}";?>
                </td>
                <td class="table_td">
                    <?php echo"{$info['floor']}";?>
                </td>
                <td class="table_td">
                    <?php echo"{$info['room']}";?>
                </td>
                <td class="table_td">
                    <?php echo"{$info['ebill']}";?>
                </td>
                <td class="table_td">
                    <?php echo"{$info['wbill']}";?>
                </td>

                <td class="table_td">
                    <?php echo"{$info['rent']}"; ?>
                
                </td>
                <td class="table_td">
                    <?php echo"{$info['total']}"; ?>
                
                </td>
                <td class="table_td">
                    <?php 
                    echo                 
                    "<a class='btn btn-danger'
                    onClick=\"javascript:return confirm('You really want to Delete this?');\" 
                    href='view_bill.php?bill_id={$info['id']}'>Delete</a>";
                    ?> 
                </td>
                <td class="table_td">
                    <?php echo "<a class='btn btn-primary' href='update_bill.php?bill_id={$info['id']}'>Update</a>"; ?>
                </td>
            </tr>
            <?php
            }
            ?>
        </table>
        </center>
    </div>
</body>
</html>