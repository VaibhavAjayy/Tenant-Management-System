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
$id=$_GET['prop_id'];
if($id){
    $sql="SELECT * FROM `property1` WHERE id='$id'";
    $result=mysqli_query($data,$sql);
    $info=$result->fetch_assoc();
}

if(isset($_POST['update']))
{
    $name=$_POST['name'];
    $fl=$_POST['floor'];
    $ro=$_POST['room'];
    $file=$_FILES['image']['name'];
    $dst="./prop_images/".$file;
    $dst_db="prop_images/".$file;

    move_uploaded_file($_FILES['image']['tmp_name'],$dst);

    if($file)
    {
        $query="UPDATE `property1` SET `name`='$name',`floor`='$fl',`room`='$ro',`image`='$dst_db' WHERE id='$id'";
    }
    else{
        $query="UPDATE `property1` SET `name`='$name',`floor`='$fl',`room`='$ro' WHERE id='$id'";
    }
    $result2=mysqli_query($data,$query);
    if($result2)
    {
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
        <h1><b>UPDATE PROPERTY</b></h1>
        <div class="dev_des">
            <form action="#" method="POST" enctype="multipart/form-data">
                <div>
                    <label>Username</label>
                    <input type="text" name="name" value="<?php echo "{$info['name']}";?>">
                </div>
                <div>
                    <label>Floors </label>
                    <input type="text" name="floor" value="<?php echo "{$info['floor']}";?>">
                </div>
                <div>
                    <label>Rooms </label>
                    <input type="text" name="room" value="<?php echo "{$info['room']}";?>">
                </div>
                <div>
                    <label>Old Image:</label>
                    <img width="200px" height="200px" src="<?php echo "{$info['image']}";?>">
                </div>
                <div>
                    <label>New Image:</label>
                    <input type="file" name="image">
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