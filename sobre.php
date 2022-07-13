<?php
if(!isset($_SESSION)){ 
  session_start();
}
?>
<DOCTYPE! html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestorino</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body style="max-width: 100%; overflow-x: hidden;">
<div style="background-image: linear-gradient(to bottom right, #4f4668, #655c78);">
<div class="row shadow mb-4">
<div class="col-9">
<nav class="navbar navbar-expand-sm navbar-light">
    <div class="container-fluid">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Gestorino</a>
            </li>
        </ul>
    </div>
</nav>
</div>
<div class="col d-flex flex-row-reverse">
<nav class="navbar navbar-expand-sm navbar-light">
    <div class="container-fluid">
        <ul class="navbar-nav">
        <?php
            if(count($_SESSION) > 0){
                echo '<li class="nav-item">
                <a class="nav-link active" href="sobre.php">Sobre</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="painel.php">Painel</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="deslogar.php">Sair</a>
            </li>';
            }else{
        echo '<li class="nav-item">
                <a class="nav-link active" href="sobre.php">Sobre</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="registro.php">Registro</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="login.php">Login</a>
            </li>';
            }
            ?>
        </ul>
    </div>
</nav>
</div>
</div>
</div>
</body>
