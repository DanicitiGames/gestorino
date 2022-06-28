<?php
$letters = str_split("ABCDEFGHIJKLMNOPQRSTUVXWYZÇabcdefghijklmnopqrstuvxwyzç");
$numbers = str_split("1234567890");
$simbols = str_split("-_=!@#&.,;~");
$username_split = str_split($_POST['username']);
$username_text = "";
$has_space = false;

for($a = 0; $a < count($username_split); $a++){
    $c = false;
    while(!$c){
        for($b = 0; $b < count($letters); $b++){
            if($username_split[$a] == $letters[$b]){ 
                $username_text .= "-$letters[$b]";
                $c = true;
            }
        }
        for($b = 0; $b < count($numbers); $b++){
            if($username_split[$a] == $numbers[$b]){ 
                $username_text .= "-$numbers[$b]";
                $c = true;
            }
        }
        for($b = 0; $b < count($simbols); $b++){
            if($username_split[$a] == $simbols[$b]){ 
                $username_text .= "-$simbols[$b]";
                $c = true;
            }
        }
    }
}
if(strlen($username_text) == 0){
    if(strlen($_POST['username']) == 0){
        echo "erro: Escreva algo<br>";
    }else{
        echo "erro: Usuário inválido<br>";	
    }
}
elseif(strlen($username_text) <= 3 || strlen($username_text) >= 15){
    echo "erro: O usuário tem que ter no mínimo 4 e no máximo 14 caracteres<br>";
}
elseif($has_space){
    $with_point = str_replace(" ",".",$username_text);
    echo "erro: O usuário não pode conter espaços<br>Mas você pode tentar usar o nome: $with_point<br>";
}
echo "texto = $username_text";
?>