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
<div style="background-image: linear-gradient(to bottom right, #90A4AE, #546E7A);">
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
<div class="row">
      <div class="col-5">
        <div class="container mt-3">
          <h2>Últimas atualizações:</h2>
          <div class="table-responsive">
            <table class="table table-dark">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Data</th>
                  <th>Operação</th>
                  <th>Valor</th>
                </tr>
              </thead>
              <tbody id="valores">
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="mt-2 p-2 col-5">
        <div>
<form class="input-group" action='painel_script.php' method='post'>
            <input type="text" class="form-control" placeholder="00" id="horas">
            <span class="input-group-text">:</span>
            <input type="text" class="form-control" placeholder="00" id="minutos">
            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" id="text_dia">Dia</button>
            <ul class="dropdown-menu">
            <li><a class="dropdown-item" onclick='atualizar_dt("??")'>??</a></li>
            <li><hr class="dropdown-divider"></hr></li>
            <?php
              $a = 31;
              while($a!=0){
                if($a < 10){
                  echo "<li><a class='dropdown-item' onclick='atualizar_dt('$a')'>0$a</a></li>";
                }else{
                  echo "<li><a class='dropdown-item' onclick='atualizar_dt('$a')'>$a</a></li>";
                }
                $a--;
              }
              echo '</ul>
              <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" id="text_mes">Mes</button>
              <ul class="dropdown-menu">
              <li><a class="dropdown-item" onclick="atualizar_ms("??")">??</a></li>
              <li><hr class="dropdown-divider"></hr></li>';
              $b = 12;
              while($b!=0){
                if($b < 10){
                  echo "<li><a class='dropdown-item' onclick='atualizar_ms(\"0$b\")'>0$b</a></li>";
                }else{
                  echo "<li><a class='dropdown-item' onclick='atualizar_ms(\"$b\")'>$b</a></li>";
                }
                $b--;
              }
            echo '</ul>
            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" id="text_ano">Ano</button>
            <ul class="dropdown-menu">
            <li><a class="dropdown-item" onclick="atualizar_an("????")">????</a></li>
            <li><hr class="dropdown-divider"></hr></li>';
            $c = 2022;
            while($c!=2009){
              echo "<li><a class='dropdown-item' onclick='atualizar_an(\"$c\")'>$c</a></li>";
              $c--;
            }
            ?>
            </ul>
            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" id="text_op">Venda</button>
            <ul class="dropdown-menu">
            <li><a class="dropdown-item" onclick='atualizar_op("Venda")'>Venda</a></li>
            <li><a class="dropdown-item" onclick='atualizar_op("Compra")'>Compra</a></li>
            <li><a class="dropdown-item" onclick='atualizar_op("Saque")'>Saque</a></li>
            <li><a class="dropdown-item" onclick='atualizar_op("Deposito")'>Deposito</a></li>
          </ul>
            <span class="input-group-text">R$:</span>
            <input type="text" class="form-control" placeholder="00,00" id="valor">
          <button type="button" class="btn btn-primary" onclick='atualizar()'>Inserir</button>
</form>
        <div>
          <h1 id="saldo">Saldo: </h1>
        </div>
        </div>
      </div>
    </div>
</body>
<script>
window.addEventListener("load", function(){
  let data = new Date();
  let hora = data.getHours();
  let min = data.getMinutes();
  let dia = data.getDate();
  let mes = data.getMonth()+1;
  let ano = data.getFullYear();
  if(hora<10){
    hora = "0"+hora;
  }
  if(min<10){
    min = "0"+min;
  }
  document.getElementById("horas").value = hora;
  document.getElementById("minutos").value = min;
  document.getElementById("text_dia").innerText = dia;
  document.getElementById("text_mes").innerText = mes;
  document.getElementById("text_ano").innerText = ano;
  let td = document.getElementsByTagName("td");
  let saldo = 0;
  let value = 0;
  let td_saldo = document.getElementsByTagName("td");
  for(let i=0; i<td_saldo.length; i++){
    if(i%4==3){
      value = parseFloat(String(String(String(td_saldo[i].innerText).slice(3)).replace(".","").replace(",","")));
      if(!Number(value)){
        value = 0;
      }
      switch(td_saldo[i-1].innerText){
        case "Venda":
        case "Deposito":
          saldo += value;
          break;
        case "Compra":
        case "Saque":
          saldo -= value;
          break;
      }
    }
  }
  saldo_text = String(saldo).slice(0,String(saldo).length-2) + "," + String(saldo).slice(String(saldo).length-2);
  if(saldo_text == ",0"){
    saldo_text = "0,00";
  }
  document.getElementById("saldo").innerText = "Saldo: R$"+saldo_text;
});
function atualizar_op(text){
  document.getElementById("text_op").innerText = text;
}
function atualizar_dt(text){
  document.getElementById("text_dia").innerText = text;
}
function atualizar_ms(text){
  document.getElementById("text_mes").innerText = text;
}
function atualizar_an(text){
  document.getElementById("text_ano").innerText = text;
}
</script>
</html>
