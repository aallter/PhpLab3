<?php
session_start();
if($_SESSION['login']!=='admin'){
    header("Location:index.php");
}
require_once 'connect.php';

if(isset($_GET['get'])){
    $id = $_GET['get'];
}
$query = "SELECT login,password,name,surname,role FROM users WHERE id=$id";
$result = mysqli_query($link,$query);
$row = mysqli_fetch_assoc($result);

$log = $row['login'];
$pass = $row['password'];
$name =$row['name'];
$surname = $row['surname'];
$role =  $row['role'];
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Edit</title>
</head>
<body>
<h1>Edit User</h1>
<form action="" method="post">
    <p><input type="text" placeholder="Login" name="editLogin"  value="<?php echo $log?>"></p>
    <p><input type="password" placeholder="Password" name="editPassword" value="<?php echo $pass?>"></p>
    <p><input type="text" placeholder="Name" name="name" value="<?php echo $name?>"></p>
    <p><input type="text" placeholder="Surname" name="surname" value="<?php echo $surname?>"></p>
    <p><input type="text" placeholder="Role" name="role" value="<?php echo $role?>"></p>
    <p><input type="submit" value="Edit" name="edit"></p>

    <?php

    if(isset($_POST['edit'])){
        $log = htmlentities(mysqli_real_escape_string($link, $_POST['editLogin']));
        $pass = htmlentities(mysqli_real_escape_string($link, $_POST['editPassword']));
        $name = htmlentities(mysqli_real_escape_string($link, $_POST['name']));
        $surname = htmlentities(mysqli_real_escape_string($link, $_POST['surname']));
        $role =  htmlentities(mysqli_real_escape_string($link, $_POST['role']));

        $query1 ="UPDATE users SET login='$log', password='$pass', name='$name', surname='$surname', role='$role' WHERE id=$id";
        $result = mysqli_query($link, $query1) or die("Ошибка " . mysqli_error($link));

        if($result){
            echo "<span class='successful'>UPDATED</span>";
        }
    }
    ?>
    <br>
    <a href="admin.php"><button>Adminka</button></a>
</form>
</body>
</html>
