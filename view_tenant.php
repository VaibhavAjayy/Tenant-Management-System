<?php
error_reporting(0);
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
$sql="SELECT * FROM `login_details` WHERE usertype='user'";
$result=mysqli_query($data,$sql);
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
    .table_des{
        padding:20px; 
        font-size: 20px;
    }
    .table_td{
        padding:20px;
        background-color: aquamarine;
    }
    </style>
</head>
<body>
    <?php
    include'admin_sidebar.php';
    ?>
    <div class="content">
        <center>
        <h1><b>TENANT DATA</b></h1>
        <?php
        if($_SESSION['message'])
        {
            echo $_SESSION['message'];
        }
        unset($_SESSION['message']);
        ?>
        <br></br>
        <table border="2px">
            <tr>
                <th class="table_des">Username</th>
                <th class="table_des">Email</th>
                <th class="table_des">Phone</th>
                <th class="table_des">Password</th>
                <th class="table_des">Delete</th>
                <th class="table_des">Update</th>
            </tr>
            <?php
            while($info=$result->fetch_assoc())
            {
            ?>
            <tr>
                <td class="table_td">
                    <?php echo"{$info['username']}";?>
                </td>
                <td class="table_td">
                    <?php echo"{$info['email']}";?>
                </td>
                <td class="table_td">
                    <?php echo"{$info['phone']}";?>
                </td>
                <td class="table_td">
                    <?php echo"{$info['password']}";?>
                </td>
                <td class="table_td">
                    <?php echo "<a class='btn btn-danger' onClick=\"javascript:return confirm('You really want to Delete this?');\" href='delete.php?tenant_id={$info['id']}'>Delete</a>";?>
                </td>
                <td class="table_td">
                    <?php echo "<a class='btn btn-primary' href='update.php?tenant_id={$info['id']}'>Update</a>";?>
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