<?php
session_start();
$host="localhost";
$user="root";
$password="";
$db="users";
$data=mysqli_connect($host,$user,$password,$db);
if($_GET['tenant_id'])
{
    $userId=$_GET['tenant_id'];
    $sql="DELETE FROM `login_details` WHERE id = '$userId'";
    $result=mysqli_query($data,$sql);

    if($result)
    {
        $_SESSION['message']='Data deleted Successfully!';
        header("location:view_tenant.php");
    }
}
?>