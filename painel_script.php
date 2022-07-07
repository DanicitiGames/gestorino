<?php
$minuto = $_POST['minuto'];
$hora = $_POST['hora'];
$dia = $_POST['dia'];
$mes = $_POST['mes'];
$ano = $_POST['ano'];
$op = $_POST['op'];
$valor = str_replace(".","",$_POST['valor']);
$valor_s = str_split($valor);
$valor_v = 0;
$valor_R = "";
function invalido($error){
    ob_start();
    header('Location: '."https://localhost/painel.php?error=$error");
    ob_end_flush();
    die();
}
function verif_param($var, $min, $max, $len, $error){
    if(!isset($var)){
        invalido($error);
    }elseif(!is_numeric($var) || strlen($var) < $min || strlen($var) > $max || str_contains($var, "+") || str_contains($var, "e") ){
        invalido($error);
    }elseif(strlen($var) != $len){
        return "0$var";
    }else{
        return $var;
    }
}
$minuto = verif_param($minuto, 0, 59, 2, "01");
$hora = verif_param($hora, 0, 23, 2, "02");
$dia = verif_param($dia, 1, 31, 2, "03");
$mes = verif_param($mes, 1, 12, 2, "04");
$ano = verif_param($ano, 2010, 2022, 4, "05");
$op = verif_param($op, 1, 4, 1, "06");
for($i = 0; $i < count($valor_s); $i++){
    if(!is_numeric($valor_s[$i]) && $valor_s[$i] != ","){
        invalido("07");
    }elseif($valor_v == 0 && $valor_s[$i] == ","){
        $valor_v == 1;
    }elseif($valor_v >= 1 && $valor_s[$i] == ","){
        invalido("07");
    }elseif($valor_v == 1 && is_numeric($valor_s[$i])){
        $valor_v == 2;
        $valor_R = $valor_R.$valor_s[$i];
    }elseif($valor == 2 && is_numeric($valor_s[$i])){
        $valor_v == 3;
        $valor_R = $valor_R.$valor_s[$i];
    }elseif($valor == 3 && is_numeric($valor_s[$i])){
        invalido("07");
    }else{
        $valor_R = $valor_R.$valor_s[$i];
    }
    if($i == count($valor_s)-1){
        if($valor_v == 0){
            $valor_R = $valor_R.",00";
        }elseif($valor_v == 1){
            $valor_R = $valor_R."00";
        }elseif($valor_v == 2){
            $valor_R = $valor_R."0";
        }
        $valor_T = substr($valor_R, 0, strlen($valor_R)-3);
        switch(strlen($valor_T)){
            case 1:
            case 2:
            case 3:
                break;
            case 4:
            case 5:
            case 6:
                $valor_R = substr($valor_T, 0, -3).".".substr($valor_T, -3).substr($valor_R, -3);
                break;
            case 7:
            case 8:
            case 9:
                $valor_R = substr($valor_T, 0, -6).".".substr($valor_T, 3, -3).".".substr($valor_T, -3).substr($valor_R, -3);
                break;
            case 10:
            case 11:
            case 12:
                $valor_R = substr($valor_T, 0, -9).".".substr($valor_T, 3, -6).".".substr($valor_T, 6, -3).".".substr($valor_T, -3).substr($valor_R, -3);
                break;
            case 13:
            case 14:
            case 15:
                $valor_R = substr($valor_T, 0, -12).".".substr($valor_T, 3, -9).".".substr($valor_T, 6, -6).".".substr($valor_T, 9, -3).".".substr($valor_T, -3).substr($valor_R, -3);
                break;
            default:
                invalido("07");
                break;
        }
    }
}
?>
