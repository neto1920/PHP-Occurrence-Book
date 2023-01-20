<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once('conexao.php');
require_once('func/valida_access.php');

if (empty($_GET['tipo'])) {
    header('Location: home.php');
}

$tipo = ($_GET['tipo'] == 'lider') ? 1 : 2;

$stmt = $conn->prepare("SELECT ID, NOME FROM patrulheiro ORDER BY NOME");
$stmt->execute();
$patrulheiros = $stmt->fetchAll();

require_once('template/header.php');
?>
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
                  <form method="post" action="func/add_ocorrencia.php">
                    <div class="form-group">
                      <label>INFORMAÇÕES DO POSTO</label>
                      <textarea name="informacoes_posto" class="form-control trumbowyg" required ></textarea>
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
                      <input name="os_aberta" type="text" class="form-control" placeholder="OS ABERTA" />
                    </div>
                    <br>
                    <div class="form-group">
                      <label>PREVENTIVAS ENVIADAS</label>
                      <input name="preventiva_env" type="text" class="form-control" />
                    </div>                    
                    <br>
                    <div class="form-group">
                      <label>RONDAS ENVIADAS</label>
                      <input name="RONDAS_ENVIADAS" type="text" class="form-control" />
                    </div>                    
                    <br>
                    
                    <div class="mb-3">
                      <label>OBSERVAÇÕES DO PLANTÃO</label>
                      <textarea name="obs_plantao" class="form-control trumbowyg" rows="3" required ></textarea>
                    </div>             
                    <br>
                    <div class="row mt-5">
                      <div class="col-6">
                        <a class="btn btn-lg btn-warning btn-block" type="button" href="home.php">Voltar</a>
                      </div>

                      <div class="col-6 d-grid justify-content-end">         
                        <input type="hidden" name="TIPO" value="<?=$tipo;?>" />           
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
<?php
require_once('template/footer.php');
?>