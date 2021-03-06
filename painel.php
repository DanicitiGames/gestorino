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
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Perfil de: <u><?php echo $_SESSION['username']; ?></u></h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
<?php
include('db.php');
$user = $_SESSION['username'];
$sql = "SELECT create_datetime FROM users WHERE username = '$user'";
$result = $connect->query($sql);
$row = $result->fetch_assoc();
$date = $row['create_datetime'];
$date = date('Y-m-d H:i:s', strtotime($date));
$user = $_SESSION['username'];
$uid = $_SESSION['uid'];
echo "Nome: $user<br>UID: $uid<br>Data de criação: $date";
?>
      </div>
    </div>
  </div>
</div>
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
                <li class="nav-item"><a class="nav-link" href="deslogar.php">Sair</a></li>
              </ul>
            </div>
          </div>
        </div>
      </nav>
    </div>
    <?php
    if(!isset($_POST['switch'])){
      $_POST['switch'] = 'Principal';
      include('principal.php');
    }else{
      funcao($_POST);
    }
    function funcao()
    {
      if($_POST['switch'] == 'Gráficos'){
        include('graficos.php');
      }
      if($_POST['switch'] == 'Cadastro'){
        include('cadastro.php');
      }
      if($_POST['switch'] == 'Principal'){
        include('principal.php');
      }
      if($_POST['switch'] == 'Histórico'){
        include('historico.php');
      }
    }
    ?>
</body>
</html>