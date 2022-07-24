<?php
if (!isset($_SESSION)) {
  session_start();
}
include('logado.php');
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
</head>

<body style="max-width: 100%; overflow-x: hidden;">
  <div style="background-image: linear-gradient(to bottom right, #ce93d8, #81d4fa);">
    <div class="row shadow">
      <nav class="navbar navbar-expand-sm navbar-light">
        <div class="container-fluid">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" href="index.php">
                <h3 style="color:#574764"><?php echo $_SESSION['username']; ?></h3>
              </a>
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
                <li class="nav-item"><a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#myModal">Perfil</a></li>
                <li class="nav-item"><a class="nav-link" href="javascript:void(0)"><strong>Painel</strong></a></li>
                <li class="nav-item"><a class="nav-link" href="deslogar.php">Sair</a></li>'
              </ul>
            </div>
          </div>
        </div>
      </nav>
    </div>
    <?php
    if(!isset($_POST['switch'])){
      echo '<form method="post">
      <nav class="navbar navbar-expand-sm navbar-light">
      <input type="submit" class="btn shadow" style="color:#574764" name="switch" id="Cadastro" value="Cadastro"/>
      <input type="submit" class="btn" style="color:#574764" name="switch" id="Principal" value="Principal"/>
      <input type="submit" class="btn" style="color:#574764" name="switch" id="Gráficos" value="Gráficos"/>
      <input type="submit" class="btn" style="color:#574764" name="switch" id="Histórico" value="Histórico"/>
      </nav>
      </form>
      <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>';
    }
    function funcao()
    {
      if($_POST['switch'] == 'Gráficos'){
        include('graficos.php');
      }
      if($_POST['switch'] == 'Cadastro'){
        echo '<form method="post">
        <nav class="navbar navbar-expand-sm navbar-light">
        <input type="submit" class="btn shadow" style="color:#574764" name="switch" id="Cadastro" value="Cadastro"/>
        <input type="submit" class="btn" style="color:#574764" name="switch" id="Principal" value="Principal"/>
        <input type="submit" class="btn" style="color:#574764" name="switch" id="Gráficos" value="Gráficos"/>
        <input type="submit" class="btn" style="color:#574764" name="switch" id="Histórico" value="Histórico"/>
        </nav>
        </form>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>';
      }
      if($_POST['switch'] == 'Principal'){
        echo '<form method="post">
        <nav class="navbar navbar-expand-sm navbar-light">
        <input type="submit" class="btn" style="color:#574764" name="switch" id="Cadastro" value="Cadastro"/>
        <input type="submit" class="btn shadow" style="color:#574764" name="switch" id="Principal" value="Principal"/>
        <input type="submit" class="btn" style="color:#574764" name="switch" id="Gráficos" value="Gráficos"/>
        <input type="submit" class="btn" style="color:#574764" name="switch" id="Histórico" value="Histórico"/>
        </nav>
        </form>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>';
      }
      if($_POST['switch'] == 'Histórico'){
        echo '<form method="post">
        <nav class="navbar navbar-expand-sm navbar-light">
        <input type="submit" class="btn" style="color:#574764" name="switch" id="Cadastro" value="Cadastro"/>
        <input type="submit" class="btn" style="color:#574764" name="switch" id="Principal" value="Principal"/>
        <input type="submit" class="btn" style="color:#574764" name="switch" id="Gráficos" value="Gráficos"/>
        <input type="submit" class="btn shadow" style="color:#574764" name="switch" id="Histórico" value="Histórico"/>
        </nav>
        </form>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>';
      }
    }
    if (array_key_exists('switch', $_POST)) {
      funcao($_POST);
    }
    ?>
</body>
</html>
