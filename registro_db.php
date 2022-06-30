<?php
$letters = str_split("ABCDEFGHIJKLMNOPQRSTUVXWYZabcdefghijklmnopqrstuvxwyz");
$numbers = str_split("1234567890");
$simbols = str_split("-_=!@#&.,;");
$username_split = str_split($_POST['username']);
$username_text = "";
$username_has_space = false;
$username_invalid_character = false;
$password_split = str_split($_POST['password']);
$password_text = "";
$password_has_space = false;
$password_invalid_character = false;

for($a = 0; $a < count($username_split); $a++){
    $finished = false;
    $not_found = 0;
    while(!$finished){
        if($username_split[$a] == " "){
            $username_text .= " ";
            $username_has_space = true;
            $finished = true;
        }else{
            $not_found++;
        }
        for($b = 0; $b < count($letters); $b++){
            if($username_split[$a] == $letters[$b]){ 
                $username_text .= "$letters[$b]";
                $finished = true;
            }
            if($b == count($letters)){
                $not_found++;
            }
        }
        for($b = 0; $b < count($numbers); $b++){
            if($username_split[$a] == $numbers[$b]){ 
                $username_text .= "$numbers[$b]";
                $finished = true;
            }
            if($b == count($numbers)){
                $not_found++;
            }
        }
        for($b = 0; $b < count($simbols); $b++){
            if($username_split[$a] == $simbols[$b]){ 
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
function redirect($error, $more) {
    $more = "";
    ob_start();
    header('Location: '."https://localhost/registro.php?error=$error$more");
    ob_end_flush();
    die();
}
if(strlen($username_text) == 0){
    if(strlen($_POST['username']) == 0){
        redirect("01","");
    }else{
        redirect("02","");
    }
}
elseif(strlen($username_text) <= 3 || strlen($username_text) >= 25){
    redirect("03","");
}
elseif($username_has_space){
    $with_point = str_replace(" ",".",$username_text);
    redirect("04","&$with_point");
}elseif($username_invalid_character){
    redirect("05","");
}else{
    for($a = 0; $a < count($password_split); $a++){
        $finished = false;
        $not_found = 0;
        while(!$finished){
            if($password_split[$a] == " "){
                $password_text .= " ";
                $password_has_space = true;
                $finished = true;
            }else{
                $not_found++;
            }
            for($b = 0; $b < count($letters); $b++){
                if($password_split[$a] == $letters[$b]){ 
                    $password_text .= "$letters[$b]";
                    $finished = true;
                }
                if($b == count($letters)){
                    $not_found++;
                }
            }
            for($b = 0; $b < count($numbers); $b++){
                if($password_split[$a] == $numbers[$b]){ 
                    $password_text .= "$numbers[$b]";
                    $finished = true;
                }
                if($b == count($numbers)){
                    $not_found++;
                }
            }
            for($b = 0; $b < count($simbols); $b++){
                if($password_split[$a] == $simbols[$b]){ 
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
    if(strlen($_POST['password']) == 0){
        redirect("06","");
    }elseif(strlen($_POST['password']) <= 7 || strlen($_POST['password']) >= 25){
        redirect("07","");
    }elseif($password_has_space){
        redirect("08","");
    }elseif($password_invalid_character){
        redirect("09","");
    }else{
        require('db.php');
        $username = str_split($_POST['username']);
        $sql = "SELECT * FROM users WHERE username = '$username_text'";
        $result = $connect->query($sql);
        if($result->num_rows == 1){
            redirect("10","");
        }else{
            $password = hash('sha256',$_POST['password']);
            $create_datetime = date("Y-m-d H:i:s");
            $sql = "INSERT INTO users (username, password, create_datetime) VALUES ('$username_text', '$password', '$create_datetime')";
            if($connect->query($sql) === FALSE){
                redirect("11","");
            }else{
                ob_start();
                header('Location: '."https://localhost/index.php");
                ob_end_flush();
                die();
            }
        }
    }
}
?>
