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
<div class="row shadow mb-5">
<nav class="navbar navbar-expand-sm navbar-light">
  <div class="container-fluid">
  <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link active" href="index.php"><h3 style="color:#574764">Nintendo</h3></a>
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
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Perfil de: <u>Nintendo</u></h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
      Nome: Nintend<br>Data de criação: 01/01/2000
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
<center>
<div class="col-md-4">
<div class="card shadow">
<div class="card chart-container">
  <canvas style="background-color:#e1bee7" id="chart"></canvas>
</div>
</div>
</div>
</center>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>
</body>
<script>
  window.onload = function() {
    const ctx = document.getElementById("chart").getContext('2d');
      const myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ["Janeiro", "Fevereiro", "Março", "Abril",
          "Maio", "Junho", "Julho"],
          datasets: [{
            label: 'Rendimentos (R$)',
            backgroundColor: 'rgba(243,229,245,0.25)',
            borderColor: 'rgb(197,202,233)',
            data: [12, 10, 21, 45, 70, 87, 120],
          }, {
            label: 'Gastos (R$)',
            backgroundColor: 'rgba(255, 99, 132,0.25)',
            borderColor: 'rgb(255, 99, 132)',
            data: [7, 13, 15, 22, 35, 50, 66],
          }]
        },
      });
  }
</script>
</html>