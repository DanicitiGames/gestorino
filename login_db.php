<?php
if(!isset($_SESSION)){ 
    session_start();
}
include('deslogado.php');
include('db.php');
function redirect($error) {
    ob_start();
    header("Location: https://localhost/login.php?error=$error");
    ob_end_flush();
    die();
}
$letters = str_split("ABCDEFGHIJKLMNOPQRSTUVXWYZabcdefghijklmnopqrstuvxwyz");
$numbers = str_split("1234567890");
$simbols = str_split("-_=!@#&.,;");
$username = str_split($_POST['username']);
$username_text = "";
$username_has_space = false;
$username_invalid_character = false;
$password = str_split($_POST['password']);
$password_text = "";
$password_has_space = false;
$password_invalid_character = false;
for($a = 0; $a < count($username); $a++){
    $finished = false;
    $not_found = 0;
    while(!$finished){
        if($username[$a] == " "){
            $username_text .= " ";
            $username_has_space = true;
            $finished = true;
        }else{
            $not_found++;
        }
        for($b = 0; $b < count($letters); $b++){
            if($username[$a] == $letters[$b]){ 
                $username_text .= "$letters[$b]";
                $finished = true;
            }
            if($b == count($letters)){
                $not_found++;
            }
        }
        for($b = 0; $b < count($numbers); $b++){
            if($username[$a] == $numbers[$b]){ 
                $username_text .= "$numbers[$b]";
                $finished = true;
            }
            if($b == count($numbers)){
                $not_found++;
            }
        }
        for($b = 0; $b < count($simbols); $b++){
            if($username[$a] == $simbols[$b]){ 
                $username_text .= "$simbols[$b]";
                $finished = true;
            }
            if($b == count($simbols)){
                $not_found++;
            }
        }
        if($not_found == 4){
            $username_invalid_character = true;
            $finished = true;
        }
    }
}

if($username_has_space == true || $username_invalid_character == true){
    redirect("1");
}elseif($username_text == ""){
    redirect("2");
}else{
    for($a = 0; $a < count($password); $a++){
        $finished = false;
        $not_found = 0;
        while(!$finished){
            if($password[$a] == " "){
                $password_text .= " ";
                $password_has_space = true;
                $finished = true;
            }else{
                $not_found++;
            }
            for($b = 0; $b < count($letters); $b++){
                if($password[$a] == $letters[$b]){ 
                    $password_text .= "$letters[$b]";
                    $finished = true;
                }
                if($b == count($letters)){
                    $not_found++;
                }
            }
            for($b = 0; $b < count($numbers); $b++){
                if($password[$a] == $numbers[$b]){ 
                    $password_text .= "$numbers[$b]";
                    $finished = true;
                }
                if($b == count($numbers)){
                    $not_found++;
                }
            }
            for($b = 0; $b < count($simbols); $b++){
                if($password[$a] == $simbols[$b]){ 
                    $password_text .= "$simbols[$b]";
                    $finished = true;
                }
                if($b == count($simbols)){
                    $not_found++;
                }
            }
            if($not_found == 4){
                $password_invalid_character = true;
                $finished = true;
            }
        }
    }
        if($password_has_space == true || $password_invalid_character == true){
            redirect("3");
        }elseif($password_text == ""){
            redirect("4");
        }else{
            $password_text = hash('sha256', $password_text);
            $query = "SELECT username FROM users WHERE username = '${username_text}' AND password = '${password_text}'";
            $result = mysqli_query($connect, $query);
            $row = mysqli_num_rows($result);
            if($row == 1){
                if(!isset($_SESSION)){ 
                    session_start();
                } 
                $_SESSION['username'] = $username_text;
                header('Location: painel.php');
            }else{
                redirect("5");
            } 
        }
}
