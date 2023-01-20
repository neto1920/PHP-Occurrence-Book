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
<script>
    window.onload = function() {
        var modalOcorrencia = document.getElementById('modalOcorrencia')
        modalOcorrencia.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget
            var id   = button.getAttribute('data-bs-id');
            var data = button.getAttribute('data-bs-data');
            
            $.get('http://<?=$_SERVER['SERVER_NAME'];?>/ajax/getOcorrencia.php?ID='+id, function(result){
                var ocorrencia = JSON.parse(result);

                var modalTitle        = modalOcorrencia.querySelector('.modal-title')
                var modalInfo         = modalOcorrencia.querySelector('#modal-info');
                var modalPatrulheiro  = modalOcorrencia.querySelector('#modal-patrulheiro');
                var modalOs           = modalOcorrencia.querySelector('#modal-os');
                var modalPreventivas  = modalOcorrencia.querySelector('#modal-preventivas');
                var modalRondas       = modalOcorrencia.querySelector('#modal-rondas');
                var modalObs          = modalOcorrencia.querySelector('#modal-obs');
                var modalResponsavel  = modalOcorrencia.querySelector('#modal-responsavel');

                modalTitle.textContent       = 'Ocorrendia gerada em ' + data;
                modalResponsavel.textContent = ocorrencia['USUARIO'];
                modalInfo.innerHTML          = ocorrencia['INFO_POSTO'];
                modalPatrulheiro.innerHTML   = ocorrencia['PATRULHEIRO'];
                modalOs.innerHTML            = ocorrencia['OS_ABERTA'];
                modalPreventivas.innerHTML   = ocorrencia['PREVENTIVAS_ENVIADAS'];
                modalRondas.innerHTML        = ocorrencia['RONDAS_ENVIADAS'];
                modalObs.innerHTML           = ocorrencia['OBS_PLANTONISTA'];
            });
        });
    }
</script>
<section class="container-fluid">          
    <h2 style="margin-top: 30px;">Últimas Ocorrências</h2>
    <hr>
    <table id="tabela" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Data abertura</th>
                <th>Responsável</th>
                <th>Patrulheiro</th>
                <th>OS Abertura</th>
                <th>Opções</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($ocorrencias as $ocorrencia){ ?> 
            <tr>
                <td><?=$ocorrencia['ID'];?></td>
                <td><?=date('d/m/Y - H:i', strtotime($ocorrencia['DATA']));?></td>
                <td><?=$ocorrencia['USUARIO'];?></td>
                <td><?=$ocorrencia['PATRULHEIRO'];?></td>
                <td><?=$ocorrencia['OS_ABERTA'];?></td>
                <th>
                    <a href="javascript:" title="Abrir ocorrência" data-bs-toggle="modal" 
                    data-bs-target="#modalOcorrencia" data-bs-id='<?=$ocorrencia['ID'];?>' 
                    data-bs-data='<?=date('d/m/Y - H:i', strtotime($ocorrencia['DATA']));?>'>
                        <i class="fa fa-eye" aria-hidden="true"></i>
                    </a>                    
                </th>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</section>

<!-- Modal -->
<div class="modal fade" id="modalOcorrencia" tabindex="-1" aria-labelledby="modalOcorrenciaLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalOcorrenciaLabel">Ocorrencia</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-body text-black">  
                <h6>INFORMAÇÕES DO POSTO</h6>
                <div class="card-text" id="modal-info"></div>
                <hr>
                <h6>PATRULHEIRO DO PLANTÃO</h6>
                <div class="card-text" id="modal-patrulheiro"></div>
                <hr>
                <h6>ORDEM DE SERVIÇO ABERTA</h6>
                <div class="card-text" id="modal-os"></div>
                <hr>
                <h6>PREVENTIVAS ENVIADAS</h6>
                <div class="card-text" id="modal-preventivas"></div>
                <hr>            
                <h6>RONDAS ENVIADAS</h6>
                <div class="card-text" id="modal-rondas"></div>
                <hr>   
                <h6>OBSERVAÇÕES DO PLANTÃO</h6>
                <div class="card-text" id="modal-obs"></div>
            </div>            
            <div class="card-footer bg-transparent border-success">Criado Por <b id="modal-responsavel"></b></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
<?php
require_once('template/footer.php');
?>