<?php
session_start();
require_once('../conexao.php');

$informacoes_posto = $_POST['informacoes_posto'];
$patrulheiro =  $_POST['patrulheiro'];
$os_aberta = $_POST['os_aberta'];
$preventiva_env = $_POST['preventiva_env'];
$obs_plantao = $_POST['obs_plantao'];

if(empty($informacoes_posto) || empty($patrulheiro) || empty($os_aberta) || empty($preventiva_env) || empty($obs_plantao)) {
    echo '
        <div class="text-danger">
            Nescessário preencher os campos
        </div>';
    die();
};



$stmt = $conn->prepare("INSERT INTO ocorrencia 
                        (INFO_POSTO,ID_PATRULHEIRO,OS_ABERTA,PREVENTIVAS_ENVIADAS,OBS_PLANTONISTA,TIPO, IDUSER)
                        VALUES (:INFO_POSTO,:ID_PATRULHEIRO,:OS_ABERTA,:PREVENTIVAS_ENVIADAS,:OBS_PLANTONISTA,:TIPO,:IDUSER)");
$stmt->execute(
    [
        'INFO_POSTO' => $informacoes_posto, 
        'ID_PATRULHEIRO' => $patrulheiro,
        'OS_ABERTA' => $os_aberta,
        'PREVENTIVAS_ENVIADAS' => $preventiva_env,
        'OBS_PLANTONISTA' => $obs_plantao,
        'TIPO' => 1,
        'IDUSER' => $_SESSION['idUser']
    ]
);
header('Location: ../screens/lider/exibir_ocorrencias.php');
?>