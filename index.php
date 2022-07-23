<?php
if(!isset($_SESSION)){ 
  session_start();
}
?>
<!DOCTYPE html>
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
<div style="background-image: linear-gradient(to bottom right, #ce93d8, #81d4fa);">
<div class="row shadow mb-5">
<nav class="navbar navbar-expand-sm navbar-light">
  <div class="container-fluid">
  <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link active" href="javascript:void(0)"><h3 style="color:#574764">Gestorino</h3></a>
        </li>
    </ul>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="nav">
        <ul class="navbar-nav me-auto">
            <li class="nav-item">
                <a class="nav-link" href="faq.php">FAQ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="sobre.php">Sobre</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contato.php">Contato</a>
            </li>
        </ul>
        <div class="d-flex">
        <ul class="navbar-nav me-auto">
    <?php
    if(count($_SESSION) == 0){
        echo '<li class="nav-item"><a class="nav-link" href="registro.php">Registro</a></li>
              <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>';
    }else{
        echo '<li class="nav-item"><a class="nav-link" href="painel.php">Painel</a></li>
              <li class="nav-item"><a class="nav-link" href="deslogar.php">Sair</a></li>';
    }
    ?>
        </ul>
        </div>
    </div>
  </div>
</nav> 
</div>
    <p class="text-center display-1" style="color: #DC3545">Gestorino</p>
    <br><br>
    <center>
    <?php
    if(count($_SESSION) == 0){
        echo '<a href="registro.php" class="btn btn-danger shadow mb-4">Crie sua conta</a>
                <a href="sobre.php" class="btn btn-success shadow mb-4">Saiba mais</a>';
    }else{
        echo '<a href="painel.php" class="btn btn-danger shadow mb-4">Painel</a>
        <a href="sobre.php" class="btn btn-success shadow mb-4">Saiba mais</a>';
    }
    ?>
    </center>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>
</body>
