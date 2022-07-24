<?php
echo '<form method="post">
        <nav class="navbar navbar-expand-sm navbar-light">
        <input type="submit" class="btn" style="color:#574764" name="switch" id="Cadastro" value="Cadastro"/>
        <input type="submit" class="btn" style="color:#574764" name="switch" id="Principal" value="Principal"/>
        <input type="submit" class="btn shadow" style="color:#574764" name="switch" id="Gráficos" value="Gráficos"/>
        <input type="submit" class="btn" style="color:#574764" name="switch" id="Histórico" value="Histórico"/>
        </nav>
        </form>
        <div class="modal" id="myModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Perfil de: <u><?php echo $_SESSION["username"]; ?></u></h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">';
              include("db.php");
              $user = $_SESSION['username'];
              $sql = "SELECT create_datetime FROM users WHERE username = '$user'";
              $result = $connect->query($sql);
              $row = $result->fetch_assoc();
              $date = $row['create_datetime'];
              $date = date("Y-m-d H:i:s", strtotime($date));
              $user = $_SESSION["username"];
              echo "Nome: $user<br>Data de criação: $date";
              echo '</div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
            </div>
          </div>
        </div>
      </div>
      <center>
        <div class="col-md-4">
          <div class="card shadow">
            <div class="card chart-container" style="background-color:#e1bee7">
              <h2 style="color:#666666">Gráficos 2022</h2>
              <canvas id="chart1"></canvas>
              <canvas id="chart2"></canvas>
            </div>
          </div>
        </div>
      </center>
      <br><br><br><br><br><br><br>
      <br><br><br><br><br><br><br><br>
    </div>
    <script>
    window.onload = function() {
      const ctx1 = document.getElementById("chart1").getContext("2d");
      const RenGas = new Chart(ctx1, {
        type: "line",
        data: {
          labels: ["Janeiro", "Fevereiro", "Março", "Abril",
            "Maio", "Junho", "Julho"
          ],
          datasets: [{
            label: "Rendimentos (R$)",
            backgroundColor: "rgba(200,230,201,0.25)",
            borderColor: "rgb(129,199,132,0.25)",
            data: [12, 10, 21, 45, 70, 87, 120],
          }, {
            label: "Gastos (R$)",
            backgroundColor: "rgba(255, 99, 132,0.25)",
            borderColor: "rgb(255, 99, 132)",
            data: [7, 13, 15, 22, 35, 50, 66],
          }]
        },
      });
      const ctx2 = document.getElementById("chart2").getContext("2d");
      const CliFor = new Chart(ctx2, {
        type: "line",
        data: {
          labels: ["Janeiro", "Fevereiro", "Março", "Abril",
            "Maio", "Junho", "Julho"
          ],
          datasets: [{
            label: "Clientes",
            backgroundColor: "rgba(243,229,245,0.25)",
            borderColor: "rgb(197,202,233)",
            data: [0, 9, 30, 64, 80, 130, 250],
          }, {
            label: "Fornecedores",
            backgroundColor: "rgba(206,147,216,0.25)",
            borderColor: "rgb(171,71,188)",
            data: [2, 5, 8, 16, 25, 34, 50],
          }]
        },
      });
    }
  </script>';
?>