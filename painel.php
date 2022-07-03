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
          <div class="input-group">
            <input type="text" class="form-control" placeholder="00" id="horas">
            <span class="input-group-text">:</span>
            <input type="text" class="form-control" placeholder="00" id="minutos">
            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" id="text_dia">Dia</button>
            <ul class="dropdown-menu">
            <li><a class="dropdown-item" onclick='atualizar_dt("??")'>??</a></li>
            <li><hr class="dropdown-divider"></hr></li>
            <li><a class="dropdown-item" onclick='atualizar_dt("31")'>31</a></li>
            <li><a class="dropdown-item" onclick='atualizar_dt("30")'>30</a></li>
            <li><a class="dropdown-item" onclick='atualizar_dt("29")'>29</a></li>
            <li><a class="dropdown-item" onclick='atualizar_dt("28")'>28</a></li>
            <li><a class="dropdown-item" onclick='atualizar_dt("27")'>27</a></li>
            <li><a class="dropdown-item" onclick='atualizar_dt("26")'>26</a></li>
            <li><a class="dropdown-item" onclick='atualizar_dt("25")'>25</a></li>
            <li><a class="dropdown-item" onclick='atualizar_dt("24")'>24</a></li>
            <li><a class="dropdown-item" onclick='atualizar_dt("23")'>23</a></li>
            <li><a class="dropdown-item" onclick='atualizar_dt("22")'>22</a></li>
            <li><a class="dropdown-item" onclick='atualizar_dt("21")'>21</a></li>
            <li><a class="dropdown-item" onclick='atualizar_dt("20")'>20</a></li>
            <li><a class="dropdown-item" onclick='atualizar_dt("19")'>19</a></li>
            <li><a class="dropdown-item" onclick='atualizar_dt("18")'>18</a></li>
            <li><a class="dropdown-item" onclick='atualizar_dt("17")'>17</a></li>
            <li><a class="dropdown-item" onclick='atualizar_dt("16")'>16</a></li>
            <li><a class="dropdown-item" onclick='atualizar_dt("15")'>15</a></li>
            <li><a class="dropdown-item" onclick='atualizar_dt("14")'>14</a></li>
            <li><a class="dropdown-item" onclick='atualizar_dt("13")'>13</a></li>
            <li><a class="dropdown-item" onclick='atualizar_dt("12")'>12</a></li>
            <li><a class="dropdown-item" onclick='atualizar_dt("11")'>11</a></li>
            <li><a class="dropdown-item" onclick='atualizar_dt("10")'>10</a></li>
            <li><a class="dropdown-item" onclick='atualizar_dt("09")'>09</a></li>
            <li><a class="dropdown-item" onclick='atualizar_dt("08")'>08</a></li>
            <li><a class="dropdown-item" onclick='atualizar_dt("07")'>07</a></li>
            <li><a class="dropdown-item" onclick='atualizar_dt("06")'>06</a></li>
            <li><a class="dropdown-item" onclick='atualizar_dt("05")'>05</a></li>
            <li><a class="dropdown-item" onclick='atualizar_dt("04")'>04</a></li>
            <li><a class="dropdown-item" onclick='atualizar_dt("03")'>03</a></li>
            <li><a class="dropdown-item" onclick='atualizar_dt("02")'>02</a></li>
            <li><a class="dropdown-item" onclick='atualizar_dt("01")'>01</a></li>
            </ul>
            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" id="text_mes">Mes</button>
            <ul class="dropdown-menu">
            <li><a class="dropdown-item" onclick='atualizar_ms("??")'>??</a></li>
            <li><hr class="dropdown-divider"></hr></li>
            <li><a class="dropdown-item" onclick='atualizar_ms("12")'>12</a></li>
            <li><a class="dropdown-item" onclick='atualizar_ms("11")'>11</a></li>
            <li><a class="dropdown-item" onclick='atualizar_ms("10")'>10</a></li>
            <li><a class="dropdown-item" onclick='atualizar_ms("09")'>09</a></li>
            <li><a class="dropdown-item" onclick='atualizar_ms("08")'>08</a></li>
            <li><a class="dropdown-item" onclick='atualizar_ms("07")'>07</a></li>
            <li><a class="dropdown-item" onclick='atualizar_ms("06")'>06</a></li>
            <li><a class="dropdown-item" onclick='atualizar_ms("05")'>05</a></li>
            <li><a class="dropdown-item" onclick='atualizar_ms("04")'>04</a></li>
            <li><a class="dropdown-item" onclick='atualizar_ms("03")'>03</a></li>
            <li><a class="dropdown-item" onclick='atualizar_ms("02")'>02</a></li>
            <li><a class="dropdown-item" onclick='atualizar_ms("01")'>01</a></li>
            </ul>
            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" id="text_ano">Ano</button>
            <ul class="dropdown-menu">
            <li><a class="dropdown-item" onclick='atualizar_an("????")'>????</a></li>
            <li><hr class="dropdown-divider"></hr></li>
            <li><a class="dropdown-item" onclick='atualizar_an("2022")'>2022</a></li>
            <li><a class="dropdown-item" onclick='atualizar_an("2021")'>2021</a></li>
            <li><a class="dropdown-item" onclick='atualizar_an("2020")'>2020</a></li>
            <li><a class="dropdown-item" onclick='atualizar_an("2019")'>2019</a></li>
            <li><a class="dropdown-item" onclick='atualizar_an("2018")'>2018</a></li>
            <li><a class="dropdown-item" onclick='atualizar_an("2017")'>2017</a></li>
            <li><a class="dropdown-item" onclick='atualizar_an("2016")'>2016</a></li>
            <li><a class="dropdown-item" onclick='atualizar_an("2015")'>2015</a></li>
            <li><a class="dropdown-item" onclick='atualizar_an("2014")'>2014</a></li>
            <li><a class="dropdown-item" onclick='atualizar_an("2013")'>2013</a></li>
            <li><a class="dropdown-item" onclick='atualizar_an("2012")'>2012</a></li>
            <li><a class="dropdown-item" onclick='atualizar_an("2011")'>2011</a></li>
            <li><a class="dropdown-item" onclick='atualizar_an("2010")'>2010</a></li>
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
        </div>
        <div>
          <h1 id="saldo">Saldo: </h1>
        </div>
        </div>
      </div>
    </div>
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
      function atualizar(){
        a = document.getElementById("valores")
        id_value = 0;
        if(a.getElementsByTagName("td")[0]){
          id_value = a.getElementsByTagName("td")[0].innerText;
        }
        dia = document.getElementById("text_dia").innerText;
        mes = document.getElementById("text_mes").innerText;
        ano = document.getElementById("text_ano").innerText;
        min = document.getElementById("minutos").value;
        hr = document.getElementById("horas").value;
        op_text = document.getElementById("text_op").innerText;
        din = document.getElementById("valor").value;
        var result = document.createElement("tr");
        var id = document.createElement("td");
        var dt = document.createElement("td");
        var op = document.createElement("td");
        var vl = document.createElement("td");
        if(!Number(dia)){
          dia = "??";
        }
        if(!Number(mes)){
          mes = "??";
        }
        if(!Number(ano)){
          ano = "????";
        }
        if(!Number(min)){
          min = "??";
        }
        if(!Number(hr)){
          hr = "??";
        }
        if(String(dia).length==1){
          dia = "0"+dia;
        }
        if(String(mes).length==1){
          mes = "0"+mes;
        }
        if(String(min).length==1){
          min = "0"+min;
        }
        if(String(hr).length==1){
          hr = "0"+hr;
        }
        if(dia>31||dia<=0){
          dia = "??";
        }
        if(mes>12||mes<=0){
          mes = "??";
        }
        if(min>59||min<=0){
          min = "??";
        }
        if(hr>23||hr<=0){
          hr = "??";
        }
        if(din.length==0){
          din = "???";
        }
        if(din == ""){
          din = "???";
        }
        if(din.indexOf("+")>-1){
          din = "???"
        }
        if(din.indexOf("e")>-1){
          din = "???"
        }
        if(hr.indexOf("e")>-1){
          hr = "???"
        }
        if(hr.indexOf("+")>-1){
          min = "???"
        }
        if(min.indexOf("e")>-1){
          min = "???"
        }
        if(min.indexOf("+")>-1){
          min = "???"
        }
        if(dia.indexOf("e")>-1){
          dia = "???"
        }
        if(dia.indexOf("+")>-1){
          dia = "???"
        }
        if(mes.indexOf("e")>-1){
          mes = "???"
        }
        if(mes.indexOf("+")>-1){
          mes = "???"
        }
        if(ano.indexOf("e")>-1){
          ano = "????"
        }
        if(ano.indexOf("+")>-1){
          ano = "????"
        }
        if(Number(din) == 0){
          din = "0,00";
        }
        if(Number(din)<0){
          din = din*-1;
        }
        if(!Number(din)){
          if(din.indexOf(",")>-1){
            din = din.replace(",",",");
            d_s = din.split(",");
            if(String(d_s[1]).length==1){
              din += "0";
            }else{
              if(String(d_s[1]).length==0){
                din += "00";
              }
            }
          }else{
            din = "???";
          }
        }else{
          din+= ",00";
        }
        id.appendChild(document.createTextNode(Number(id_value) + 1));
        dt.appendChild(document.createTextNode(`${dia}/${mes}/${ano} ${hr}:${min}`));
        op.appendChild(document.createTextNode(`${op_text}`));
        vl.appendChild(document.createTextNode(`R$ ${din}`));
        result.appendChild(id);
        result.appendChild(dt);
        result.appendChild(op);
        result.appendChild(vl);
        a.insertBefore(result, a.childNodes[0]);
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

        // quando coloca muita coisa depois da , da problema
      }
    </script>
</body>
</html>
