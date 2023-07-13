<?php
session_start();
$host="localhost";
$user="root";
$password=""; 
$db="users";
$data=mysqli_connect($host,$user,$password,$db);
if($data===false) 
{
    die("Connection Error");
}
if(isset($_POST['submit']))
{
    $data_name = $_POST['name'];
    $data_email = $_POST['email'];
    $data_phone = $_POST['phone'];
    $data_message = $_POST['message'];

    $sql = "INSERT INTO request(name,email,phone,message) VALUES('$data_name','$data_email','$data_phone','$data_message')";

    $result = mysqli_query($data,$sql);

    if($result)
    {

        $_SESSION['message']= "YOUR REQUEST SUBMITTED SUCCESSFULLY!";
        header("location:index.php");
    }
    else
    {
        echo "SUBMIT FAILED!";
    }
}
?>