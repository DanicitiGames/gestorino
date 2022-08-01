<?php
if(!isset($_SESSION)){ 
  session_start();
}
if(count($_SESSION) > 0){
    if($_SESSION['username']){
        header('Location: index.php');
        exit();
    }
}