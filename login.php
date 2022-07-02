<?php
if(!isset($_SESSION)){ 
  session_start();
}
include('deslogado.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestorino</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body style="background-color: #363636;max-width: 100%;overflow-x: hidden;">
  <div style="background-image: linear-gradient(to bottom right, #90A4AE, #546E7A);">
    <div class="row shadow mb-4">
      <div class="col">
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
            <ul class="navbar-nav justify-content-end">
              <li class="nav-item">
                <a class="nav-link" href="sobre.php">Sobre</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="registro.php">Registro</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="#">Login</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </div>
        <div class="row" style="color: #ECF0F1">
            <div class="col"></div>
            <div class="col"></div>
            <div class="col">
            <form action="login_db.php" method="POST">
                <div class="mb-1 mt-5">
<?php
$x = parse_url($_SERVER['REQUEST_URI']);
if(count($x) >= 2){
  if($x['query']){
    $err = "error=";
    $len = strlen($err);
    if(substr($x['query'], 0, $len) === $err){
      $error = substr($x['query'], $len, 2);
      $error_message = "";
      $valid = true;
      switch($error){
        case "01":
          $error_message = "Usuário inválido";
          break;
        case "02":
          $error_message = "Escreva o usuário";
          break;
        case "03":
          $error_message = "Senha inválida";
          break;
        case "04":
          $user = substr($x['query'], 9);
          $error_message = "Escreva uma senha";
          break;
        case "05":
          $error_message = "O usuário ou senha estão incorretos!";
          break;
        default:
          $valid = false;
          break;
    }
    if($valid){
      echo "<div class='alert alert-danger mb-1 mt-5'>$error_message</div>";  
    }
  }
}
}
?>
                    <label for="text" class="form-label">Usuário:</label>
                    <input type="text" class="form-control" placeholder="Seu usuário" name="username">
                </div>
                <div class="mb-3">
                    <label for="pwd" class="form-label">Senha:</label>
                    <input type="password" class="form-control" placeholder="Sua senha" name="password">
                </div>
                <button type="submit" class="btn btn-primary">Logar</button>
            </form>
        </div>
        <div class="col"></div>
        <div class="col"></div>
        </div>
    </div>
</div>
</body>
</html>
