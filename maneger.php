<?php

session_start();
include_once "connect.php";
if($_SESSION['login']=='client'){
    header("Location:index.php");
}
if (isset($_SESSION['login'])) {
    if (isset($_POST['logout'])) {
        unset($_SESSION['login']);
        header("Location: index.php");
    }
    echo "<h1>HI ". $_SESSION['login']."</h1";
} else {
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
    <link rel="stylesheet" href="style.css">
</head>
<body>
<form action="" method="post">
    <input type="submit" name="logout" value="Exit"></form>

<!--Table bd-->
<?php
$query = "SELECT id,login,name,surname,lang,role FROM users";
$result = mysqli_query($link,$query) or die ("Failed query ".mysqli_error($link));
if($result){
    $rows = mysqli_num_rows($result);


    echo "<table style=\"margin:auto;width:500px;border:1px solid grey;\">
                    <tr>
                        <th>Id</th>
                        <th>Login</th>
                        <th>Name</th>
                        <th>Surname</th>
                        <th>Lang</th>
                        <th>Role</th>
                    </tr>";
    for ($i = 0 ; $i < $rows ; ++$i)
    {
        $row = mysqli_fetch_row($result);

        echo "<tr>";

        for ($j = 0 ; $j < 7 ; ++$j) {
            echo "<td>$row[$j]</td>";

        }

        echo "</tr>";
    }
    echo "</table>";
}
?>
</body>
</html>
