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
      <div class="col">
        <nav class="navbar navbar-expand-sm navbar-light">
          <div class="container-fluid">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="sobre.php">Sobre</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Planos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="#">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="registro.php">Registro</a>
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
                    <label for="text" class="form-label">Usuário:</label>
                    <input type="text" class="form-control" placeholder="Seu usuário" name="username">
                </div>
                <div class="mb-1">
                  <label for="email" class="form-label">Email:</label>
                  <input type="email" class="form-control" placeholder="Seu email" name="email">
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