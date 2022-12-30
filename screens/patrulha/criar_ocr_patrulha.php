<?php
  require_once('../../conexao.php');
  require_once('../../func/valida_access.php'); 
  
  $stmt = $conn->prepare("SELECT ID, NOME FROM patrulheiro ORDER BY NOME");
  $stmt->execute();
  $patrulheiros = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../../styles/index.css">      
    <title>Criar Livro de Ocorrência</title>
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

    <div class="container-fluid">  
      <div class="row">
        <div class="justify-content-center">
          <div class="card col-9  top-50 start-50 translate-middle mt-1 bi bi-caret-down-fill">
            <div class="card-header">
              Escreva sua Ocorrência
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <form method="post" action="../../func/add_ocorrencia_patrulha.php">
                    <div class="form-group">
                      <label>INFORMAÇÕES DO POSTO</label>
                      <textarea name="informacoes_posto" class="form-control" rows="3" required ></textarea>
                    </div>
                    <br>
                    <div class="form-group">
                      <label>PATRULHEIRO DO PLANTÃO</label>
                      <select name="patrulheiro" class="form-control" required>
                        <option value="">Selecione o patrulheiro</option>
                      <?php
                      foreach ($patrulheiros as $patrulheiro) {
                        echo '<option value="'.$patrulheiro['ID'].'">'.$patrulheiro['NOME'].'</option>';
                      }
                      ?>
                      </select>
                    </div>
                    <br>
                    <div class="form-group">
                      <label>ORDEM DE SERVIÇO ABERTA</label>
                      <input name="os_aberta" type="text" class="form-control" placeholder="OS ABERTA" required>
                    </div>
                    <br>
                    <div class="form-group">
                      <label>PREVENTIVAS ENVIADAS</label>
                      <input name="preventiva_env" type="text" class="form-control" placeholder="Preventivas Enviadas" required>
                    </div>                    
                    <br>
                    <div class="mb-3">
                      <label>OBSERVAÇÕES DO PLANTÃO</label>
                      <textarea name="obs_plantao" class="form-control" rows="3" required ></textarea>
                    </div>             

                    <div class="row mt-5">
                      <div class="col-6">
                        <a class="btn btn-lg btn-warning btn-block" type="button" href="home.php">Cancelar</a>
                      </div>

                      <div class="col-6 d-grid justify-content-end">         
                        <input type="hidden" name="IDUSER" value="<?=$_SESSION['idUser'];?>">    
                        <input type="hidden" name="TIPO" value="1" />           
                        <button class="btn btn-lg btn-info btn-block " type="submit">Publicar Ocorrência</button>
                      </div>
                    </div>

                  </form>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>