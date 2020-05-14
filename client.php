<?php
session_start();
if (isset($_SESSION['login'])){
    if(isset($_POST['logout'])){
        unset($_SESSION['login']);
        header("Location: index.php");
    }
    echo "<h1>HI ". $_SESSION['login']."</h1";
}else{
    exit("Not date");
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
    <input type="submit" name="logout" value="Exit"></form>
</body>
</html>
