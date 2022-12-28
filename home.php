<?= require_once('func/valida_access.php'); ?>
<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/index.css">      
    <title>Home</title>
    <style>        
      .bar {
        background-color: #404079;
        height: 40px;
        padding: 30px  0;
      }      
      .nav-link {
        font-weight: bold;
        margin-right: 20px;
        
      }
      .home-card {
        margin-top: 10rem;
        margin-left: auto;
        margin-right: auto;
      }
    </style>
  </head>
  <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-success">
            <div class="container-fluid ">
                <a class="navbar-brand text-light" href="home.php">Livro de Ocorrência Digital</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                        <li class="nav-item">
                            <a class="nav-link text-light active" aria-current="page" href="home.php">Home</a>
                        </li>
                        <li class="nav-item sair">
                            <a href="func/logoff.php" class="nav-link text-warning">Sair da Conta</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container text-center">
            <div class="row">
                <div class="col">
                    <div class="card home-card border-success mb-3" style="max-width: 18rem;">
                        <div class="card-body text-success">
                            <h5 class="card-title">Portaria</h5>
                            <a class="card-img" href="screens/lider/home.php">
                            <img src="img/lider.png" class="lider"></a>
                        </div>
                    </div>                  
                </div>
                <div class="col">                
                <div class="card home-card border-success mb-3" style="max-width: 18rem;">
                        <div class="card-body text-success">
                            <h5 class="card-title">Monitoramento</h5>
                            <a class="card-img" href="screens/patrulha/home.php">
                            <img src="img/patrulha.png"></a>
                        </div>
                </div>                
            </div>
        </div>

    </body>
</html>