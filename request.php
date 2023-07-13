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

$sql="SELECT* FROM request";
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
    <style>
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
        <h1><b>REQUESTS</b></h1>
        <br>
        <table border="2px">
            <tr>
                <th style="padding:20px; font: size 15px;">Name</th>
                <th style="padding:20px; font: size 15px;">Email</th>
                <th style="padding:20px; font: size 15px;">Mob.No</th>
                <th style="padding:20px; font: size 15px;">Message</th>
            </tr>

            <?php
            while($info=$result->fetch_assoc()) 
            {
            ?>
            <tr>
                <td class="table_td"><?php echo"{$info['name']}";?></td>
                <td class="table_td"><?php echo"{$info['email']}";?></td>
                <td class="table_td"><?php echo"{$info['phone']}";?></td>
                <td class="table_td"><?php echo"{$info['message']}";?></td>
            </tr>
            <?php
            }
            ?>
        </table>
        </center>
    </div>
</body>
</html>
