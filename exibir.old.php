<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once('conexao.php');
require_once('func/valida_access.php');

if (empty($_GET['tipo'])) {
    header('Location: home.php');
}

$tipo = ($_GET['tipo'] == 'lider') ? 1 : 2;
$stmt = $conn->prepare(
  "SELECT 
    O.ID, O.INFO_POSTO, P.NOME AS PATRULHEIRO, O.OS_ABERTA, 
    O.PREVENTIVAS_ENVIADAS, O.RONDAS_ENVIADAS, O.OBS_PLANTONISTA, 
    O.`DATA`, U.NOME AS USUARIO
  FROM ocorrencia O
  LEFT JOIN patrulheiro P ON P.ID=O.ID_PATRULHEIRO
  LEFT JOIN usuario U ON U.ID=O.IDUSER
  WHERE O.TIPO = ".$tipo."
  ORDER BY data DESC"
);
$stmt->execute();
$ocorrencias = $stmt->fetchAll();

require_once('template/header.php');
?>
<section class="container-fluid">          
  <h2 style="margin-top: 30px;">Últimas Ocorrências</h2>
  <hr>
  <?php foreach ($ocorrencias as $ocorrencia){ ?> 
    <div class="row card-noticias">         
      <div class="card border-success" style="max-width: 60rem;">
          <div class="card-body text-black">  
            <h6>INFORMAÇÕES DO POSTO</h6>
            <p class="card-text"><?= $ocorrencia['INFO_POSTO'] ?></p>
            <hr>
            <h6>PATRULHEIRO DO PLANTÃO</h6>
            <p class="card-text"><?= $ocorrencia['PATRULHEIRO'] ?></p>
            <hr>
            <h6>ORDEM DE SERVIÇO ABERTA</h6>
            <p class="card-text"><?= $ocorrencia['OS_ABERTA'] ?></p>
            <hr>
            <h6>PREVENTIVAS ENVIADAS</h6>
            <p class="card-text"><?= $ocorrencia['PREVENTIVAS_ENVIADAS'] ?></p>
            <hr>
          <?php if (!empty($ocorrencia['RONDAS_ENVIADAS'])) {?>
            <h6>RONDAS ENVIADAS</h6>
            <p class="card-text"><?=$ocorrencia['RONDAS_ENVIADAS']?></p>
            <hr>
          <?php }?>
            <h6>OBSERVAÇÕES DO PLANTÃO</h6>
            <p class="card-text"><?= $ocorrencia['OBS_PLANTONISTA'] ?></p>
          </div>            
          <div class="card-footer bg-transparent border-success"> Criado Por <b> <?= $ocorrencia['USUARIO'] ?> | <?=date('d/m/Y - H:i', strtotime($ocorrencia['DATA']));?> </b></div>
      </div>
    </div>
  <br>
  <?php } ?>
</section>
<?php
require_once('template/footer.php');
?>