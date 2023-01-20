<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();
require_once('../conexao.php');

$informacoes_posto = $_POST['informacoes_posto'];
$patrulheiro       = $_POST['patrulheiro'];
$os_aberta         = $_POST['os_aberta'];
$preventiva_env    = $_POST['preventiva_env'];
$rondas_env        = $_POST['RONDAS_ENVIADAS'];
$obs_plantao       = $_POST['obs_plantao'];
$tipo              = $_POST['TIPO'];

if(empty($informacoes_posto) || empty($patrulheiro) || empty($os_aberta) || empty($preventiva_env) || empty($obs_plantao)) {
    echo '
        <div class="text-danger">
            Nescessário preencher os campos
        </div>';
    die();
};

$stmt = $conn->prepare("INSERT INTO ocorrencia 
                        (
                            INFO_POSTO,
                            ID_PATRULHEIRO,
                            OS_ABERTA,
                            PREVENTIVAS_ENVIADAS,
                            RONDAS_ENVIADAS,
                            OBS_PLANTONISTA,
                            TIPO,
                            IDUSER
                        ) VALUES (
                            :INFO_POSTO,
                            :ID_PATRULHEIRO,
                            :OS_ABERTA,
                            :PREVENTIVAS_ENVIADAS,
                            :RONDAS_ENVIADAS,
                            :OBS_PLANTONISTA,
                            :TIPO,
                            :IDUSER
                        )"
                    );
$stmt->execute(
    [
        'INFO_POSTO'            => $informacoes_posto, 
        'ID_PATRULHEIRO'        => $patrulheiro,
        'OS_ABERTA'             => $os_aberta,
        'PREVENTIVAS_ENVIADAS'  => $preventiva_env,
        'RONDAS_ENVIADAS'       => $rondas_env,
        'OBS_PLANTONISTA'       => $obs_plantao,
        'TIPO'                  => $tipo,
        'IDUSER'                => $_SESSION['idUser']
    ]
);

$tipo = ($_GET['tipo'] == 1) ? 'lider' : 'patrulha';
header('Location: ../exibir.php?tipo='.$tipo);
?>