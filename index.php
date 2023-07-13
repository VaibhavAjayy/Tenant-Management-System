<?php
error_reporting(0);
session_start();
session_destroy();
if($_SESSION['message'])
{
    $message=$_SESSION['message'];
    echo "<script type='text/javascript'> 
    alert('$message');
    </script>";
}
$host="localhost";
$user="root";
$password=""; 
$db="users";

$data=mysqli_connect($host,$user,$password,$db);

$sql="SELECT * FROM `expert`";
$result=mysqli_query($data,$sql);
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome!</title>
    <link rel="stylesheet" href="style.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>
<body> 
    <nav>
        <label class="logo ">Get Your Rented Home</label>
        <ul>
        <li><a href="">Home</a></li>
        <li><a href="">Contact</a></li>
        <li><a href="login.php" class="btn btn-success">Login</a></li>
        </ul>
    </nav>
    <div class="section1">
        <label class="img_text">We help you find the Best home!</label>
        <img class="main_img"src="img.jpg">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img class="welcome_img"src="img1.jpg">
            </div>
            <div class="col-md-8">
                <h1><b>Welcome! To Get Your Rented Home</b></h1>
                <p>Welcome to our exceptional platform, where the quest for your ideal rental home becomes an extraordinary experience. Immerse yourself in a world of limitless possibilities as you navigate through our vast selection of listings. With our advanced search filters and meticulous attention to detail, we have curated an unparalleled collection of rental properties that cater to your discerning taste. From luxurious apartments to charming cottages, each listing is accompanied by captivating visuals and comprehensive information to ignite your imagination. Embark on a seamless journey and discover the perfect abode that not only fulfills your needs but also transcends your expectations. Your dream rental home awaits, just a click away.</p>

            </div>
         </div>
    </div>
    <center>
        <h1><b>OUR EXPERTS</b></h1>
    </center>

    <div class="container">
        <div class="row">
            <?php
            while($info=$result->fetch_assoc())
            {
            ?>
            <div class="col-md-4">
                <img class="expert" src="<?php echo "{$info['image']}"?>">
                <h3><?php echo "{$info['name']}"?></h3>
                <h5><?php echo "{$info['description']}"?></h5>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
    <center>
        <h1><b>WE DEAL IN</b></h1>
    </center>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img class="expert" src="villa.jpg">
                <h3>Villas</h3>
            </div>
            <div class="col-md-4">
                <img class="expert" src="flat.jpeg">
                <h3>Flats</h3>
            </div>
            <div class="col-md-4">
                <img class="expert" src="apt.jpg">
                <h3>Apartments</h3>
            </div>
        </div>
    </div>
    <center>
        <h1 class="adm"><b>Tell us what you are looking for?</b></h1>
    </center>
    <div align="center" class="fm">
        <form action="data_check.php" method="POST">
            <div class="adm_int">
                <label class="label_txt">Name</label>
                <input class="ip_txt"type="text" name = "name">
            </div>
            <div class="adm_int">
                <label class="label_txt">Email</label>
                <input class="ip_txt"type="text" name = "email">
            </div>
            <div class="adm_int">
                <label class="label_txt">Mob_No</label>
                <input class="ip_txt"type="text" name = "phone">
            </div>
            <div class="adm_int">
                <label class="label_txt">Message</label>
                <textarea class="ip_msg" name="message"></textarea>
            </div>
            <div class="adm_int">
                <input class="btn btn-primary" id="submit"type="Submit"value="Submit" name="submit">
            </div>
        </form>
    </div>
    <footer>
        <h3 class="ft_txt">All @copyright reserved by <b>Vaibhav Ajayy</b></h3>
    </footer>
</body>
</html>