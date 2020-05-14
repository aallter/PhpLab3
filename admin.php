<?php
session_start();
include_once "connect.php";
if($_SESSION['login']!=='admin'){
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
    <title>Admin</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<form action="" method="post">
    <input type="submit" name="logout" value="Exit">
</form>

<!--Table bd-->

<?php
    if(isset($_GET['del'])){
        $id = $_GET['del'];

        $query ="DELETE FROM users WHERE id=$id";
        mysqli_query($link,$query)or die(mysqli_error($link));

        ?> <script>
             alert('Deleted');
            </script>
    <?php
    }

    $query = "SELECT * FROM users";
    $result = mysqli_query($link,$query) or die( mysqli_error($link) );

    for($data = []; $row = mysqli_fetch_assoc($result);$data[] = $row);
?>
    <table style="margin:auto;width:500px;border:1px solid grey;">
        <tr>


            <th>Id</th>
            <th>Login</th>
            <th>Name</th>
            <th>Surname</th>

            <th>Role</th>
            <th><button><a href='Create.php'>Create</a>></button></th>
        </tr>
     <?php foreach ($data as $user) {?>

        <tr>
            <td><?= $user['id'] ?></td>
            <td><?= $user['login'] ?></td>
            <td><?= $user['name'] ?></td>
            <td><?= $user['surname'] ?></td>
            <td><?= $user['role'] ?></td>
            <td><a href="?del=<?= $user['id'] ?>">Delete</a></td>
            <td><a href="Edit.php?get=<?= $user['id']?>">Edit</a></td>
        </tr>
      <?php }?>
    </table>

</body>
</html>


