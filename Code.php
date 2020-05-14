<?php
session_start();
include_once 'connect.php';

class Login{

    private function checkLogin($login,$link){

        $query = mysqli_query($link,"SELECT * FROM users WHERE login = '$login'");
        $query1 = mysqli_fetch_array($query,MYSQLI_ASSOC);
        if($query1 > 0){
            return true;
        }else{
            return false;
        }
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
        if($this->checkLogin($login,$link)){
            if($this->checkPassword($login,$password,$link)){
                $query = mysqli_query($link,"SELECT role FROM users WHERE login = '$login'");
                $role = mysqli_fetch_array($query,MYSQLI_ASSOC);

                if($role['role']=='1'){
                    $_SESSION['login'] = $login;
                    header("Location: client.php");
                }else if($role['role']=='2'){
                    $_SESSION['login'] = $login;
                    header("Location: maneger.php");
                }else if($role['role']=='3'){
                    $_SESSION['login'] = $login;
                    header("Location: admin.php");
                }else{
                    $_SESSION['login'] = $login;
                    header("Location: client.php");
                }

            }else{
                return false;
            }
        }else{
            return false;
        }
    }
}