<?php
session_start();
include_once 'connect.php';

class Login{

    private function checkLogin($login,$link){

        $query = mysqli_query($link,"SELECT * FROM users WHERE login = '$login'");
        $query1 = mysqli_fetch_array($query,MYSQLI_ASSOC);
       return $query1 > 0;
    }

    private function checkPassword($login,$password,$link){
        $query = mysqli_query($link,"SELECT * FROM users WHERE login = '$login'");
        $row = mysqli_fetch_array($query,MYSQLI_ASSOC);
        if($row['password']== $password){
            return true;
        }else{
            return false;
        }
    }


     public function Entry($login,$password,$link){
        if(!$this->checkLogin($login,$link) ||!$this->checkPassword($login,$password,$link) ){
            return false;
        }
        $query = mysqli_query($link,"SELECT role FROM users WHERE login = '$login'");
        $role = mysqli_fetch_array($query,MYSQLI_ASSOC);
        $_SESSION['login'] = $login;
        if($role['role']=='2'){
            header("Location: maneger.php");
        }
        else if($role['role']=='3'){
            header("Location: admin.php");
        }else {
            header("Location: client.php");
        }
    }
}
