
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
if(isset($_POST['add_expert']))
{
    $username=$_POST['name'];
    $desc=$_POST['description'];
    $file=$_FILES['image']['name'];
    $dst="./images/".$file;
    $dst_db="images/".$file;

    move_uploaded_file($_FILES['image']['tmp_name'],$dst);

    $sql="INSERT INTO `expert`(name,description,image) VALUES('$username','$desc','$dst_db')";
    $result=mysqli_query($data,$sql);
    if($result)
    {
        header('location:add_expert.php');
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
        <h1><b>ADD EXPERT</b></h1>
        <div class="div_des">
            <form action="#" method="POST" enctype="multipart/form-data">
                <div>
                    <label>Expert Name:</label>
                    <input type="text" name="name">
                </div>
                <br>
                <div>
                    <label>Description:</label>
                    <textarea name="description" cols="23" rows="5"></textarea>
                </div>
                <br>
                <div>
                    <label>Image:</label>
                    <input type="file" name="image">
                </div>
                <br>
                <div>
                    <input type="submit" class="btn btn-primary" name="add_expert" value="Add Expert">
                </div>
            </form>
        </div>
        </center>
    </div>
</body>
</html>