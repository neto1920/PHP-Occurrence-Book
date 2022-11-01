<?php 
  
  require_once('../../conexao.php');
  require_once('../../func/valida_access.php'); 
  $stmt = $conn->prepare(
    "SELECT 
      O.ID, O.INFO_POSTO, P.NOME AS PATRULHEIRO, O.OS_ABERTA, 
      O.PREVENTIVAS_ENVIADAS, O.OBS_PLANTONISTA, O.`DATA`, U.NOME AS USUARIO
    FROM ocorrencia O
    LEFT JOIN patrulheiro P ON P.ID=O.ID_PATRULHEIRO
    LEFT JOIN usuario U ON U.ID=O.IDUSER
    WHERE O.TIPO = 1"
  );
  $stmt->execute();
  $ocorrencias = $stmt->fetchAll();

?>
<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../../styles/index.css">      
    <title>Consulta ocorrencias</title>
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
                  <li class="nav-item">
                    <a class="nav-link text-light" href="home.php">Voltar</a>
                  </li>  
                  <li class="nav-item sair">
                    <a href="../../func/logoff.php" class="nav-link text-warning">Sair da Conta</a>
                  </li>
              </ul>
            </div>
        </div>
    </nav>

    <section>
      <div>
        
      </div>
    </section>

    <section class="container-fluid">  
        
      <h2 style="margin-top: 30px;">Últimas Ocorrências</h2>
      <hr>

      <?php foreach ($ocorrencias as $ocorrencia){ ?> 
        <div class="row card-noticias">         
          <div class="card border-success" style="max-width: 60rem;">
              <div class="card-body text-black">  
                <h5>INFORMAÇÕES DO POSTO</h5>
                <p class="card-text"><?= $ocorrencia['INFO_POSTO'] ?></p>
                <hr>
                <h5>PATRULHEIRO DO PLANTÃO</h5>
                <p class="card-text"><?= $ocorrencia['PATRULHEIRO'] ?></p>
                <hr>
                <h5>ORDEM DE SERVIÇO ABERTA</h5>
                <p class="card-text"><?= $ocorrencia['OS_ABERTA'] ?></p>
                <hr>
                <h5>PREVENTIVAS ENVIADAS</h5>
                <p class="card-text"><?= $ocorrencia['PREVENTIVAS_ENVIADAS'] ?></p>
                <hr>
                <h5>OBSERVAÇÕES DO PLANTÃO</h5>
                <p class="card-text"><?= $ocorrencia['OBS_PLANTONISTA'] ?></p>
              </div>            
              <div class="card-footer bg-transparent border-success"> Criado Por <b> <?= $ocorrencia['USUARIO'] ?> | <?=date('d/m/Y - H:i', strtotime($ocorrencia['DATA']));?> </b></div>
          </div>
        </div>
      <br>
      <?php } ?>
    </section>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>