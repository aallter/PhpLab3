<?php
session_start();
include_once 'Code.php';

    if(isset($_POST['send'])){
        $user = new Login();
        $login = $_POST['login'];
        $password = $_POST['password'];
        $user->Entry($login,$password,$link);
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

    <style>
        body{
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Авторизация</h1>
    <form action="" method="post">
        <p><input type="text" placeholder="Login" name="login"></p>
        <p><input type="text" placeholder="password" name="password"></p>
        <p><input type="submit" value="Send" name="send"></p>
    </form><p>
</body>
</html>