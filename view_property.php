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
$sql="SELECT * FROM `property1`";
$result=mysqli_query($data,$sql);

if($_GET['prop_id'])
{
    $propId=$_GET['prop_id'];
    $query="DELETE FROM `property1` WHERE id = '$propId'";
    $result2=mysqli_query($data,$query);

    if($result2)
    {
        $_SESSION['message']='Data deleted Successfully!';
        header("location:view_property.php");
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
        <h1><b>PROPERTIES</b></h1>
        <table border="2px">
            <tr>
                <th class="table_th">Property Name</th>
                <th class="table_th">No. of Floors</th>
                <th class="table_th">No. of Rooms</th>
                <th class="table_th">Image</th>
                <th class="table_th">Delete</th>
                <th class="table_th">Update</th>
            </tr>
            <?php
            while($info=$result->fetch_assoc())
            {
            ?>
            <tr>
                                
                <td class="table_td">
                    <?php echo"{$info['name']}";?>
                </td>
                <td class="table_td">
                    <?php echo"{$info['floor']}";?>
                </td>
                <td class="table_td">
                    <?php echo"{$info['room']}";?>
                </td>
                <td class="table_td">
                    <img height="200px" width="200px"src="<?php echo"{$info['image']}";?>">
                </td>
                <td class="table_td">
                    <?php 
                    echo                 
                    "<a class='btn btn-danger'
                    onClick=\"javascript:return confirm('You really want to Delete this?');\" 
                    href='view_property.php?prop_id={$info['id']}'>Delete</a>";
                    ?> 
                </td>
                <td class="table_td">
                    <?php echo "<a class='btn btn-primary' href='update_property.php?prop_id={$info['id']}'>Update</a>";?>
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