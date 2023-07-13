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
    $name=$_POST['name'];
    $type=$_POST['type'];
    $source1=$_POST['source1'];
    $ca1=$_POST['ca1'];
    $source2=$_POST['source2'];
    $ca2=$_POST['ca2'];  
    
    $query= "UPDATE `meter_details` SET `name`='$name',`type`='$type',`Source1`='$source1',`ca_1`='$ca1',`Source2`='$source2',`ca_2`='$ca2' WHERE id='$id'";

    $result2=mysqli_query($data,$query);
    if($result2)
    {
        header("location:view_meter.php");
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
        <h1><b>UPDATE EXPERT</b></h1>
        <div class="dev_des">
            <form action="#" method="POST" enctype="multipart/form-data">
                <div>
                    <label>Name</label>
                    <input type="text" name="name" value="<?php echo "{$info['name']}";?>">
                </div>
                <div>
                    <label>type</label>
                    <input type="text" name="type" value="<?php echo "{$info['type']}";?>">
                </div>
                <div>
                    <label>Source</label>
                    <input type="text" name="source1" value="<?php echo "{$info['Source1']}";?>">
                </div>
                <div>
                    <label>CA No.</label>
                    <input type="text" name="ca1" value="<?php echo "{$info['ca_1']}";?>">
                </div>
                <div>
                    <label>Source</label>
                    <input type="text" name="source2" value="<?php echo "{$info['Source2']}";?>">
                </div>
                <div>
                    <label>CA No.</label>
                    <input type="text" name="ca2" value="<?php echo "{$info['ca_2']}";?>">
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