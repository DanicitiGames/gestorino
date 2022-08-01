<?php
$date = date("Y-m-d H:i:s", time() - 5 * 60 * 60);
require('db.php');
$sql = "SELECT * FROM $_SESSION[uid]";
$result = $connect->query($sql);
$row = $result->fetch_row();
$valores = [];
$size = 0;
while ($row = mysqli_fetch_row($result)) {
    $valores[] = $row;
    $size++;
}
$table = "";
for($a = $size-1; $a != -1; $a--){
    $table .= "<tr>";
    for($b = 0; $b < 3; $b++){
        $table .= "<td>".$valores[$a][$b]."</td>";
    }
    $table .= "</tr>";
}
echo '<form method="post">
<nav class="navbar navbar-expand-sm navbar-light">
<input type="submit" class="btn" style="color:#574764" name="switch" id="Cadastro" value="Cadastro"/>
<input type="submit" class="btn" style="color:#574764" name="switch" id="Principal" value="Principal"/>
<input type="submit" class="btn" style="color:#574764" name="switch" id="Gráficos" value="Gráficos"/>
<input type="submit" class="btn shadow" style="color:#574764" name="switch" id="Histórico" value="Histórico"/>
</nav>
</form>

<div class="col-md">
    <div class="container mt-3 card shadow card-header">
        <center><h2 style="color:#e5e5e5;text-shadow: 1px 1px #cccccc;">Histórico de acessos</h2></center>
        <div class="table-responsive card-body">
            <table class="table">
                <thead style="background-color:#cccccc">
                    <tr>
                        <th>Data</th>
                        <th>IP</th>
                        <th>Dispositivo</th>
                    </tr>
                </thead>
                <tbody id="valores" style="background-color:#e5e5e5">
                    '.$table.'
                </tbody>
            </table>
        </div>
    </div>
</div>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>';
?>