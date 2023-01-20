<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once('../conexao.php');
require_once('../func/valida_access.php');

$stmt = $conn->prepare(
  "SELECT 
    O.INFO_POSTO, P.NOME AS PATRULHEIRO, O.OS_ABERTA, 
    O.PREVENTIVAS_ENVIADAS, O.RONDAS_ENVIADAS, O.OBS_PLANTONISTA, 
    O.`DATA`, U.NOME AS USUARIO
  FROM ocorrencia O
  LEFT JOIN patrulheiro P ON P.ID=O.ID_PATRULHEIRO
  LEFT JOIN usuario U ON U.ID=O.IDUSER
  WHERE O.ID=".$_GET['ID']
);
$stmt->execute();
$ocorrencia = $stmt->fetchAll()[0];

echo json_encode($ocorrencia);