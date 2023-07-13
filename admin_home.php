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
</head>
<body>
    <?php
    include'admin_sidebar.php';
    ?>
    <div class="content">
        <h1><b>ADMIN DASHBOARD</b></h1>
    </div>
</body>
</html>