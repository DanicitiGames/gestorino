<?php
include('db.php');
if(empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password'])){
    header('Location: login.php');
    exit();
}

$user = stripslashes($_REQUEST['username']);
$user = mysqli_real_escape_string($connect, $user);
$mail = stripslashes($_REQUEST['email']);
$mail = mysqli_real_escape_string($connect, $mail);
$pass = stripslashes($_REQUEST['password']);
$pass = mysqli_real_escape_string($connect, $pass);
$pass = hash('sha256', $pass);

$query = "SELECT username FROM users WHERE username = '${user}' AND password = '{$pass}'";
$result = mysqli_query($connect, $query);

$row = mysqli_num_rows($result);
if($row == 1){
echo "<div>Bem vindo $user</div>";
}else{
echo "<div>Não foi possível se conectar a conta '$user'</div>";
}
exit;
