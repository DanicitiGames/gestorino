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
<div style="background-image: linear-gradient(to bottom right, #4f4668, #655c78);">
<div class="row shadow mb-5">
<nav class="navbar navbar-expand-sm navbar-light">
  <div class="container-fluid">
  <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link active" href="#"><h3 style="color:#191620">Gestorino</h3></a>
        </li>
    </ul>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="nav">
        <ul class="navbar-nav me-auto">
            <li class="nav-item">
                <a class="nav-link" href="javascript:void(0)">FAQ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="sobre.php">Sobre</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="javascript:void(0)">Contato</a>
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
    <p class="text-center display-6" style="color: #EEEEEE">Sua plataforma favorita de gestão</p>
    <p class="text-center display-6" style="color: #EEEEEE">Gerencinado e administrando o seu negócio da maneira mais simples e fácil</p>
    <div class="row" style="color: #EEEEEE;">
        <div class="col-5 p-2"></div>
        <div class="col-5 p-2">
            <a href="registro.php" class="btn btn-danger shadow mb-4">Crie sua conta</a>
            <a href="sobre.php" class="btn btn-success shadow mb-4">Saiba mais</a>
        </div>
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>
</body>
