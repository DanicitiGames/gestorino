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
                $test = count($letters)-1;
                echo "$test";
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
function redirect($error) {
    ob_start();
    header('Location: '."https://localhost/registro.php?error=$error");
    ob_end_flush();
    die();
}
if(strlen($username_text) == 0){
    if(strlen($_POST['username']) == 0){
        echo "erro: Escreva algo<br>";
        redirect(1);
    }else{
        echo "erro: Usuário inválido<br>";	
        redirect(2);
    }
}
elseif(strlen($username_text) <= 3 || strlen($username_text) >= 25){
    $len = strlen($username_text);
    redirect(3);
    echo "erro: O usuário tem que ter no mínimo 4 e no máximo 24 caracteres<br> $len";
}
elseif($username_has_space){
    $with_point = str_replace(" ",".",$username_text);
    echo "erro: O usuário não pode conter espaços<br>Mas você pode tentar usar o nome: $with_point<br>";
    redirect(4);
}elseif($username_invalid_character){
    echo "erro: O usuário não pode conter caracteres especiais não permitidos<br>Permitidos: _-=!@#&.,;<br>";
    redirect(5);
}else{

}
?>
