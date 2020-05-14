<?php
session_start();
if($_SESSION['login']!=='admin'){
    header("Location:index.php");
}
include_once "connect.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Create User</h1>
<form action="" method="post">
    <p><input type="text" placeholder="Login" name="createLogin"></p>
    <p><input type="password" placeholder="Password" name="createPassword"></p>
    <p><input type="text" placeholder="Name" name="name"></p>
    <p><input type="text" placeholder="Surname" name="surname"></p>
    <p><input type="text" placeholder="Role" name="role"></p>
    <p><input type="submit" value="Create" name="create"></p>
</form>
<?php
    $flog = $_POST['createLogin'];
    $fpass = $_POST['createPassword'];
    $fname = $_POST['name'];
    $fsurname = $_POST['surname'];
    $frole = $_POST['role'];

    function clean($value = "") {
        $value = trim($value);
        $value = stripslashes($value);
        $value = strip_tags($value);
        $value = htmlspecialchars($value);

        return $value;
    }
    function check_length($value = "", $min, $max) {
        $result = (mb_strlen($value) < $min || mb_strlen($value) > $max);
        return !$result;
    }

    $fname = clean($fname);
    $fsurname = clean($fsurname);
    $flog = clean($flog);
    $fpass = clean($fpass);
    $frole = clean($frole);

    if(!empty($fname) && !empty($fsurname) && !empty($flog) && !empty($fpass) && !empty($frole)) {

        if(check_length($fname, 1, 20) && check_length($fsurname, 1, 20) && check_length($flog, 1, 20) && check_length($fpass, 1, 20) && check_length($frole, 1, 1)) {
            $createLogin = htmlentities(mysqli_real_escape_string($link,$_POST['createLogin']));
            $createPassword = htmlentities(mysqli_real_escape_string($link,$_POST['createPassword']));
            $name = htmlentities(mysqli_real_escape_string($link,$_POST['name']));
            $surname = htmlentities(mysqli_real_escape_string($link,$_POST['surname']));
            $role = htmlentities(mysqli_real_escape_string($link,$_POST['role']));

            $query = "INSERT INTO users VALUES(NULL,'$createLogin','$createPassword','$name','$surname',NULL,'$role')";

            $result = mysqli_query($link,$query) or die("Failed create ".mysqli_error($link));

            echo "<span class='successful'>USERS CREATED</span>";

            mysqli_close($link);
            echo "Ok";


        } else {
            echo "Введенные данные некорректны";
        }
    }else{
        echo "Заполните пустые поля";
    }

?>
<br>
<a href="admin.php"><button>Adminka</button></a>
</body>
</html>