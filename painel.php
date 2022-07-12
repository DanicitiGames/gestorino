<?php
if(!isset($_SESSION)){ 
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
</head>
<body style="max-width: 100%; overflow-x: hidden;">
<div style="background-image: linear-gradient(to bottom right, #4f4668, #655c78);">
<div class="row shadow mb-4">
<div class="col-9">
<nav class="navbar navbar-expand-sm navbar-light">
    <div class="container-fluid">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" href="index.php"><?php echo $_SESSION['username']; ?></a>
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
                echo '<li class="nav-item">
                <a class="nav-link active" href="#">Painel</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#myModal">Perfil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="deslogar.php">Sair</a>
            </li>';
            ?>
        </ul>
    </div>
</nav>
</div>
</div>
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
echo "Nome: $user<br>Data de criação: $date";
?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

<div class="d-flex p-3">

<div class="col p-2 pt-5 container-fluid"></div>
<div class="col p-2 pt-5 container-fluid"></div>

</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>
</body>
</html>
