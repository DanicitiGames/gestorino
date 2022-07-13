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
              <li class="nav-item">
                <a class="nav-link" href="sobre.php">Sobre</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="#">Registro</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="login.php">Login</a>
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
      <form class='form' action='registro_db.php' method='post'>
        <div id='forms'>
          <div class='mb-1 mt-5'>
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
              $error_message = "Escreva um nome de usuário";
              break;
            case "02":
              $error_message = "Usuário inválido";
              break;
            case "03":
              $error_message = "O usuário tem que ter no mínimo 4 e no máximo 24 caracteres";
              break;
            case "04":
              $user = substr($x['query'], 9);
              $error_message = "O usuário não pode conter espaços<br>Você pode tentar usar: <strong>$user</strong>";
              break;
            case "05":
              $error_message = "O usuário não pode conter alguns caracteres especiais!<br><strong>Permitidos: _-=!@#&.,;</strong>";
              break;
            case "06":
              $error_message = "Escreva uma senha";
              break;
            case "07":
              $error_message = "A senha tem que conter no mínimo 8 e no máximo 24 caracteres";
              break;    
            case "08":
              $error_message = "A senha não pode conter espaços";
              break;
            case "09":
              $error_message = "A senha não pode conter alguns caracteres especiais!<br><strong>Permitidos: _-=!@#&.,;</strong>";
              break;
            case "10":
              $error_message = "Esse usuário já existe";
              break;
            case "11":
              $error_message = "Não foi possível criar a conta";
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
            <label for='user' class='form-label'>Usuário:</label>
            <input type='text' class='form-control' placeholder='Seu usuário' name='username'>
          </div>
          <div class='mb-3'>
            <label for='pwd' class='form-label'>Senha:</label>
            <input type='password' id='password' class='form-control' placeholder='Sua senha' name='password'>
          </div>
          <button type='submit' id='submit' class='btn btn-primary'>Registrar-se</button>
        </div>
      </form>
    </div>
    <div class="col"></div>
    <div class="col"></div>
  </div>
</div>
</div>
</body>
</html>
